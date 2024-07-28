<?php

namespace App\Http\Controllers;

use App\Dto\UserDto;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterationRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function Register(RegisterationRequest $request)
    {
        $userDto = UserDto::createUserDto($request);
        $user = User::create($userDto->toArray());

        $role = Role::where('rolename', $userDto->getRole())->firstOrFail();
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        $user->roles()->attach($role);
        $token = $user->createToken('auth_token')->plainTextToken;
        MailerController::sendVerificationCode($user);
        
        return response()->json(['message' => 'User registered successfully', 'token' => $token, 'user' => $user]);
    }

    public function Login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'Login successful', 'token' => $token, 'user' => $user]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function UpdatePassword(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->get();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->password = Hash::make($request->password);
        return response()->json(['Message' => 'Password Updated Successfully']);
    }

    public function Logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
