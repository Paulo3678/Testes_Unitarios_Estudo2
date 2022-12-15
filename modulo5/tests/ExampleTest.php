<?php

use Mockery\Adapter\Phpunit\MockeryTestCase;

class ExampleTest extends MockeryTestCase
{
    public function testIfFivePlusFiveIsTen(): void
    {
        $this->assertEquals(10, (5+5));
    }
}
