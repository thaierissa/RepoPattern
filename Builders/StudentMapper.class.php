<?php
require_once(PROJECT_ROOT . "Models/Student.class.php");
require_once("MapBuilder.class.php");
class StudentMapper extends MapBuilder
{
    public function __construct(PDOStatement $statement)
    {
        parent::__construct($statement);
    }
    public function Map()
    {
        $returnArray = [];
        foreach ($this->statement as $row) {
                array_push($returnArray,new Student($row["net_id"], $row["first_name"], $row["last_name"], $row["type"], $row["major_id"], $row["year"], $row["transfer"]));
        }
        return sizeof($returnArray) === 0 ? null : $returnArray;
    }
}
