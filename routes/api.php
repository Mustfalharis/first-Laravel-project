<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Category\CategoryController;
use App\Http\Controllers\Api\V1\Favorite\FavoriteController;
use App\Http\Controllers\Api\V1\Image\ImageItemController;
use App\Http\Controllers\Api\V1\Item\ItemController;
use App\Http\Controllers\Api\V1\Prices\PricesItemController;
use App\Models\ImageItem;
use App\Models\PricesItem;
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
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::get('logout', 'logout');
        Route::get('refresh', 'refresh');
});

/// admin
Route::prefix('v1')
    ->namespace('App\Http\Controllers\Api\V1')
    //  ->middleware(["admin"])
    ->group(function () {
        Route::post('category',[CategoryController::class,'store']);
        Route::put('category/{id}',[CategoryController::class,'update']);

        Route::post('item',[ItemController::class,'store']);

        Route::post('prices',[PricesItemController::class,'store']);

        Route::post('image',[ImageItemController::class,'store']);


});

/// user
Route::prefix('v1')
    ->namespace('App\Http\Controllers\Api\V1')
    ->middleware('user')
    ->group(function () {
        Route::get("category", [CategoryController::class, 'index']);
        Route::get("category/{id}", [CategoryController::class, 'show']);

        Route::get('item/{id}',[ItemController::class,'index']);

        Route::get('item/details/{id}',[ItemController::class,'show']);

        Route::get("prices/{id}", [PricesItemController::class, 'show']);

        Route::get("image/{id}", [ImageItemController::class, 'show']);

        Route::get("favorite", [FavoriteController::class, 'index']);

        Route::post("favorite", [FavoriteController::class, 'store']);

        Route::delete("favorite/{id}", [FavoriteController::class, 'delete']);




});
