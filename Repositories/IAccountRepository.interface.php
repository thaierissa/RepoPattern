<?php
require_once("IRepository.interface.php");
interface IAccountRepository extends IRepository {

    function Get($id);
    function GetAllAccounts();


}