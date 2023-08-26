<?php

namespace PsiMikroskil\Larashare\Exceptions;

use Illuminate\Http\JsonResponse;
use PsiMikroskil\Larashare\Http\Response;
use RuntimeException;

class AuthenticationException extends RuntimeException
{
    /**
     * Render error message
     *
     * @return JsonResponse
     */
    public function render(): JsonResponse
    {
        return Response::jsonError(401);
    }
}