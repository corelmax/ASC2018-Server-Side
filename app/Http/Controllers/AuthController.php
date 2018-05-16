<?php

namespace App\Http\Controllers;

use App\AuthModel;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function login(Request $request) {
        $username = $request->post('Username');
        $password = $request->post('password');

        $user = AuthModel::where('username', $username)->first();

        if($user === null || $user->password !== $password) {
            return response([
                'message' => 'invalid login'
            ], 401);
        }

        $user->token = md5($username);
        $user->save();

        return response([
            'token' => $user->token,
            'Role' => $user->role
        ], 200);
    }

    function logout(Request $request) {
        $token = $request->query('token');

        $user = AuthModel::where('token', $token)->first();

        if($user === null) {
            return response([
                'message' => 'Unauthorized user'
            ], 401);
        }

        $user->token = '';
        $user->save();

        return response([
            'message' => 'logout success'
        ], 200);
    }
}
