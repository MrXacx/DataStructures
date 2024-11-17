<?php

namespace DataStructures\Lists;

interface LinearListInterface
{
    public function fetch($n): ?int;
    public function append($n): self;
    public function remove($n): self;
}
