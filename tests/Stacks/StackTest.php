<?php

namespace Tests\Stacks;

use DataStructures\Classes\Node;
use DataStructures\Exceptions\Stacks\StackOverflowException;
use DataStructures\Exceptions\Stacks\StackUnderflowException;
use DataStructures\Exceptions\Stacks\StackException;
use DataStructures\Lists\LinkedList;
use DataStructures\Stacks\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testCanCreateStackWithPositiveSize()
    {
        $n = rand(1, 100);
        $stack = new Stack($n);
        $this->assertInstanceOf(Stack::class, $stack);
        $this->assertEquals($n, $stack->maxSize);
    }

    public function testCanNotCreateStackWithNonPositiveSize()
    {
        $n = rand(PHP_INT_MIN, 0);
        $exception = null;

        try {
            new Stack($n);
        } catch (StackException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(StackUnderflowException::class, $exception);
        }

    }

    public function testIfTheLastPushedIsTheFirstPopped()
    {
        $stack = new Stack(5);
        $arr = [1, '2', 'a', false];
        array_map([$stack, 'push'], $arr);
        $arr = array_reverse($arr);
        $this->assertTrue(array_reduce($arr, fn($carry, $item) => $carry && $item == $stack->pop(), true));
    }

    public function testCanNotPushOnFullyStack()
    {
        $stack = new Stack(1);
        $exception = null;

        try {
            $stack
                ->push(1)
                ->push(2);
        } catch (StackException $e){
            $exception = $e;
        } finally {
            $this->assertInstanceOf(StackOverflowException::class, $exception);
        }

    }

    public function testCanNotPopEmptyStack()
    {
        $stack = new Stack(3);
        $exception = null;

        try {
            $stack->pop();
        } catch (StackException $e){
            $exception = $e;
        } finally {
            $this->assertInstanceOf(StackUnderflowException::class, $exception);
        }

    }
}
