<?php

namespace Tests\Lists;

use DataStructures\Exceptions\Lists\DuplicatedListItemException;
use DataStructures\Exceptions\Lists\ListException;
use DataStructures\Exceptions\Lists\ListOverflowException;
use DataStructures\Exceptions\Lists\ListUnderflowException;
use DataStructures\Exceptions\Lists\NonInsertedItemException;
use DataStructures\Lists\LinearList;
use PHPUnit\Framework\TestCase;
use Random\RandomException;

class LinearListTest extends TestCase
{
    /**
     * @throws RandomException
     */
    public function testCanCreateLinearListWithPositiveSize(): void
    {
        $n = random_int(1, PHP_INT_MAX);
        $linearList = new LinearList($n);
        $this->assertEquals($n, $linearList->maxSize);
    }

    /**
     * @throws RandomException
     */
    public function testCanNotCreateLinearListWithNonPositiveSize(): void
    {
        $n = random_int(PHP_INT_MIN, 0);
        try {
            new LinearList($n);
        } catch (ListException $e) {
            $this->assertInstanceOf(ListUnderflowException::class, $e);
        }
    }

    public function testIfFetchNonInsertedItemReturnNull()
    {
        $list = new LinearList(5);
        $this->assertNull($list->fetch(1));
    }

    public function testIfFetchInsertedItemReturnIndex()
    {
        $list = new LinearList(5);
        $list
            ->append(1)
            ->append(2)
            ->append(3);

        $this->assertEquals(1, $list->fetch(2));
    }

    public function testCanNotInsertDuplicatedItem()
    {
        $list = new LinearList(2);
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
        $list = new LinearList(1);
        $exception = null;

        try {
            $list->append(1)->append(2);
        } catch (ListException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(ListOverflowException::class, $exception);
        }
    }

    public function testCanRemoveItem()
    {
        $list = new LinearList(5);
        $list
            ->append(1)
            ->append(2)
            ->append(3)
            ->remove(2);

        $this->assertNull($list->fetch(2));
        $this->assertEquals(1, $list->fetch(3));
    }

    public function testCanNotRemoveNonInsertedItem()
    {
        $list = new LinearList(5);
        $exception = null;

        try {
            $list
                ->append(1)
                ->remove(2);
        } catch (ListException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(NonInsertedItemException::class, $exception);
        }
    }

    public function testCanNotRemoveItemFromEmptyList()
    {
        $list = new LinearList(5);
        $exception = null;

        try {
            $list->remove(1);
        } catch (ListException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(ListUnderflowException::class, $exception);
        }
    }

    public function testIfIsArrayable()
    {
        $arr = [1, 2, 3, 403, 234, -123, 458, 903, 201, 15, 38];
        $list = new LinearList(sizeof($arr));
        foreach ($arr as $i){
            $list->append($i);
        }

        $this->assertEquals($arr, $list->toArray());
    }
}
