<?php
require_once(PROJECT_ROOT . "Models/Account.class.php");
require_once("MapBuilder.class.php");
class AccountMapper extends MapBuilder
{
    public function __construct(PDOStatement $statement)
    {
        parent::__construct($statement);
    }
    public function Map()
    {
        $returnArray = [];
        foreach ($this->statement as $row) {
                array_push($returnArray, new Account($row["net_id"], $row["first_name"], $row["last_name"], $row["type"]));
        }
        return sizeof($returnArray) === 0 ? null : $returnArray;
    }
}
