<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('project.properties.php');
require_once('DependencyInjection/DI.class.php');
$container = DI::RegisterTypes();
$Login = $container->Resolve("IAuthorizationService")->Login("ma03601","810036");
if($Login != null) {
    setcookie("token",$Login);
}
?>

