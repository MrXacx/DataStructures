<?php

namespace DataStructures\Exceptions\Queues;

use DataStructures\Queues\QueueInterface;

abstract class QueueException extends \RuntimeException
{
    protected QueueInterface $queue;
    public function __construct(QueueInterface $queue, string $message)
    {
        parent::__construct($message);
        $this->queue = $queue;
    }

    public function __toString(): string
    {
        return json_encode([
            'queue' => $this->queue::class,
            'message' => $this->message,
            'code' => $this->code,
            'file' => $this->file,
            'line' => $this->line,
            'trace' => $this->getTrace(),
        ]);
    }
}