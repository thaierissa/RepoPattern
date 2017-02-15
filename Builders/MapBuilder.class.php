<?php 
require_once(PROJECT_ROOT . "Models/Enums/Models.enum.php");
require_once("AccountMapper.class.php");
require_once("StudentMapper.class.php");
abstract class MapBuilder {
    protected $statement;
    abstract function Map();
    protected function __construct(PDOStatement $statement) {
        if(is_null($statement)) throw new Exception("Null statement input");
        $this->statement = $statement;
    }

    public static function Mapper($model, PDOStatement $statement) {
        if(!is_int($model)) throw new Exception ("Invalid $model input");
        if(is_null($statement)) return null;
        $map = null;
        switch($model) {
            case Models::Account: 
            $map =  new AccountMapper($statement); 
            case Models::Student:
            $map = new StudentMapper($statement);
        }
        return !is_null($map) ? $map->Map() : null;
    }

}

?>