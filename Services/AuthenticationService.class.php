<?php
require_once("IAuthenticationService.interface.php");
class AuthenticationService implements IAuthenticationService
{
    private $LDAPConn;
    private $Domain;
    public function __construct($host, $domain)
    {
        if (!is_string($host)) {
            throw new Exception("Invalid string input");
        }
        if (!is_string($domain)) {
            throw new Exception("Invalid string input");
        }
        $this->LDAPConn = ldap_connect($host) or die("Failed Connecttion");
        $this->Domain = $domain;
    }

    public function Authenticate($user, $pass)
    {
        if (!is_string($user)) {
            throw new Exception("Invalid string input");
        }
        if (!is_string($pass)) {
            throw new Exception("Invalid string input");
        }
        return ldap_bind($LDAPConn, $user . '@' . $domain, $pass);
    }
}
