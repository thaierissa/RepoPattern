<?php
require_once("IRepository.interface.php");
require_once("Queries/IQuery.interface.php");

abstract class Repository implements IRepository
{
    protected static $PDO;
    /**
     * Class constructor
     * @param PDO $pdo
     */
    protected function __construct(PDO &$pdo)
    {
        if (is_null(self::$PDO)) {
            self::$PDO = $pdo;
        }
    }

    protected function Find(IQuery $obj)
    {
        if (is_null($obj)) {
            throw new Exception("Invalid input type");
        }
        return $obj->Find(self::$PDO);
    }
    
    public function Create($query)
    {
        $PDO->exec($query);
    }
    public function Remove($obj)
    {
    }
    public function Update($obj)
    {
        if (!property_exists($obj, "Id")) {
            throw new Exception("Id property does not exist");
        }
    }
    protected function Get($tableName, $column, $id)
    {
        return self::$PDO->query("SELECT * FROM " . $tableName . " WHERE " . $column . "  = '" . $id . "'");
    }
}
