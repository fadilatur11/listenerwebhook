<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListenerController extends Controller
{

    function orderNotification(Request $request)
    {
        Storage::disk('local')->put('order-notification-content.txt', $request->getContent());
        Storage::disk('local')->put('order-notification-header.txt', json_encode($request->header("X-Authorization-Hmac")));
    }


    function orderStatus(Request $request)
    {
        Storage::disk('local')->put('order-status-content.txt', $request->getContent());
        Storage::disk('local')->put('order-status-header.txt', json_encode($request->header("X-Authorization-Hmac")));
    }

    function orderCancellation(Request $request)
    {
        Storage::disk('local')->put('order-cancellation-content.txt', $request->getContent());
        Storage::disk('local')->put('order-cancellation-header.txt', json_encode($request->header("X-Authorization-Hmac")));
    }

    function orderConfirmDeliveryNotification(Request $request)
    {
        Storage::disk('local')->put('order-confirmDelivery-content.txt', $request->getContent());
        Storage::disk('local')->put('order-confirmDelivery-header.txt', json_encode($request->header("X-Authorization-Hmac")));
    }

    function orderRequestCancellation(Request $request)
    {
        Storage::disk('local')->put('order-RequestCancellation-content.txt', $request->getContent());
        Storage::disk('local')->put('order-RequestCancellation-header.txt', $request->header('Authorization-Hmac'));
    }
}
