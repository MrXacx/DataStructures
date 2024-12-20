<?php

namespace Tests\Queues;

use DataStructures\Classes\Node;
use DataStructures\Exceptions\Queues\QueueException;
use DataStructures\Exceptions\Queues\QueueUnderflowException;
use DataStructures\Queues\LinkedQueue;
use DataStructures\Queues\Queue;
use PHPUnit\Framework\TestCase;

class LinkedQueueTest extends TestCase
{
    public function testIfTheFirstEnqueuedIsTheFirstDequeued()
    {
        $queue = new LinkedQueue();
        $values = [1,2,3,4,5,6,7];

        foreach ($values as $v) {
            $queue->enqueue(new Node($v));
        }

        foreach ($values as $v) {
            $this->assertEquals($v, $queue->dequeue());
        }

    }

    public function testCanNotDequeueOnEmptyQueue()
    {
        $queue = new LinkedQueue();
        $exception = null;

        try {
            $queue->dequeue();
        } catch (QueueException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(QueueUnderflowException::class, $exception);
        }
    }
}
