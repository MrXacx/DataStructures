<?php

namespace DataStructures\Stacks;

use DataStructures\Classes\Arrayable;
use DataStructures\Classes\NodeInterface;

interface LinkedStackInterface extends Arrayable
{
    public function push(NodeInterface $n): self;
    public function pop(): mixed;
}