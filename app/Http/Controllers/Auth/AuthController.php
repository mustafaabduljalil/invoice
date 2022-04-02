<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ResponseTrait;

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = \auth()->user();
            $data['user']  = new UserResource($user);
            $data['token'] = $user->createToken('invoice')->accessToken;

            return $this->success(__('User logged in successfully'), $data);
        }

        return $this->error(__('Email or Password is incorrect'), Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Logout api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->success(__('User logged out successfully'));
    }
}
