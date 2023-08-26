<?php

namespace PsiMikroskil\Larashare\Databases;

use Exception;
use LDAP\Connection;
use LDAP\Result;
use PsiMikroskil\Larashare\Exceptions\LdapConnectionException;

class Ldap
{
    /**
     * LDAP Connection instance
     *
     * @var Connection $connection
     */
    protected Connection $connection;

    /**
     * Check if connection is built yet
     *
     * @var bool $built
     */
    protected bool $built = false;

    /**
     * Search result
     *
     * @var Result $result
     */
    protected Result $result;

    /**
     * Perform binding for ldap authentication
     *
     * @param $username
     * @param $password
     * @return bool
     * @throws Exception
     */
    public function bind($username, $password): bool
    {
        if (!isset($this->built)) $this->build();

        $user = $this->search("uid=" . $username, config('ldap.directory'))->parse();

        try {
            return ldap_bind($this->connection, $user[0]['dn'], $password);
        } catch (Exception) {
            return false;
        }
    }

    /**
     * Build the connection
     *
     * @param string|null $hostname
     * @param int|null $port
     * @return self
     */
    public function build(?string $hostname = null, ?int $port = null): Ldap
    {
        $this->connection = ldap_connect($hostname ?? config('ldap.host'), $port ?? config('ldap.port'));
        ldap_set_option($this->connection, LDAP_OPT_PROTOCOL_VERSION, config('ldap.version'));
        $this->built = true;
        return $this;
    }

    /**
     * Parse the collected data from search method
     *
     * @param $id
     * @return array|false|mixed
     */
    public function parse($id = null): mixed
    {
        $entries = ldap_get_entries($this->connection, $this->result);

        return is_null($id) || $id >= $entries['count'] ? $entries : $entries[$id];
    }

    /**
     * Search data from ldap domain
     *
     * @param $filter
     * @param string|null $query
     * @return $this
     * @throws Exception
     */
    public function search($filter, ?string $query = null): Ldap
    {
        $query ??= config('ldap.directory');

        try {
            $this->result = ldap_search($this->connection, $query, $filter);
            return $this;
        } catch (Exception) {
            throw new LdapConnectionException("LDAP Connection Failed");
        }
    }
}