<?php

namespace DataStructures\Classes;

interface NodeInterface
{
    public function setNext(?Node $next): void;
    public function getNext(): ?Node;
}

