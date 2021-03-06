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
        $calculated_hmac = hash_hmac('sha256',$request->getContent(), $secret);
        if ($request->header('Authorization-Hmac') != $calculated_hmac) {
            return response()->json([
                'error' => [
                    'message' => 'Web Secret is not match',
                    'status_code' => 406
                    ]
                ],406);
        }
        return $next($request);
    }
}
