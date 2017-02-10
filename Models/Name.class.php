<?php
class Name {
    private $First,
            $Last;
    
    public function __construct($firstName,$lastName) {
        if(!is_string($firstName)) throw new Exception("Invalid $firstName input");
        if(!is_string($lastName)) throw new Exception("Invalid $lastName input");
        $this->First = $firstName;
        $this->Last = $lastName;
    }

}
