<?php

namespace DataStructures\Stacks;

use DataStructures\Exceptions\Stacks\StackOverflowException;
use DataStructures\Exceptions\Stacks\StackUnderflowException;
use DataStructures\Traits\WithSize;

class Stack implements StackInterface
{
    use WithSize;
    private int $size = 0;
    public array $stack = [];
    public readonly int $maxSize;

    public function __construct(int $maxSize)
    {
        if ($maxSize > 0) {
            $this->maxSize = $maxSize;
        } else {
            throw new StackUnderflowException($this, "The stack length must be positive or null");
        }
    }

    public function push($n): self
    {
        if ($this->size < $this->maxSize) {
            $this->stack[$this->size] = $n;
            $this->size++;
        } else {
            throw new StackOverflowException($this, "The stack is fully");
        }

        return $this;
    }

    public function pop(): mixed
    {
        $fetched = null;
        if ($this->size > 0) {
            $this->size--;
            $fetched = $this->stack[$this->size];
        } else {
            throw new StackUnderflowException($this, "The stack is empty");
        }

        return $fetched;
    }
}
