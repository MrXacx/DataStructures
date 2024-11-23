<?php

namespace DataStructures\Queues;

use DataStructures\Classes\Arrayable;

interface QueueInterface extends Arrayable
{
    public function enqueue($n): self;
    public function dequeue(): mixed;
}