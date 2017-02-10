<?php
require_once("IRepository.interface.php");
abstract class Repository implements IRepository {
    protected static $PDO;
    /**
     * Class constructor
     * @param PDO $pdo
     */
    protected function __construct(PDO &$pdo) {
        if(is_null(self::$PDO)) self::$PDO = $pdo;
    }

   public abstract function Find($obj);
    
    public function Create($obj) {

    } 
    public function Remove($obj) {

    }
    public function Update($obj) {
        if(!property_exists($obj,"Id")) throw new Exception("Id property does not exist");
    }
    protected function Get($tableName,$column,$id) {
        return self::$PDO->query("SELECT * FROM " . $tableName . " WHERE " . $column . "  = '" . $id . "'");
    }
    
}


?>