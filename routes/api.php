<?php

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
use Illuminate\Http\Request;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post("/set-device-token",function(Request $request)
{
    $user = App\Models\User::find($request->user_id);
    $user->device_token = $request->token;
    $user->save();
    return 1;
});
Route::post("/search-query",'Frontend\SearchController@AjaxSearch');
// Route::get("/get-id",function(Request $request)
// {
//     if(Auth::check()){
//         dd(Auth::id());
//         return Auth::id();
//     }
//     else
//         return 0;
// });
