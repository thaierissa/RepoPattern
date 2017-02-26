<?php
require_once('Container.class.php');
require_once(PROJECT_ROOT . 'db.connection.properties.php');
require_once(PROJECT_ROOT . 'UnitOfWork.class.php');
require_once(PROJECT_ROOT . 'Repositories/AccountRepository.class.php');
require_once(PROJECT_ROOT . 'Services/UserService.class.php');
require_once(PROJECT_ROOT . 'Services/AuthenticationService.class.php');
require_once(PROJECT_ROOT . 'Services/AuthorizationService.class.php');
require_once(PROJECT_ROOT . 'Services/SessionStore.class.php');

class DI
{
    /**
     * Static function to register necessary objects to the DI container
     */
    public static function RegisterTypes()
    {
        $container = new Container();
        return $container->Register("PDO", new PDO(SQL_TYPE.HOST.SCHEMA, USER, PASS))
                         ->Register("IUnitOfWork", new UnitOfWork(array("IAccountRepository"=>new AccountRepository( $container->Resolve("PDO")))))
                         ->Register("IUserService", new UserService($container->Resolve("IUnitOfWork")))
                         ->Register("IAuthenticationService", new AuthenticationService("csmaster1.cs.local", "cs.local"))
                         ->Register("ISessionStore", new SessionStore())
                         ->Register("IAuthorizationService", new AuthorizationService($container->Resolve("IAuthenticationService"), $container->Resolve("ISessionStore")));
    }
}
