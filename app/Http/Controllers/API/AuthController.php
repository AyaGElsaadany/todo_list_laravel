<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class AuthController extends BaseController
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return $this->sendError('Please Validate Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('Aya1234')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'User registered successfully!!');
    }

    public function login(Request $request){
        // dd('1234');
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('Aya1234')->accessToken;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User login successfully!!');
        }
        else
        {
            return $this->sendError('Please check your auth', ['error'=> 'Unauthorized']);
        }
    }

    public function logout(Request $request){
        // dd('1234');
        //auth()->user()->token()->delete();
        $user = $request->user()->token()->delete();
        $user->revoke();
        return $this->sendResponse('', 'Log out');

    }
}
