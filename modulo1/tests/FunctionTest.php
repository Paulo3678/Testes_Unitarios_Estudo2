<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddReturnTheCorrectSum()
    {
        require __DIR__ . "/../functions.php";

        $expected_value = 4;
        $actual_value = add(2, 2);

        $expected_value2 = 8;
        $actual_value2 = add(3, 5);

        $this->assertEquals($expected_value, $actual_value);
        $this->assertEquals($expected_value2, $actual_value2);
    }

    public function testADdDoesNotReturnTheIncorrectSum()
    {
        $this->assertNotEquals(5, add(2, 2));
    }
}
