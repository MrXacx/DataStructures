<?php

namespace DataStructures\Queues;

use DataStructures\Exceptions\Queues\QueueOverflowException;
use DataStructures\Exceptions\Queues\QueueUnderflowException;
use DataStructures\Queues\Contracts\QueueInterface;
use DataStructures\Traits\WithSize;

class Queue implements QueueInterface
{
    use WithSize;
    public readonly int $maxSize;
    private int $size = 0;
    private array $queue = [];
    private int $startAt = 0;
    private int $endAt = 0;

    function __construct(int $maxSize)
    {
        if ($maxSize > 0) {
            $this->maxSize = $maxSize;
        } else {
            throw new QueueUnderflowException($this, "The queue size must be positive");
        }
    }

    public function enqueue($n): QueueInterface
    {
        if ($this->size < $this->maxSize) {
            $this->queue[$this->endAt] = $n;
            $this->size++;
            $this->endAt++;

            if ($this->endAt == $this->maxSize) {
                $this->endAt = 0;
            }
        } else {
            throw new QueueOverflowException($this, "The queue is fully");
        }

        return $this;
    }

    public function dequeue(): mixed
    {
        $item = null;
        if ($this->size > 0) {
            $item = $this->queue[$this->startAt];
            $this->startAt++;
            $this->size--;

            if ($this->size == 0) {
                $this->startAt = $this->endAt = 0;
            }
        } else {
            throw new QueueUnderflowException($this, "The queue is empty");
        }

        return $item;
    }

    public function toArray(): array
    {
        return $this->queue;
    }
}