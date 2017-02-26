<?php
interface ISessionStore
{
        function Add($id, array $info);
        function IsAuthenticated($id);
}
