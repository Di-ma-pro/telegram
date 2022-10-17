<?php

namespace App\Http\Controllers\Auth\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends ApiController
{
    public function login(Request $request)
    {

        file_put_contents('Hello.txt', json_encode($_REQUEST));
        $info = [
            'success' => false,
            'token' => null,
        ];

        $email = User::where('email', $request->email)->first();

        if (!empty($email) && Hash::check($request->password, $email->password)) {
            $info['success'] = true;
            $token = $email->createToken($email->id)->plainTextToken;
            return [
                'success' => true,
                'token' => $token,
            ];
        } else {
            return [
                'success' => false,
            ];
        }
    }
}
