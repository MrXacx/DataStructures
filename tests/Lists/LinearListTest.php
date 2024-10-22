<?php

namespace Tests\Lists;

use DataStructures\Exceptions\DuplicatedListItemException;
use DataStructures\Exceptions\ListException;
use DataStructures\Exceptions\ListOverflowException;
use DataStructures\Exceptions\ListUnderflowException;
use DataStructures\Exceptions\NonInsertedItemException;
use DataStructures\Lists\LinearList;
use PHPUnit\Framework\TestCase;
use Random\RandomException;

class LinearListTest extends TestCase
{
    /**
     * @throws RandomException
     */
    public function testCanCreateLinearListWithPositiveSpaces(): void
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
        $exception = new \Exception();

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
        $exception = new \Exception();

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
        $exception = new \Exception();

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
        $exception = new \Exception();

        try {
            $list->remove(1);
        } catch (ListException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(ListUnderflowException::class, $exception);
        }
    }
}
