<?php
require_once('../project.properties.php');
require_once(PROJECT_ROOT . 'DependencyInjection/DI.class.php');

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testPDOParsing()
    {
        
        $container = DI::RegisterTypes();
        $userService = $container->Resolve("IUserService");
        $generatorUser = $userService->GetUser("ab52212");
        $generatorStudent = $userService->GetStudentsForAdvisor("ab52212");
        foreach ($generatorStudent as $student) {
            $this->assertEquals('ab52212', $student->GetNetId());
        }
        $this->assertEquals(1, count($generatorUser));
    }
}
