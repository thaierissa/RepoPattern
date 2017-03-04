<?php
require_once('ISessionStore.interface.php');
class SessionStore implements ISessionStore
{
    /**
    * The Session Storage
    * @var Array
    */
    private $sessionStorage;
    /**
    * Expiration interval
    * @var Int
    */
    private $Interval;
     /**
     * Class constructor
     */
    public function __construct()
    {
        $this->sessionStorage =  array();
        // set interval to two weeks
        $this->Interval = (14 * 24 * 60 * 60);
    }
    /**
    * Add element to session storage
    * @param $id String
    * @param $info Array
    */
    public function Add($id, array $info)
    {
        if (!is_string($id)) {
            throw new Exception("Invalid token input");
        }
        if (!is_array($info)) {
            throw new Exception("Invalid info input");
        }
        $this->sessionStorage[$id] = $info;
    }
    /**
    * Remove element from session storage
    * @param $id String
    * @return Boolean
    */
    public function Remove($id)
    {
        if (!is_string($id)) {
            throw new Exception("Invalid token input");
        }
        if (array_key_exists($id)) {
            unset($this->sessionStorage[$id]);
            unset($id);
            return true;
        };
         return false;
    }
    /**
    * Validates if token is still valid.
    * @param $id String
    * @return Boolean
    */
    public function IsAuthenticated($id)
    {
        if (!array_key_exists($id)) {
            return false;
        }
        return $this->IsInInterval($id);
    }
    /**
    * Validates if token is in the interval.
    * @param $id String
    * @return Boolean
    */
    private function IsInInterval($id)
    {
        if (!is_string($id)) {
            throw new Exception("Invalid token input");
        }
         $user = $this->sessionStorage[$id];
        if ($user->Time > ($currentTime - $this->Interval)) {
            $user->Time = $currentTime;
            $this->sessionStorage[$id] = $user;
            return true;
        }
            unset($this->sessionStorage[$id]);
            return false;
    }
}
