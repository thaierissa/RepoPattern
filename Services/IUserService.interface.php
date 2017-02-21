<?php
interface IUserService {
    function GetUser($id);
    function AddUser(User $user);
    function GetStudentsForAdvisor($id);
}


?>