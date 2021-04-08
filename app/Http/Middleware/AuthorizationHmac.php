<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorizationHmac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $secret = "4f92fd6b5995fbfa2203a6890b854e6de4cecb0adf964581fc0f7266406eeb19";
        $payload = 'http://development-project.site/listener'.'|'.$request->getContent();
        $calculate_hmac = hash_hmac('sha256', $payload, $secret);

        if ($request->header('Authorization') != $calculate_hmac) {
            Storage::disk('local')->put('order-notification-content.txt', 'notfound');
            Storage::disk('local')->put('order-notification-header.txt', 'notfound');
            return response()->json([
                'error' => [
                    'message' => 'Your Web Secret invalid',
                    'status_code' => 406
                    ]
                ],406);
        }

        return $next($request);
    }
}
