<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitizeInput
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $input= $request->all();
        $sanitizedInput = $this->sanitizeArray($input);
        $request->replace($sanitizedInput);
        return $next($request);
    }
    protected function sanitizeArray($array)
    {
        array_walk_recursive($array, function (&$value, $key) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        });
        return $array;
    }
}
