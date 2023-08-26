<?php

namespace PsiMikroskil\Larashare\Resources\Databases\Models\UserRoles;

use PsiMikroskil\Larashare\Databases\Model;

class Individu extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool $timestamps
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string $table
     */
    protected $table = 'individu';

    /**
     * @var array $fillable
     */
    protected $fillable = ['id_kota', 'id_kecamatan', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'alamat_ktp', 'kelurahan', 'kode_pos_alamat', 'agama', 'nomor_handphone', 'nomor_telepon', 'email', 'waktu_buat', 'waktu_ubah', 'pelaku'];

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'user_roles';


}