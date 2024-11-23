<?php

namespace DataStructures\Stacks;

use DataStructures\Node;
use DataStructures\Contracts\NodeInterface;
use DataStructures\Exceptions\Stacks\StackUnderflowException;
use DataStructures\Stacks\Contracts\LinkedStackInterface;
use DataStructures\Traits\WithSize;

class LinkedStack implements LinkedStackInterface
{
    use WithSize;
    private NodeInterface $onTop;
    private int $size = 0;

    public function __construct()
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
        if ($this->size > 0) {
            $n = $this->onTop->value;
            $this->onTop = $this->onTop->getNext();
            $this->size--;
        } else {
            throw new StackUnderflowException($this, "The stack is empty");
        }

        return $n;
    }

    public function toArray(): array
    {
        $arr = [];
        $node = $this->onTop;
        while ($node->getNext() != null){
            $arr[] = $node->value;
            $node = $node->getNext();
        }

        return $arr;
    }
}