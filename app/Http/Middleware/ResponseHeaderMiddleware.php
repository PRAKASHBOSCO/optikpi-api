<?php

namespace App\Http\Middleware;

use Closure;

class ResponseHeaderMiddleware
{
    /**
     * Destroy all caches.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string                   $role
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $content = $response->content();

        return response(gzencode($content, 9))->withHeaders([
            'Content-type' => 'application/json; charset=utf-8',
            'Content-Encoding' => 'gzip'
        ]);
    }
}
