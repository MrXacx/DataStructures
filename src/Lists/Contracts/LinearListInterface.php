<?php

namespace DataStructures\Lists;

use DataStructures\Classes\Arrayable;

interface LinearListInterface extends Arrayable
{
    public function fetch($n): ?int;
    public function append($n): self;
    public function remove($n): self;
}
