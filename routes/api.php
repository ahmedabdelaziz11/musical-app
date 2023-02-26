<?php

use App\Http\Controllers\Api\ShowController;
use App\Http\Controllers\Api\VenueController;
use App\Http\Controllers\Api\ArtistController;
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

Route::get('venues/{name?}',[VenueController::class,'index']);
Route::get('venue/{id}',[VenueController::class,'show']);
Route::post('venues',[VenueController::class,'store']);
Route::post('venues/{id}',[VenueController::class,'update']);
Route::post('venue/{id}',[VenueController::class,'destroy']);


Route::get('artists/{name?}',[ArtistController::class,'index']);
Route::get('artist/{id}',[ArtistController::class,'show']);
Route::post('artists',[ArtistController::class,'store']);
Route::post('artists/{id}',[ArtistController::class,'update']);
Route::post('artist/{id}',[ArtistController::class,'destroy']);


Route::get('shows/{title?}',[ShowController::class,'index']);
Route::get('show/{id}',[ShowController::class,'show']);
Route::post('shows',[ShowController::class,'store']);
Route::post('shows/{id}',[ShowController::class,'update']);
Route::post('show/{id}',[ShowController::class,'destroy']);