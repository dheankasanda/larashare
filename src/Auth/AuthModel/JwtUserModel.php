<?php

namespace PsiMikroskil\Larashare\Auth\AuthModel;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PsiMikroskil\Larashare\Resources\Databases\Models\UserRoles\Individu;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * @property string $username
 */
class JwtUserModel extends Authenticatable implements JWTSubject
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['username'];


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return config('app.name', env('APP_NAME'));
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [
            'username' => $this->username
        ];
    }

    /**
     * @return BelongsTo
     */
    public function individu(): BelongsTo
    {
        return $this->belongsTo(Individu::class, 'id_individu');
    }

}