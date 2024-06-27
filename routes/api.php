<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BulletinsController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\QualityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// 將需要帶 Token 才能使用的 API 放在下面的 Route::group
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResources([
        'customs' => CustomController::class,
        'qualities' => QualityController::class,
        'bulletin' => BulletinsController::class
    ]);

    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return response($request->user(), 201);
    });
});


// Route::group([
//     'middleware' => 'api',
//     'prefix' => 'auth'
// ], function ($router) {
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::post('/register', [AuthController::class, 'register']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::post('/refresh', [AuthController::class, 'refresh']);
//     Route::get('/user-profile', [AuthController::class, 'userProfile']);
// });
// Route::get('test', [CustomerController::class, 'index']);
