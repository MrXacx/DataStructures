<?php

namespace Tests\Lists;

use DataStructures\Exceptions\Lists\DuplicatedListItemException;
use DataStructures\Exceptions\Lists\ListException;
use DataStructures\Exceptions\Lists\ListOverflowException;
use DataStructures\Lists\SortedLinearList;
use PHPUnit\Framework\TestCase;

class SortedLinearListTest extends TestCase
{
    public function testIfFetchNonInsertedItemReturnNull()
    {
        $list = new SortedLinearList(5);
        $this->assertNull($list->fetch(1));
    }

    public function testIfFetchInsertedItemReturnIndex()
    {
        $list = new SortedLinearList(5);
        $list
            ->append(2)
            ->append(3)
            ->append(1);

        $this->assertEquals(1, $list->fetch(2));
    }

    public function testIfInsertIsSorted()
    {
        $list = new SortedLinearList(3);
        $list
            ->append(3)
            ->append(1)
            ->append(2);

        $this->assertEquals(0, $list->fetch(1));
        $this->assertEquals(1, $list->fetch(2));
        $this->assertEquals(2, $list->fetch(3));

    }

    public function testCanRemoveItem()
    {
        $list = new SortedLinearList(5);
        $list
            ->append(3)
            ->append(2)
            ->append(1)
            ->remove(2);

        $this->assertNull($list->fetch(2));
        $this->assertEquals(1, $list->fetch(3));
    }

    public function testCanNotInsertDuplicatedItem()
    {
        $list = new SortedLinearList(2);
        $exception = null;

        try {
            $list->append(1)->append(1);
        } catch (ListException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(DuplicatedListItemException::class, $exception);
        }
    }

    public function testCanNotInsertOnFullyLinearList()
    {
        $list = new SortedLinearList(1);
        $exception = null;

        try {
            $list->append(1)->append(2);
        } catch (ListException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(ListOverflowException::class, $exception);
        }
    }

    public function testIfIsArrayable()
    {
        $arr = [1, 2, 3, 403, 234, -123, 458, 903, 201, 15, 38];
        $list = new SortedLinearList(sizeof($arr));
        foreach ($arr as $i){
            $list->append($i);
        }

        sort($arr);
        $this->assertEquals($arr, $list->toArray());
    }

    public  function testIfArrayIsConsistentAfterRemoval(){
        $arr = [1, 2, 3, 403, 234, -123, 458, 903, 201, 15, 38];
        $size =  sizeof($arr);
        $list = new SortedLinearList($size);

        foreach ($arr as $v){
            $list->append($v);
        }

        $i = -1;
        $until = rand(1, $size - 1 );
        while(++$i < $until){
            $list->remove($arr[$i]);
            unset($arr[$i]);
        }

        sort($arr);
        $this->assertEquals($arr, $list->toArray());
    }
}
