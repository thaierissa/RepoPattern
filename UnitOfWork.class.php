<?php
require_once("IUnitOfWork.interface.php");
require_once(PROJECT_ROOT . 'DependencyInjection/Container.class.php');
class UnitOfWork implements IUnitOfWork {

    /**
     * Container store for all the repositories
     * @var Container 
     */
    private $Repositories;
    /**
     * Class constructor
     * @param PDO $pdo
     * @param Array $repositories 
     */
    public function __construct(array $repositories) {
        $this->Repositories = new Container();
        //Loops through array and adds them to our container through appropriate method. (Done for error checking)
        foreach ($repositories as $key => $value)
            $this->Repositories->Register($key,$value);
    }
    /**
     * Resolves repository given name
     * @param String $name
     */
    public function Resolve($name) {
        return $this->Repositories->Resolve($name);
    }

}