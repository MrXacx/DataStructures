<?php

namespace DataStructures\Stacks;

interface StackInterface
{
    public function push($n): self;
    public function pop(): mixed;
}