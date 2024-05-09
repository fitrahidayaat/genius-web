<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        
        $user = User::where('email', $googleUser->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $googleUser->name;
            $user->email = $googleUser->email;
            // download avatar and save to storage
            $avatar = file_get_contents($googleUser->avatar);
            $user->google_id = $googleUser->id;
            $user->remember_token = Str::uuid()->toString();
            $user->password = Hash::make(Str::random(24));
            $user->save();
            
            $path = 'images/' .$user->id. '/profile_picture';
            $user->image_path = $path;
            $user->save();
            Storage::disk('public')->put($path, $avatar);
            
            Auth::login($user);
            session(['token' => $user->remember_token]);

            return redirect('/select-role');
        }
        
        $user->remember_token = Str::uuid()->toString();
        $user->save();

        Auth::login($user);
        session(['token' => $user->remember_token]);
        if(!$user->role){
            return redirect('/select-role');
        }
        return redirect('/dashboard');
    }
}
