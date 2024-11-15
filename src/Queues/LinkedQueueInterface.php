<?php

namespace DataStructures\Queues;

use DataStructures\Classes\NodeInterface;

interface LinkedQueueInterface
{
    public function enqueue(NodeInterface $node): self;
    public function dequeue(): mixed;
}