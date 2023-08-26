<?php

namespace PsiMikroskil\Larashare\Resources\Http\Middlewares;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use PsiMikroskil\Larashare\Exceptions\AuthenticationException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$guards
     * @return Response|JsonResponse|BinaryFileResponse
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next, ...$guards): Response|JsonResponse|BinaryFileResponse
    {
        if (empty($guards)) $guards = [config('auth.defaults.guard')];

        foreach ($guards as $guard) {

            if (!Auth::guard($guard)->check() && !Auth::guard($guard)->user()) {
                throw new AuthenticationException();
            }
        }
        return $next($request);
    }
}