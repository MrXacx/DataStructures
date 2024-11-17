<?php

namespace DataStructures\Queues;

interface QueueInterface
{
    public function enqueue($n): self;
    public function dequeue(): mixed;
}
