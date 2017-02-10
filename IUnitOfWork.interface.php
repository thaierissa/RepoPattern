<?php
interface IUnitOfWork {
    function Begin();
    function Complete();
    function Resolve($name);
}