<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserController extends Controller
{
    public function registerView(Request $request)
    {
        if(session('token')){
            return redirect('/dashboard');
        }
        return view('register');
    }

    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->exists()) {
            if ($request->is('api/*')) {
                throw new HttpResponseException(response([
                    "errors" => [
                        "message" => [
                            "Email already exists"
                        ]
                    ]
                ], 400));
            } else {
                return redirect('/register')->withErrors([
                    "message" => "Email already exists"
                ])->withInput();
            }
        }

        $user = new User($data);
        $user->password = Hash::make($data['password']);
        $user->image_path = "default.jpg";
        $user->remember_token = Str::uuid()->toString();
        $user->save();

        if ($user->role == "student") {
            var_dump("cek");
            $teacher = Teacher::where('code', $data['invitation_code'])->first();
            $user->student()->create(
                [
                    "user_id" => $user->id,
                    "teacher_id" => $teacher->id,
                    "points" => 0
                ]
            );
        } else {
            $user->teacher()->create(
                [
                    "user_id" => $user->id,
                    "code" => strtoupper(Str::random(6))
                ]
            );
        }

        if ($request->is('api/*')) {
            // This is an API request from the mobile app
            return (new UserResource($user))->response()->setStatusCode(201);
        } else {
            // This is a web request
            session(['token' => $user->remember_token]);
            return redirect('/dashboard');
        }
    }


    public function loginView(Request $request)
    {
        if(session('token')){
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function login(UserLoginRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            if ($request->is('api/*')) {
                throw new HttpResponseException(response([
                    "errors" => [
                        "message" => [
                            "Invalid username or password"
                        ]
                    ]
                ], 401));
            } else {
                return redirect('/login')->withErrors([
                    "message" => "Invalid username or password"
                ])->withInput();
            }
        }

        $user->remember_token = Str::uuid()->toString();
        $user->save();

        if ($request->is('api/*')) {
            // This is an API request from the mobile app
            return (new UserResource($user));
        } else {
            // This is a web request
            session(['token' => $user->remember_token]);
            return redirect('/dashboard');
        }
    }

    public function logout(Request $request)
    {
        $token = session('token');
        $user = User::where('remember_token', $token)->first();
        // Log::info(bcrypt($token) . " " . $user->remember_token);
        $user->remember_token = null;
        $user->save();
        session()->forget('token');
        return redirect('/register');
    }
}
