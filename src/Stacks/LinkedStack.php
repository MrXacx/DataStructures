<?php

namespace DataStructures\Stacks;

use DataStructures\Classes\Node;
use DataStructures\Classes\NodeInterface;
use DataStructures\Exceptions\Stacks\StackUnderflowException;
use DataStructures\Traits\WithSize;

class LinkedStack implements LinkedStackInterface
{
    use WithSize;
    private NodeInterface $onTop;
    private int $size = 0;

    function __construct()
    {
        $this->onTop = new Node();
    }
    public function push(NodeInterface $n): self
    {
        $n->setNext($this->onTop);
        $this->onTop = $n;
        $this->size++;
        return $this;
    }

    public function pop(): mixed
    {
        if ($this->size > 0){
            $n = $this->onTop->value;
            $this->onTop = $this->onTop->getNext();
            $this->size--;
        } else {
            throw new StackUnderflowException($this, "The stack is empty");
        }

        return $n;
    }
}