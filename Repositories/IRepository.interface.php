<?php
interface IRepository {
    function Find($obj);
    function Create($obj);
    function Remove($obj);
    function Update($obj);
}
?>