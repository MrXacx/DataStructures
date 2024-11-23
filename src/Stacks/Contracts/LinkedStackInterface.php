<?php

namespace DataStructures\Stacks\Contracts;

use DataStructures\Contracts\Arrayable;
use DataStructures\Contracts\NodeInterface;

interface LinkedStackInterface extends Arrayable
{
    public function push(NodeInterface $n): self;
    public function pop(): mixed;
}