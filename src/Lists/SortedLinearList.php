<?php

namespace DataStructures\Lists;

use DataStructures\Exceptions\Lists\DuplicatedListItemException;
use DataStructures\Exceptions\Lists\ListOverflowException;

class SortedLinearList extends LinearList
{
    public function fetch($n): ?int
    {
        $onLeft = 0;
        $onRight = $this->size-1;
        $fetched = null;

        while ($onLeft <= $onRight) {
            $onMiddle = round(($onRight + $onLeft) / 2);

            if ($this->list[$onMiddle] === $n) {
                $fetched = $onMiddle;
                $onLeft = $onRight + 1;
            } elseif ($this->list[$onMiddle] > $n) {
                $onRight = $onMiddle - 1;
            } else {
                $onLeft = $onMiddle + 1;
            }
        }

        return $fetched;
    }

    public function fetchOrNext($n): int
    {
        $i = 0;
        while ($i < $this->size and $this->list[$i] < $n) {
            $i++;
        }

        return $i;
    }

    public function append($n): Contracts\LinearListInterface
    {
        if ($this->size < $this->maxSize) {
            $indexOrNext = $this->fetchOrNext($n);
            if ($indexOrNext >= $this->size or $this->list[$indexOrNext] > $n) {
                for ($i = $this->size; $i > $indexOrNext; $i--) {
                    $this->list[$i] = $this->list[$i - 1];
                }
                $this->list[$indexOrNext] = $n;
                $this->size++;
            } else {
                throw new DuplicatedListItemException($this, "$n has on list");
            }
        } else {
            throw new ListOverflowException($this, "The list is fully");
        }

        return $this;
    }
}