<?php

namespace DataStructures\Lists;

use DataStructures\Node;
use DataStructures\Contracts\NodeInterface;
use DataStructures\Exceptions\Lists\DuplicatedListItemException;
use DataStructures\Exceptions\Lists\NonInsertedItemException;
use DataStructures\Lists\Contracts\LinkedListInterface;
use DataStructures\Traits\WithSize;

class LinkedList implements LinkedListInterface
{
    use WithSize;
    private int $size = 0;
    private readonly Node $head;

    public function __construct()
    {
        $this->head = new Node();
    }
    public function fetchPrevious(NodeInterface $node): NodeInterface
    {
        $currentNode = $this->head->getNext();
        $previousNode = $this->head;

        while ($currentNode != null and $currentNode->value < $node->value) {
            $previousNode = $currentNode;
            $currentNode = $currentNode->getNext();
        }

        return $previousNode;
    }

    public function append(NodeInterface $newNode): self
    {
       $previousNode = $this->fetchPrevious($newNode);
       if ($previousNode->getNext() == null or $previousNode->getNext()->value != $newNode->value){
           $nextNode = $previousNode->getNext();
           $newNode->setNext($nextNode);
           $previousNode->setNext($newNode);

            $this->size++;
        } else {
            throw new DuplicatedListItemException($this, "The node $newNode->value has on list");
        }

        return $this;
    }

    public function remove(NodeInterface $node): self
    {
        $previousNode = $this->fetchPrevious($node);
        if ($previousNode->getNext() != null) {
            $nextNode = $node->getNext();
            $previousNode->setNext($nextNode);

            $this->size--;
        } else {
            throw new NonInsertedItemException($this, "The node $node->value does not exists on list");
        }

        return $this;
    }

    public function toArray(): array
    {
        $node = $this->head->getNext();
        $arr = [];
        while ($node !== null){
            $arr[] = $node->value;
            $node = $node->getNext();
        }

        return $arr;
    }
}