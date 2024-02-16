<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class ReqAndResLogs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::channel('custom')->info('Request: ' . 'Method: ' . $request->method() . ' Path: ' . $request->path());
        $response = $next($request);
        Log::channel('custom')->info('Response: ' . 'Status code: ' . $response->status() . ' Content: ' . $response->content());
        return $response;
    }
}
