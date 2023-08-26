<?php

namespace PsiMikroskil\Larashare\Auth;

use PsiMikroskil\Larashare\Http\Request;

class Enforcer
{
    /**
     * Handle incoming request, and validate user permission
     *
     * @param Request $request
     * @return bool
     */
    public function handle(Request $request): bool
    {
        return true;
    }
}