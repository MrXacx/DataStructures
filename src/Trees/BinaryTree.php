<?php

namespace DataStructures\Trees;

use DataStructures\Trees\Contracts\BinaryTreeInterface;
use DataStructures\Trees\Utils\TreeFetchResult;

class BinaryTree implements BinaryTreeInterface
{
    public mixed $value;
    private ?BinaryTreeInterface $onLeft = null;
    private ?BinaryTreeInterface $onRight = null;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function setOnLeft(BinaryTreeInterface $onLeft): void
    {
        $this->onLeft = $onLeft;
    }

    public function setOnRight(BinaryTreeInterface $onRight): void
    {
        $this->onRight = $onRight;
    }

    public function inPreorder(callable $callback): void
    {
        $callback($this);
        $this->onLeft?->inPreorder($callback);
        $this->onRight?->inPreorder($callback);
    }

    public function inOrder(callable $callback): void
    {
        $this->onLeft?->inPreorder($callback);
        $callback($this);
        $this->onRight?->inPreorder($callback);
    }

    public function inPostorder(callable $callback): void
    {
        $this->onLeft?->inPreorder($callback);
        $this->onRight?->inPreorder($callback);
        $callback($this);
    }

    public function add($x): self
    {
        [$flag, $parent,] = $this->fetch($x)->toArray();
        if ($flag != 1) {
            switch ($flag) {
                case 0:
                    $this->value = $x;
                    break;
                case 2:
                    $leaf = new BinaryTree($x);
                    $parent->setOnLeft($leaf);
                    break;
                case 3:
                    $leaf = new BinaryTree($x);
                    $parent->setOnRight($leaf);
                    break;
            }
        }

        return $this;
    }

    /*public function remove($x): TreeInterface
    {
        // TODO: Implement remove() method.
    }*/

    public function fetch($x): TreeFetchResult
    {
        if ($this->value == null) { // If the tree is empty
            $flag = 0;
        } elseif ($this->value == $x) { // If this is the fetched node
            [$flag, $result] = [1, $this];
        } elseif ($x < $this->value) { // If the fetched node is less than this
            if ($this->onLeft == null) { // If node less than this does not exist
                [$flag, $parent] = [2, $this];
            } else {
                [$flag, $parent, $result] = $this->onLeft->fetch($x)->toArray();
            }
        } else { // If the fetched node is greater than this
            if ($this->onRight == null) { // If node greater than this does not exist
                [$flag, $parent] = [3, $this];
            } else {
                [$flag, $parent, $result] = $this->onRight->fetch($x)->toArray();
            }
        }

        return new TreeFetchResult($flag, $parent ?? null, $result ?? null);
    }
}
