<?php

namespace DataStructures\Stacks\Contracts;

use DataStructures\Contracts\Arrayable;

interface StackInterface extends Arrayable
{
    public function push($n): self;
    public function pop(): mixed;
}