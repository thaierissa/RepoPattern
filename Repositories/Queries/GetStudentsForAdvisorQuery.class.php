<?php
require_once("IQuery.interface.php");
class GetStudentsForAdvisorQuery implements IQuery
{
    private $Id;
    public function __construct($id)
    {
        if (!is_string($id)) {
            throw new Exception("Invalid input type");
        }
        $this->Id = $id;
    }
    public function Find(PDO $pdo)
    {
        return $pdo->query("SELECT  ST.net_id, ST.major_id, ST.year, AC.first_name, AC.last_name, AC.type, ST.transfer FROM students ST INNER JOIN accounts AC ON ST.net_id = AC.net_id WHERE ST.net_id = '". $this->Id ."'");
    }
}
