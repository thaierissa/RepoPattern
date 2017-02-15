<?php
require_once("Name.class.php");
class Student extends Account {
    private $MajorId,
            $Year,
            $Tranfer;


    public function __construct($netId,$firstName,$lastName,$type,$majorId,$year,$tranfer) {
        parent::__construct($netId,$firstName,$lastName,$type);
        if(!is_string($majorId)) throw new Exception("Invalid $majorId input");
        if(!is_string($year)) throw new Exception("Invalid $year input");
        if(!is_string($tranfer)) throw new Exception("Invalid $tranfer input");
        $this->MajorId = (int) $majorId;
        $this->Year = (int) $year;
        $this->Transfer = $tranfer == "1";
    }
    public function GetNetId() {
        return $this->NetId;
    }


}


?>