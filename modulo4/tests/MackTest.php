<?php

use PHPUnit\Framework\TestCase;

class MackTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);

        $mock->method("sendMessage")
            ->willReturn(true);

        $result = $mock->sendMessage("paulo@gmail.com", 'Olá');

        $this->assertTrue($result);
        

    }
}
