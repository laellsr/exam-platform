<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth(Request $request) 
    {
        $credentials = $request->only([
            'email', 'password', 'device_name'
        ]);

        $user = User::where('email', $request->email)->first();
        
        Hash::check($request->password);
    }
}
