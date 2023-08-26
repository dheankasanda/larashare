<?php

namespace PsiMikroskil\Larashare\Interfaces;

use Illuminate\Contracts\Auth\Authenticatable;

interface AuthDriverInterface
{
    public function authenticate(array $credentials): ?Authenticatable;
}