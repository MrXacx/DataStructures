<?php

namespace DataStructures\Lists;

interface ListInterface
{
    public function fetch($n): ?int;
    public function append($n): self;
    public function remove($n): self;
}
