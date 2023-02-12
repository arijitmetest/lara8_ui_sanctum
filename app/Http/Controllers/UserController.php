<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//i have added
use App\Models\User;
use Hash;

class UserController extends Controller
{
    //
    public function login(Request $request) {

        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)) {
            return response(
                [
                    'message'=>['not a valid user']
                ],
                404
            );
        }

        //$tokenObj = $user->createToken('my-app-token');
        //$token = $tokenObj->plainTextToken;
        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token
        ];

        // return response(
        //     $response,
        //     200
        // ); // this will work

        return response()->json([
            'success' => "1",
            'message' => 'User Data',
            'data' => $response
        ], 200);

    }

    public function logout(Request $request) {
        
        //$user = Auth::user();
        $user = $request->user();


        $tokenId = $user->currentAccessToken()->id;

        // Revoke all tokens...
        //$user->tokens()->delete();

        // Revoke the token that was used to authenticate the current request...
        //$request->user()->currentAccessToken()->delete();
        //$user->currentAccessToken()->delete();

        // Revoke a specific token...
        //$user->tokens()->where('id', $tokenId)->delete();

        // here i'm deleting all access tokens
        $user->tokens()->delete();
        



    }
}
