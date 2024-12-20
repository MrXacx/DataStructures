<?php

namespace Tests\Stacks;

use DataStructures\Classes\Node;
use DataStructures\Exceptions\Stacks\StackException;
use DataStructures\Exceptions\Stacks\StackUnderflowException;
use DataStructures\Stacks\LinkedStack;
use PHPUnit\Framework\TestCase;

class LinkedStackTest extends TestCase
{
    public function testIfTheLastPushedIsTheFirstPopped()
    {
        $stack = new LinkedStack();

        for ($i = 0; $i < 7; $i++) {
            $stack->push(new Node($i));
        }

        for ($i--; $i > 0; $i--) {
            $this->assertEquals($i, $stack->pop());
        }
    }

    public function testCanNotPopOnEmptyStack()
    {
        $stack = new LinkedStack();
        $exception = null;

        try {
            $stack->pop();
        } catch (StackException $ex) {
            $exception = $ex;
        } finally {
            $this->assertInstanceOf(StackUnderflowException::class, $exception);
        }
    }
}
