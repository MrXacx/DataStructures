<?php

namespace DataStructures\Contracts;

interface NodeInterface
{
    public function setNext(?NodeInterface $next): void;
    public function getNext(): ?NodeInterface;
}

