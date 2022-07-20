<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//ads
Route::get('ads/{id}/all', 'App\Http\Controllers\Api\AdsController@index');
Route::get('ads/{id}/details', 'App\Http\Controllers\Api\AdsController@show');

//profile
Route::get('profile/{id}/details', 'App\Http\Controllers\Api\UsersController@profile_details');
Route::get('currentUserData', function (Request $request) {
     return get_current_user_data();
    
});
//quotes
Route::post('quotes/send', 'App\Http\Controllers\Api\QuotesController@send');
Route::post('quotes/send-employment', 'App\Http\Controllers\Api\QuotesController@SendEmployment');