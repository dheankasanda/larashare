<?php

namespace PsiMikroskil\Larashare\Support\Facades;

use PsiMikroskil\Larashare\Databases\Ldap as FacadeSubject;
use PsiMikroskil\Larashare\Support\Patterns\Facade;

/**
 * @mixin FacadeSubject
 * @method static bool bind($username, $password)
 * @method static FacadeSubject build(?string $hostname = null, ?int $port = null)
 * @method static mixed parse($id = null)
 * @method static FacadeSubject search($filter, ?string $query = null)
 *
 */
class Ldap extends Facade
{
    /**
     * @inheritDoc
     */
    protected static function getClassSubject(): string
    {
        return FacadeSubject::class;
    }
}