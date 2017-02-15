<?php
class Conditionals {
    private $Column;
    private $Value;

    public function __construct($column,$value) {
        if(!is_string($column)) throw new Exception("Invalid input type");
        if(!is_string($value)) throw new Exception("Invalid input type");
        $this->Column = $column;
        $this->Value = $value;
    }

}


?>