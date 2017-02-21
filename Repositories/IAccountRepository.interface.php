<?php
require_once("IRepository.interface.php");
interface IAccountRepository extends IRepository {
    function GetAccount($id);
    function GetAllAccounts();
    function getStudentsForAdvisor($id);

}