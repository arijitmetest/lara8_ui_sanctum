<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//i have added
use App\Http\Controllers\UserController;
//use App\Http\Controllers\Postcontroller; //dont have this

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// i have added

Route::group(['middleware'=>'auth:sanctum'], function(){
    //Route::apiResource("post",PostController::class); //dont have this

    Route::post('/home',function(){
        //$user = Auth::user();
        //dd($user->currentAccessToken());
        return "Access";
    });

    
Route::post('/logout',[UserController::class,'logout']);

});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login',[UserController::class,'login']);