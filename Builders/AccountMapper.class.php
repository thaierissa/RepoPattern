<?php
require_once(PROJECT_ROOT . "Models/Account.class.php");
class AccountMapper extends MapBuilder
{
    public function __construct(PDOStatement $statement)
    {
        parent::__construct($statement);
    }
    public function Map()
    {
        foreach ($this->statement as $row) {
                yield new Account($row["net_id"], $row["first_name"], $row["last_name"], $row["type"]);
        }
    }
}
