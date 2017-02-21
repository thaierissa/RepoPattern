<?php
class SessionStore implements ISessionStore
{
    private $sessionStorage;
    private $interval = 14 * 24 * 60 * 60;
    public function __construct()
    {
        $sessionStorage =  array();
    }
    public function Add($id, array $info)
    {
        $this->sessionStorage[$id] = $info;
    }
    public function IsAuthenticated($id)
    {
        if (!array_key_exists($id)) {
            return false;
        }
        return IsInInterval($id);
    }

    private function IsInInterval($id)
    {
         $user = $this->sessionStorage[$id];
        if ($user->Time > ($currentTime - $this->interval)) {
            $user->Time = $currentTime;
            $this->sessionStorage[$id] = $user;
            return true;
        }
            unset($this->sessionStorage[$id]);
            return false;
    }
}
