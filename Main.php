<?php
define('PROJECT_ROOT', __DIR__.'/');

require_once(PROJECT_ROOT.'/DependencyInjection/DI.class.php');

$container = DI::RegisterTypes();

$userService = $container->Resolve("IUserService");

$generatorUser = $userService->GetUser("ab52212");
$generatorAll = $userService->GetAll();

foreach($generatorUser as $value) echo $value->GetNetId() . "\n";
foreach($generatorAll as $value) echo $value->GetNetId() . "\n";
?>