<?php

namespace Tests\Lists;

use DataStructures\Classes\Node;
use DataStructures\Exceptions\Lists\DuplicatedListItemException;
use DataStructures\Exceptions\Lists\ListException;
use DataStructures\Exceptions\Lists\NonInsertedItemException;
use DataStructures\Lists\LinkedList;
use PHPUnit\Framework\TestCase;

class LinkedListTest extends TestCase
{
    public function testCanInsertItems()
    {
        $list = new LinkedList();
        $nodes = [];

        for ($i = 0; $i < 3; $i++) {
            $nodes[] = new Node($i);
            $list->append($nodes[$i]);
            $this->assertEquals($i + 1, $list->size());
        }
    }

    public function testCanRemoveItems()
    {
        $list = new LinkedList();
        $nodesAmount = 5;
        $nodes = [];

        for ($i = 0; $i < $nodesAmount; $i++) {
            $nodes[] = new Node($i);
            $list->append($nodes[$i]);
        }

        for ($i = 0; $i < $nodesAmount; $i++) {
            $list->remove($nodes[$i]);
            $this->assertEquals($nodesAmount - $i - 1, $list->size());
        }
    }

    public function testCanNotInsertDuplicatedItem()
    {
        $list = new LinkedList();
        $node = new Node(1);
        $exception = null;
        try {
            $list
                ->append($node)
                ->append($node);
        } catch (ListException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(DuplicatedListItemException::class, $exception);
        }
    }

    public function testCanNotRemoveNonInsertedItem()
    {
        $list = new LinkedList();
        $node = new Node(1);
        $exception = null;
        try {
            $list->remove($node);
        } catch (ListException $e) {
            $exception = $e;
        } finally {
            $this->assertInstanceOf(NonInsertedItemException::class, $exception);
        }
    }
}
