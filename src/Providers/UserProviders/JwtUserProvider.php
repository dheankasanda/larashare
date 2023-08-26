<?php

namespace PsiMikroskil\Larashare\Providers\UserProviders;

use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use PsiMikroskil\Larashare\Auth\Models\JwtUserModel;
use PsiMikroskil\Larashare\Exceptions\NotFoundException;
use PsiMikroskil\Larashare\Interfaces\AuthDriverInterface;
use PsiMikroskil\Larashare\Resources\Databases\Models\UserRoles\Individu;
use PsiMikroskil\Larashare\Resources\Databases\Repositories\Facades\UserRoles\IndividuRepository;

class JwtUserProvider implements UserProvider
{
    /**
     * Authentication driver used to validate credential
     *
     * @var AuthDriverInterface $authDriver
     */
    protected AuthDriverInterface $authDriver;

    /**
     * Select what data will
     *
     * @var array $expected_data
     */
    protected array $expected_data;


    public function __construct(AuthDriverInterface $authDriver, array $expected_data = ['*'])
    {
        $this->authDriver = $authDriver;
        $this->expected_data = $expected_data;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param mixed $identifier
     * @return Authenticatable|null
     */
    public function retrieveById($identifier): ?Authenticatable
    {
        $user = null;
        $payload = auth()->guard('jwt')->payload();
        $username = $payload->get('username');

        if (!$username) return null;

        $user_id = IndividuRepository::findUserIdByAkunMiso($username);
        $individu = Individu::select($this->expected_data)->find($user_id);

        if (!is_null($individu)) {
            $user = new JwtUserModel(['username' => $username]);
            $user->individu()->associate($individu);
        }

        return $user;
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param mixed $identifier
     * @param string $token
     * @return Authenticatable|null
     */
    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        return null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param Authenticatable $user
     * @param string $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // TODO: Implement updateRememberToken() method.
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param array $credentials
     * @return Authenticatable|null
     * @throws NotFoundException
     * @throws Exception
     */
    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        return $this->authDriver->authenticate($credentials);
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        return true;
    }
}