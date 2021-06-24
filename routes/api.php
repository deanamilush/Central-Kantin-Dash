<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiMenuController;
use App\Http\Controllers\API\ApiVendorController;
use App\Http\Controllers\API\ApiBagianController;
use App\Http\Controllers\API\ApiUserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('menu', [ApiMenuController::class, 'getAllMenu']);
Route::post('menu/add', [ApiMenuController::class, 'createMenu']);
Route::get('menu/{id}', [ApiMenuController::class, 'detailMenu']);
Route::post('menu/update', [ApiMenuController::class, 'updateMenu']);
Route::delete('menu/{id}', [ApiMenuController::class, 'deleteMenu']);

Route::get('vendor', [ApiVendorController::class, 'getVendorData']);
Route::post('vendor/add', [ApiVendorController::class, 'createVendor']);
Route::get('vendor/{id}', [ApiVendorController::class, 'showVendor']);
Route::post('vendor/update', [ApiVendorController::class, 'updateVendor']);
Route::delete('vendor/{id}', [ApiVendorController::class, 'deleteVendor']);

Route::get('bagian', [ApiBagianController::class, 'getBagianData']);
Route::post('bagian/add', [ApiBagianController::class, 'createBagian']);
Route::get('bagian/{id}', [ApiBagianController::class, 'showBagian']);
Route::post('bagian/update', [ApiBagianController::class, 'updateBagian']);
Route::delete('bagian/{id}', [ApiBagianController::class, 'deleteBagian']);

Route::get('user', [ApiUserController::class, 'getUserData']);
Route::post('login', [ApiUserController::class, 'login']);
