<?php

namespace DataStructures\Exceptions\Stacks;

use DataStructures\Stacks\StackInterface;
use RuntimeException;

abstract class StackException extends RuntimeException
{
    protected StackInterface $stack;
    public function __construct(StackInterface $stack, string $message)
    {
        parent::__construct($message);
        $this->stack = $stack;
    }

    public function __toString(): string
    {
        return json_encode([
            'stack' => $this->stack::class,
            'message' => $this->message,
            'code' => $this->code,
            'file' => $this->file,
            'line' => $this->line,
            'trace' => $this->getTrace(),
        ]);
    }
}