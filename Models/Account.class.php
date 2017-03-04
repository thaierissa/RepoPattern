<?php
require_once("Name.class.php");
class Account
{

    protected $NetId,
            $Name,
            $Type;

    public function __construct($netId, $firstName, $lastName, $type)
    {
        if (!is_string($netId)) {
            throw new Exception("Invalid $netId input");
        }
        if (!is_string($firstName)) {
            throw new Exception("Invalid $firstName input");
        }
        if (!is_string($lastName)) {
            throw new Exception("Invalid $lastName input");
        }
        if (!is_string($type)) {
            throw new Exception("Invalid $type input");
        }

        $this->NetId = $netId;
        $this->Name = new Name($firstName, $lastName);
        $this->type = (int) $type;
    }
    public function GetNetId()
    {
        return $this->NetId;
    }
        public function GetName()
    {
        return $this->Name;
    }
    public function GetType()
    {
        return $this->Type;
    }
}
