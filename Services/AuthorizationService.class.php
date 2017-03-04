<?php
require_once("IAuthorizationService.interface.php");
require_once("IAuthenticationService.interface.php");
require_once("ISessionStore.interface.php");
require_once(PROJECT_ROOT . "IUnitOfWork.interface.php");

class AuthorizationService implements IAuthorizationService
{
    /**
    * Authentication Service
    * @var AuthenticationService
    */
    private $_AuthenticationService;
    /**
    * Session Store
    * @var SessionStore
    */
    private $_SessionStore;
     /**
    * Unit Of Work
    * @var UnitOfWork
    */
    private $_UnitOfWork;
    /**
    * Class constructor
    * @param IAuthenticationService AuthenticationService
    * @param ISessionStore SessionStore
    * @param IUnitOfWork UnitOfWork
    */
    public function __construct(IAuthenticationService $authService, ISessionStore $sessionStore, IUnitOfWork $unitOfWork)
    {
        if (is_null($authService)) {
            throw new Exception("Invalid input $authService");
        }
        if (is_null($sessionStore)) {
            throw new Exception("Invalid input $sessionStore");
        }
         if (is_null($unitOfWork)) {
            throw new Exception("Invalid input $unitOfWork");
        }
        $this->_AuthenticationService = $authService;
        $this->_SessionStore = $sessionStore;
        $this->_UnitOfWork = $unitOfWork;
    }
    /**
    * Generates a guid
    * @return String
    */
    private function getGUID()
    {
     // Taken from http://guid.us/GUID/PHP
        return $charid = strtoupper(md5(uniqid(rand(), true)));
    }

    /**
    * Request a login from the LDAP server
    * @param String $user The Username
    * @param String $pass The Password
    * @return String
    */
    public function Login($user, $pass)
    {
        if (!is_string($user)) {
            throw new Exception("Invalid username input");
        }
        if (!is_string($pass)) {
            throw new Exception("Invalid password input");
        }
        if ($this->_AuthenticationService->Authenticate($user, $pass) === null) {
            $guid = $this->getGUID();
            $userInfo = array("Time" => time());
            $account = $this->_UnitOfWork->Resolve("IAccountRepository")->GetAccount($user);
            //if in db, get their type, otherwise, push them to db as unclassified.
            if(sizeof($account) === 1) {
                $userInfo["Type"] = current($account)->GetType();
            }
            else {
                            
            }
            $this->_SessionStore->Add($guid, $userInfo);
            return $guid;
        }
        return null;
    }
    /**
    * Remove token from session store
    * @param String $token The Token
    * @return String $pass The Password2
    */
    public function Logout($token)
    {
        if (!is_string($token)) {
            throw new Exception("Invalid token input");
        }
        $this->_SessionStore->Remove($token);
    }
}
