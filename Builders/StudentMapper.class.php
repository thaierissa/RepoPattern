<?php
require_once(PROJECT_ROOT . "Models/Student.class.php");
class StudentMapper extends MapBuilder
{
    public function __construct(PDOStatement $statement)
    {
        parent::__construct($statement);
    }
    public function Map()
    {
        foreach ($this->statement as $row) {
                yield new Student($row["net_id"], $row["first_name"], $row["last_name"], $row["type"], $row["major_id"], $row["year"], $row["transfer"]);
        }
    }
}
