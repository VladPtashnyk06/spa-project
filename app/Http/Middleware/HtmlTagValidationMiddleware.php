<?php

namespace App\Http\Middleware;

use Closure;

class HtmlTagValidationMiddleware
{
    public function handle($request, Closure $next)
    {
        $userInput = $request->input('comment');

        $pattern = '/<(?!\/?(a|code|i|strong)\b[^>]*>).*?>/s';

        if (preg_match($pattern, $userInput)) {
            return response()->json(['error' => 'Invalid HTML tags in the entered text.'], 400);
        }

        return $next($request);
    }
}
