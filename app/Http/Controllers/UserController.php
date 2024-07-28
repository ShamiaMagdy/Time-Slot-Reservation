<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterationRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json(["Users" => $users]);
    }

    public function getSpecificUser($username)
    {
        $user = User::where("username", $username)->get();
        return response()->json(["User" => $user]);
    }

    public function updateUserData(UpdateUserRequest $request,$username)
    {
        $user = User::where("username", $username)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $data=[];
        if ($request->filled('firstname')) {
            $data['firstname'] = $request->firstname;
        }
        if ($request->filled('lastname')) {
            $data['lastname'] = $request->lastname;
        }
        if ($request->filled('username')) {
            $data['username'] = $request->username;
        }
        if ($request->filled('email')) {
            $data['email'] = $request->email;
        }
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        if ($request->filled('phone')) {
            $data['phone'] = $request->phone;
        }
        if ($request->filled('address')) {
            $data['address'] = $request->address;
        }
        $user->update($data);
        return response()->json(['Message'=>'User Data Updated ^-^',"User" => $user]);
    }

    public function deleteUserAccount($username)
    {
        $user = User::where("username", $username)->first();
        $user->delete();
        return response()->json(["Message" => "User Account deleted ^-^"]);
    }

}
