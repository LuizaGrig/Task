<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class SpaController extends Controller
{
    public function registration(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = new User($input);
        if (!$user->save()) {
            //TODO throw exception if not saved
        }
        return response($user);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name','email', 'password');
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json(['status' => 'success'], 200)->header('Authorization', $token);
        }
        return response()->json(['error' => 'login_error'], 401);
    }

    public function logout(){
        Auth::logout();
    }


    private function guard()
    {
        return Auth::guard();
    }

}

