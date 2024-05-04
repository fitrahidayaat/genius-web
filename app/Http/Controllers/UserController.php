<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (User::where('email', $data['email'])->exists()) {
            throw new HttpResponseException(response([
                "errors" => [
                    "email" => [
                        "Email already exists"
                    ]
                ]
            ], 400));
        }

        $user = new User($data);
        $user->password = bcrypt($data['password']);
        $user->image_path = "default.jpg";
        $user->remember_token = Str::uuid()->toString();
        
        $user->save();


        return (new UserResource($user))->response()->setStatusCode(201);
    }
}
