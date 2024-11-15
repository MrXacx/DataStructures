<?php

namespace DataStructures\Stacks;

use DataStructures\Classes\NodeInterface;

interface LinkedStackInterface
{
    public function push(NodeInterface $n): self;
    public function pop(): mixed;
}