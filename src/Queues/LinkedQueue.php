<?php

namespace DataStructures\Queues;

use DataStructures\Classes\Node;
use DataStructures\Classes\NodeInterface;
use DataStructures\Exceptions\Queues\QueueUnderflowException;
use DataStructures\Queues\LinkedQueueInterface;
use DataStructures\Traits\WithSize;

class LinkedQueue implements LinkedQueueInterface
{
    use WithSize;
    private ?NodeInterface $header;

    private int $size = 0;

    function __construct()
    {
        $this->header = new Node();
    }

    public function enqueue(NodeInterface $node): \DataStructures\Queues\LinkedQueueInterface
    {
        $onRight = $this->header;
        while ($onRight->getNext()){
            $onRight = $onRight->getNext();
        }

        $onRight->setNext($node);
        $this->size++;

        return $this;
    }

    public function dequeue(): mixed
    {
        if ($this->size > 0) {
            $onLeft = $this->header->getNext();
            $this->header->setNext($onLeft->getNext());

            $n = $onLeft->value;
            $this->size--;
        } else {
            throw new QueueUnderflowException($this, "The queue is empty");
        }

        return $n;
    }
}