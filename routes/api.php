<?php

use App\Http\Controllers\Api\ListenerController;
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

Route::middleware(['hmacVerify'])->group(function() {
    Route::post('order-notification',[ListenerController::class, 'orderNotification']);
    Route::post('order-status',[ListenerController::class, 'orderStatus']);
    Route::post('order-cancellation',[ListenerController::class, 'orderCancellation']);
    Route::post('order-confirm-delivery',[ListenerController::class, 'orderConfirmDeliveryNotification']);
    Route::post('order-request-cancel',[ListenerController::class, 'orderRequestCancellation']);
    Route::post('product/edit',[ListenerController::class,'productEdit']);
    Route::post('product/change',[ListenerController::class,'productChange']);
});
