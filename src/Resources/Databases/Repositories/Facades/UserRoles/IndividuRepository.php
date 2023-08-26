<?php

namespace PsiMikroskil\Larashare\Resources\Databases\Repositories\Facades\UserRoles;

use PsiMikroskil\Larashare\Resources\Databases\Repositories\UserRoles\IndividuRepository as FacadeSubject;
use PsiMikroskil\Larashare\Support\Facades\Repository;

/**
 * @mixin FacadeSubject
 * @method static null|int findUserIdByAkunMiso(string $akun_miso)
 */
class IndividuRepository extends Repository
{
    protected static function getClassSubject(): string
    {
        return FacadeSubject::class;
    }
}