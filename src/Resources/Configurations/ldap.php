<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Ldap Server Host
    |--------------------------------------------------------------------------
    |
    | This option controls the default ldap server host that is used to perform
    | ldap activity (binding, search, etc) in LdapUtility. Alternative server may be
    | setup and used as needed; however, this is the default connection used.
    |
    */
    'host' => env('LDAP_HOST', '127.0.0.1'),

    /*
    |--------------------------------------------------------------------------
    | Ldap Server Port
    |--------------------------------------------------------------------------
    |
    | This option controls the default ldap server port that is used to perform
    | ldap activity (binding, search, etc) in LdapUtility. Alternative server may be
    | setup and used as needed; however, this is the default connection used. Default
    | port number is 389.
    |
    */
    'port' => env('LDAP_PORT', '389'),

    /*
    |--------------------------------------------------------------------------
    | Ldap Search Directory
    |--------------------------------------------------------------------------
    |
    | This options control the default directory to perform searching or binding
    | in ldap connection.
    |
    */
    'directory' => env('LDAP_DIRECTORY', 'dc=mikroskil,dc=ac,dc=id'),

    /*
    |--------------------------------------------------------------------------
    | Ldap Protocol Version
    |--------------------------------------------------------------------------
    |
    | Over time there's been multiple versions of the LDAP protocol with
    | incompatibilities. The latest version and the only viable one is version 3
    | (LDAPv2 has been set historical and deprecated). Many LDAP client libraries
    | still offer support for both LDAPv2 and LDAPv3, and to show their age, they
    | are still defaulting to LDAPv2, unless setting the option to use LDAPv3
    |
    */
    'version' => env('LDAP_VERSION', 3)

];
