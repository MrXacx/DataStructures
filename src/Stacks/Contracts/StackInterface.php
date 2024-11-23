<?php

namespace DataStructures\Stacks;

use DataStructures\Classes\Arrayable;

interface StackInterface extends Arrayable
{
    public function push($n): self;
    public function pop(): mixed;
}