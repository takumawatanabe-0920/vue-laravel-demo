<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\users\LoginUserInfoResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginUserInfoController extends Controller
{
    public function getMyInfo()
    {
        Log::debug("getMyInfo is being called");
        $user = Auth::user();

        Log::debug("getMyInfo is being called", ['user' => $user]);

        if (!$user) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return LoginUserInfoResource::make($user);
    }
}
