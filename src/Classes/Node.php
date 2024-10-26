<?php

namespace DataStructures\Classes;

class Node implements NodeInterface
{
    public mixed $value;
    private ?Node $next = null;

    function __construct($value = null)
    {
        $this->value = $value;
    }
    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

}