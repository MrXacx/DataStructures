<?php

namespace DataStructures\Lists\Contracts;

use DataStructures\Contracts\Arrayable;
use DataStructures\Contracts\NodeInterface;

interface LinkedListInterface extends Arrayable
{
    public function fetchPrevious(NodeInterface $node): NodeInterface;

    public function append(NodeInterface $newNode): self;

    public function remove(NodeInterface $node): self;
}
