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
    private ?NodeInterface $onLeft = null;
    private ?NodeInterface $onRight = null;

    private int $size = 0;

    public function enqueue(NodeInterface $node): \DataStructures\Queues\LinkedQueueInterface
    {
        if ($this->onRight == null) {
            $this->onLeft = $node;
        } else {
            $this->onRight->setNext($node);
        }

        $this->onRight = $node;
        $this->size++;

        return $this;
    }

    public function dequeue(): mixed
    {
        if ($this->onLeft != null) {
            $n = $this->onLeft->value;
            $this->onLeft = $this->onLeft->getNext();

            if ($this->onLeft == null) {
                $this->onRight = null;
            }
        } else {
            throw new QueueUnderflowException($this, "The queue is empty");
        }

        return $n;
    }
}
