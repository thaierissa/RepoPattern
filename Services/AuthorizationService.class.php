<?php
require_once("IAuthorizationService.interface.php");
require_once("IAuthenticationService.interface.php");
require_once("ISessionStore.interface.php");

class AuthorizationService implements IAuthorizationService
{
    private $_AuthenticationService;
    private $_SessionStore;

    public function __construct(IAuthenticanService $authService, ISessionStore $sessionStore)
    {
        if (is_null($authService)) {
            throw new Exception("Invalid input $authService");
        }
        if (is_null($sessionStore)) {
            throw new Exception("Invalid input $sessionStore");
        }
        $_AuthenticationService= $authService;
        $_SessionStore = $sessionStore;
    }

    public function Login($user, $pass)
    {
        if ($_AuthenticationService->Login($user, $pass)) {
            $guid = com_create_guid();
            $userInfo = array("Time" -> time());
            $_SessionStore->Add($guid, $userInfo);
            return $guid;
        }
        return null;
    }
}
