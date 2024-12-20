<?php

namespace DataStructures\Trees\Contracts;

use DataStructures\Trees\Utils\TreeFetchResult;

interface BinaryTreeInterface extends TreeInterface
{
    public function setOnLeft(BinaryTreeInterface $onLeft): void;
    public function setOnRight(BinaryTreeInterface $onRight): void;
    public function inPreorder(callable $callback): void;
    public function inOrder(callable $callback): void;
    public function inPostorder(callable $callback): void;
    public function fetch($x): TreeFetchResult;
}
