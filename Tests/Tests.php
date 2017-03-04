<?php
require_once('../project.properties.php');
require_once(PROJECT_ROOT . 'DependencyInjection/DI.class.php');

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testPDOParsing()
    {
        $container = DI::RegisterTypes();
        echo $container->Resolve("IAuthorizationService")->Login("as", "ac");
    }
}
