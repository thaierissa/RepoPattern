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
        
        ldap_set_option($this->LDAPConn, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($this->LDAPConn, LDAP_OPT_REFERRALS, 0);
       if(ldap_bind($this->LDAPConn, $user . '@' . $this->Domain, $pass)) {
        $filter="(sAMAccountName=$user)";
        $result = ldap_search($this->LDAPConn,"dc=cs,dc=local",$filter);
        ldap_sort($this->LDAPConn,$result,"sn");
        $info = ldap_get_entries($this->LDAPConn, $result);
        for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["samaccountname"][0] .")</p>\n";
            echo '<pre>';
            var_dump($info);
            echo '</pre>';
            $userDn = $info[$i]["distinguishedname"][0]; 
        }
        return $info;
       }
       else return null;
    }
}
