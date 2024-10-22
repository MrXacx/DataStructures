<?php

namespace DataStructures\Exceptions;

use DataStructures\Lists\ListInterface;

abstract class ListException extends \RuntimeException
{
    protected ListInterface $list;
    public function __construct(ListInterface $list, string $message)
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
