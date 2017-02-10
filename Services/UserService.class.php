<?php
require_once('IUserService.interface.php');
require_once(PROJECT_ROOT . "IUnitOfWork.interface.php");
class UserService implements IUserService {
    /**
     * Unit of Work
     * @var IUnitOfWork 
     */
    private $_UnitOfWork;

    public function __construct(IUnitOfWork $unitOfWork) {
        $this->_UnitOfWork = $unitOfWork;
    }
    public function GetUser($id) {
        if(!is_string($id)) throw new Exception("Invalid input");
        return $this->_UnitOfWork->Resolve("IAccountRepository")->Get($id);

    }
    public function GetAll() {
        return $this->_UnitOfWork->Resolve("IAccountRepository")->GetAllAccounts();
    }
    public function AddUser(User $user) {
        if($user == null) throw new Exception("Invalid input");
    }
}


?>