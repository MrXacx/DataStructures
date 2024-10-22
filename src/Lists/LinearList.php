<?php

namespace DataStructures\Lists;

use DataStructures\Exceptions\DuplicatedListItemException;
use DataStructures\Exceptions\ListException;
use DataStructures\Exceptions\ListOverflowException;
use DataStructures\Exceptions\ListUnderflowException;
use DataStructures\Exceptions\NonInsertedItemException;

class LinearList implements ListInterface
{
    private array $list = [];
    private int $size = 0;
    public readonly int $maxSize;


    /**
     * @throws ListException
     */
    public function __construct(int $maxSize)
    {
        if ($maxSize > 0) {
            $this->maxSize = $maxSize;
        } else {
            throw new ListUnderflowException($this, "The list length must be positive");
        }
    }

    public function fetch($n): ?int
    {
        $i = 0;
        while ($i < $this->size and $this->list[$i] !== $n) {
            $i++;
        }

        if ($i == $this->size or $this->list[$i] !== $n) {
            $i = null;
        }

        return $i;
    }


    public function append($n): ListInterface
    {
        if ($this->size < $this->maxSize) {
            if (is_null($this->fetch($n))) {
                $this->list[$this->size] = $n;
                $this->size++;
            } else {
                throw new DuplicatedListItemException($this, "$n is a duplicated item on list");
            }
        } else {
            throw new ListOverflowException($this, "The list is fully");
        }

        return $this;
    }

    public function remove($n): ListInterface
    {
        if ($this->size > 0) {
            $index = $this->fetch($n);
            if (is_numeric($index)) {
                for ($i = $index; $i < $this->size - 1; $i++) {
                    $this->list[$i] = $this->list[$i + 1];
                }
                $this->size--;
            } else {
                throw new NonInsertedItemException($this, "$n was not found on list");
            }
        } else {
            throw new ListUnderflowException($this, "The list is empty");
        }
        return $this;
    }
}
