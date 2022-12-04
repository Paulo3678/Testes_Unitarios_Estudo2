<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    /**
     * @var Queue $queue
     */
    protected static $queue;


    
    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue();
    }

    protected function setUp()
    {
        static::$queue->clear();
    }

    public function testNewQueueIsEmpty()
    {
        $expected = 0;
        $this->assertEquals($expected, static::$queue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        static::$queue->push("green");
        $this->assertEquals(1, static::$queue->getCount());
    }

    public function testAnItemsIsRemovedFromTheQueue()
    {
        static::$queue->push("green");
        $item = static::$queue->pop();

        $this->assertEquals(0, static::$queue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push("first");
        static::$queue->push("second");

        $this->assertEquals('first', static::$queue->pop());
    }

    public function testMaxNumberOfItemsCanBeAddedd()
    {
        for ($i=0; $i < Queue::MAX_ITEMS; $i++) { 
            static::$queue->push($i);
        }

        $this->assertEquals(5, static::$queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i=0; $i < Queue::MAX_ITEMS; $i++) { 
            static::$queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage("Queue is full");
        static::$queue->push('wafer thin mint');

    }
}
