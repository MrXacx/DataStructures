<?php

namespace DataStructures\Classes;

interface NodeInterface
{
    public function setNext(?NodeInterface $next): void;
    public function getNext(): ?NodeInterface;
}

