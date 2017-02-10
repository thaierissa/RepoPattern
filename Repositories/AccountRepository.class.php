 <?php
require_once("IAccountRepository.interface.php");
require_once("Repository.class.php");
require_once(PROJECT_ROOT . "Builders/MapBuilder.class.php");
require_once(PROJECT_ROOT . "Models/Enums/Models.enum.php");
class AccountRepository extends Repository implements IAccountRepository {
    public function __construct(PDO &$pdo)
    {
        parent::__construct($pdo);
    }
    public function Get($id) {
        return MapBuilder::Mapper(Models::Account,parent::Get("accounts","net_id",$id));
    }
    public function GetAllAccounts() {
        return MapBuilder::Mapper(Models::Account,parent::$PDO->query("SELECT * FROM accounts"));
    }
    public function Find($obj) {

    }
}



 ?>