<?php

namespace DataStructures\Classes;

class Node implements NodeInterface
{
    public mixed $value;
    private ?NodeInterface $next = null;

    public function __construct($value = null)
    {
        $this->value = $value;
    }
    public function setNext(?NodeInterface $next): void
    {
        $this->next = $next;
    }

    public function getNext(): ?NodeInterface
    {
        return $this->next;
    }

}
