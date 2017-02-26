<?php
require_once('project.properties.php');
require_once('DependencyInjection/DI.class.php');
$container = DI::RegisterTypes();
echo $container->Resolve("IAuthorizationService")->Login("","");
?>

