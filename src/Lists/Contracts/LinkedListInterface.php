<?php

namespace DataStructures\Lists;

use DataStructures\Classes\Arrayable;
use DataStructures\Classes\NodeInterface;

interface LinkedListInterface extends Arrayable
{
    public function fetchPrevious(NodeInterface $node): NodeInterface;

    public function append(NodeInterface $newNode): self;

    public function remove(NodeInterface $node): self;
}