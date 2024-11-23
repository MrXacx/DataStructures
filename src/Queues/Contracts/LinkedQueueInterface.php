<?php

namespace DataStructures\Queues;

use DataStructures\Classes\Arrayable;
use DataStructures\Classes\NodeInterface;

interface LinkedQueueInterface extends Arrayable
{
    public function enqueue(NodeInterface $node): self;
    public function dequeue(): mixed;
}