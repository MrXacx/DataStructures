<?php

namespace DataStructures\Queues\Contracts;

use DataStructures\Contracts\Arrayable;

interface QueueInterface extends Arrayable
{
    public function enqueue($n): self;
    public function dequeue(): mixed;
}