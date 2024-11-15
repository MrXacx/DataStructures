<?php

namespace DataStructures\Stacks;

use DataStructures\Classes\Node;
use DataStructures\Classes\NodeInterface;
use DataStructures\Exceptions\Stacks\StackUnderflowException;

class LinkedStack implements LinkedStackInterface
{
    private NodeInterface $onTop;

    function __construct()
    {
        $this->onTop = new Node();
    }
    public function push(NodeInterface $n): self
    {
        $n->setNext($this->onTop);
        $this->onTop = $n;
        return $this;
    }

    public function pop(): mixed
    {
        if ($this->onTop->getNext()){
            $n = $this->onTop->value;
            $this->onTop = $this->onTop->getNext();
        } else {
            throw new StackUnderflowException($this, "The stack is empty");
        }

        return $n;
    }
}