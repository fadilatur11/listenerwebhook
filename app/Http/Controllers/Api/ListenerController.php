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
        Storage::disk('local')->put('order-notification-header.txt', $request->header());
    }


    function orderStatus(Request $request)
    {
        Storage::disk('local')->put('order-status-content.txt', $request->getContent());
        Storage::disk('local')->put('order-status-header.txt', $request->header());
    }

    function orderCancellation(Request $request)
    {
        Storage::disk('local')->put('order-cancellation-content.txt', $request->getContent());
        Storage::disk('local')->put('order-cancellation-header.txt', $request->header());
    }

    function orderConfirmDeliveryNotification(Request $request)
    {
        Storage::disk('local')->put('order-confirmDelivery-content.txt', $request->getContent());
        Storage::disk('local')->put('order-confirmDelivery-header.txt', $request->header());
    }

    function orderRequestCancellation(Request $request)
    {
        Storage::disk('local')->put('order-RequestCancellation-content.txt', $request->getContent());
        Storage::disk('local')->put('order-RequestCancellation-header.txt', $request->header());
    }

    function productEdit(Request $request)
    {
        Storage::disk('local')->put('product-edit-content.txt', $request->getContent());
        Storage::disk('local')->put('product-edit-header.txt', $request->header());
    }

    function productChange(Request $request)
    {
        Storage::disk('local')->put('product-change-content.txt', $request->getContent());
        Storage::disk('local')->put('product-change-header.txt', $request->header());
    }

}
