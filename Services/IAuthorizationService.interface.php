<?php
interface IAuthorizationService
{
    function Login($user, $pass);
    function Logout($id);
}
