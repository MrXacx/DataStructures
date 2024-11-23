<?php

namespace DataStructures\Queues\Contracts;

use DataStructures\Contracts\Arrayable;
use DataStructures\Contracts\NodeInterface;

interface LinkedQueueInterface extends Arrayable
{
    public function enqueue(NodeInterface $node): self;
    public function dequeue(): mixed;
}