<?php

namespace DataStructures\Lists;

use DataStructures\Classes\NodeInterface;

interface LinkedListInterface
{
    public function fetchPrevious(NodeInterface $node): NodeInterface;

    public function append(NodeInterface $newNode): self;

    public function remove(NodeInterface $node): self;
}
