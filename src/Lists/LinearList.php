<?php

namespace DataStructures\Lists;

use DataStructures\Exceptions\Lists\DuplicatedListItemException;
use DataStructures\Exceptions\Lists\ListException;
use DataStructures\Exceptions\Lists\ListOverflowException;
use DataStructures\Exceptions\Lists\ListUnderflowException;
use DataStructures\Exceptions\Lists\NonInsertedItemException;
use DataStructures\Traits\WithSize;

class LinearList implements LinearListInterface
{
    use WithSize;
    protected array $list = [];
    protected int $size = 0;
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


    public function append($n): LinearListInterface
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

    public function remove($n): LinearListInterface
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
