<?php

namespace PsiMikroskil\Larashare\Resources\Databases\Repositories\UserRoles;

use PsiMikroskil\Larashare\Databases\Repository;

class IndividuRepository extends Repository
{
    /**
     * Get user id by their miso account username
     *
     * @param string $akun_miso
     * @return int|null
     */
    public function findUserIdByAkunMiso(string $akun_miso): ?int
    {
        $result = $this->builder(true)
            ->where('peran_individu.akun_miso', $akun_miso)
            ->join('peran_individu', 'peran_individu.id_individu', 'individu.id')
            ->distinct()
            ->first('individu.id');

        return isset($result->id) ? $result->id : null;
    }
}