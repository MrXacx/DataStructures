<?php

namespace DataStructures\Classes;

use DataStructures\Trees\TreeInterface;

readonly class TreeFetchResult implements Arrayable
{
    public int $flag;
    public ?TreeInterface $parent;
    public ?TreeInterface $result;

    /**
     * @param int $flag
     * @param ?TreeInterface $parent
     * @param ?TreeInterface $result
     */
    public function __construct(int $flag, ?TreeInterface $parent, ?TreeInterface $result)
    {
        $this->flag = $flag;
        $this->parent = $parent;
        $this->result = $result;
    }


    /**
     * @return array list with flag, parent and result
     */
    public function toArray(): array
    {
        return [
            /*'flag' =>*/ $this->flag,
            /*'parent' =>*/ $this->parent,
            /*'result' =>*/ $this->result,
        ];
    }
}