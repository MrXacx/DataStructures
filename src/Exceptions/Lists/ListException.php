<?php

namespace DataStructures\Exceptions\Lists;

use DataStructures\Lists\Contracts\LinkedListInterface;
use DataStructures\Lists\Contracts\LinearListInterface;

abstract class ListException extends \RuntimeException
{
    protected LinearListInterface|LinkedListInterface $list;
    public function __construct(LinearListInterface|LinkedListInterface $list, string $message)
    {
        parent::__construct($message);
        $this->list = $list;
    }

    public function __toString(): string
    {
        return json_encode([
            'list' => $this->list::class,
            'message' => $this->message,
            'code' => $this->code,
            'file' => $this->file,
            'line' => $this->line,
            'trace' => $this->getTrace(),
        ]);
    }
}
