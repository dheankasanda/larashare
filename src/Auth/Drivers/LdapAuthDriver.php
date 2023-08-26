<?php

namespace PsiMikroskil\Larashare\Auth\Drivers;

use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use PsiMikroskil\Larashare\Auth\Models\JwtUserModel;
use PsiMikroskil\Larashare\Exceptions\NotFoundException;
use PsiMikroskil\Larashare\Interfaces\AuthDriverInterface;
use PsiMikroskil\Larashare\Support\Facades\Ldap;

class LdapAuthDriver implements AuthDriverInterface
{
    /**
     * Authenticate user with provided credentials
     *
     * @param array $credentials
     * @return Authenticatable|null
     * @throws Exception
     */
    public function authenticate(array $credentials): ?Authenticatable
    {
        $user = null;
        $username = $credentials['username'] ?? null;
        $password = $credentials['password'] ?? null;

        $ldap = Ldap::build();

        if ($ldap->search('uid=' . $username)->parse()['count'] < 1) {
            throw new NotFoundException("Akun tidak ditemukan", 401);
        }

        if (env('APP_ENV') != 'production' || $ldap->bind($username, $password)) {
            $user = new JwtUserModel(['username' => $username]);
        }

        return $user;
    }
}