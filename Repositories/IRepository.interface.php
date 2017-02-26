<?php
interface IRepository
{
    function Create($obj);
    function Remove($obj);
    function Update($obj);
}
