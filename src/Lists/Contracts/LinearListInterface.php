<?php

namespace DataStructures\Lists\Contracts;

use DataStructures\Contracts\Arrayable;

interface LinearListInterface extends Arrayable
{
    public function fetch($n): ?int;
    public function append($n): self;
    public function remove($n): self;
}
