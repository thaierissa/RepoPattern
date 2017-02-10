<?php
require_once('Container.class.php');
require_once(PROJECT_ROOT . 'db.connection.properties.php');
require_once(PROJECT_ROOT . 'UnitOfWork.class.php');
require_once(PROJECT_ROOT . 'Repositories/AccountRepository.class.php');
require_once(PROJECT_ROOT . 'Services/UserService.class.php');
class DI {
    /**
     * Static function to register necessary objects to the DI container
     */
    public static function RegisterTypes() {
        $container = new Container();
        $container->Register("PDO", new PDO(SQL_TYPE.HOST.SCHEMA, USER, PASS));
        $container->Register("IUnitOfWork", new UnitOfWork($container->Resolve("PDO"), array("IAccountRepository"=>new AccountRepository($container->Resolve("PDO")))));
        $container->Register("IUserService",new UserService($container->Resolve("IUnitOfWork")));
        return $container;
        }
}