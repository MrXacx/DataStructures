<?php

namespace Tests\Queues;

use DataStructures\Exceptions\Queues\QueueException;
use DataStructures\Exceptions\Queues\QueueOverflowException;
use DataStructures\Exceptions\Queues\QueueUnderflowException;
use DataStructures\Queues\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    public function testCanCreateQueue()
    {
        $queue = new Queue(10);
        $this->assertEquals(10, $queue->maxSize);
    }

    public function testCanNotCreateQueueWithNonPositiveLength()
    {
        try {
            $n = rand(PHP_INT_MIN, 0);
            $queue = new Queue($n);
        } catch (QueueException $e){
            $this->assertInstanceOf(QueueUnderflowException::class, $e);
        }
    }

    public function testIfTheFirstEnqueuedIsTheFirstDequeued()
    {
        $queue = new Queue(5);
        $values = [1,2,3];

        foreach ($values as $v){
            $queue->enqueue($v);
        }

        foreach ($values as $v){
            $this->assertEquals($v, $queue->dequeue());
        }

    }

    public function testCanNotEnqueueOnFullyQueue()
    {
        $queue = new Queue(1);
        $exception = null;

        try {
            $queue
                ->enqueue(1)
                ->enqueue(2);
        } catch (QueueException $e){
            $exception = $e;
        } finally {
            $this->assertInstanceOf(QueueOverflowException::class, $exception);
        }
    }

    public function testCanNotDequeueOnEmptyQueue()
    {
        $queue = new Queue(1);
        $exception = null;

        try {
            $queue->dequeue();
        } catch (QueueException $e){
            $exception = $e;
        } finally {
            $this->assertInstanceOf(QueueUnderflowException::class, $exception);
        }
    }

    public function testIfIsArrayable()
    {
        $queue = new Queue(5);
        $arr = [1, 26, 88, -2];

        foreach ($arr as $i){
            $queue->enqueue($i);
        }

        $this->assertEquals($arr, $queue->toArray());
    }
}
