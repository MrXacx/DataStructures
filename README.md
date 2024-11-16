<h1 align="center">Data Structures</h1>

<p align="center">Essential data structures for computer science, now in PHP.</p>

<div style="display: flex" align="center">

![Tests](https://github.com/mrxacx/DataStructures/actions/workflows/ci.yml/badge.svg)
![Dependency vulnerability](https://github.com/mrxacx/DataStructures/actions/workflows/ci-dependencies.yml/badge.svg)

</div>


## 🚀 Summary

- [**Lists**](#-lists)
  - [LinearList](#linearlist-)
  - [SortedList](#sortedlist-)
  - [LinkedList](#linkedlist-)
- [**Stacks**](#-stacks)
  - [Stack](#stack-)
  - [LinkedStack](#linkedstack-)
- [**Queues**](#-queues)
  - [Queue](#queue-)
  - [LinkedQueue](#linkedqueue-)

## 🧾 Lists

### LinearList [🔗](./src/Lists/LinearList.php)
Values are stored in an array of unique items. Fetch, add, and remove operations have O(n) time complexity.

### SortedList [🔗](./src/Lists/SortedLinearList.php)
Values are stored in a sorted array of unique items. While add and remove operations have O(n) time complexity, the search operation has O(n log n) time complexity.

### LinkedList [🔗](./src/Lists/LinkedList.php)
Each value is stored once using object references. Fetch, add, and remove operations have O(n) time complexity.

## 🏗️ Stacks

### Stack [🔗](./src/Stacks/Stack.php)
Last-in-first-out (LIFO) data structure. Items are stored in an array.

### LinkedStack [🔗](./src/Stacks/LinkedStack.php)
Last-in-first-out (LIFO) data structure. Items are stored using object references.

## 🚶️️ Queues

### Queue [🔗](./src/Queues/Queue.php)
First-in-first-out (FIFO) data structure. Items are stored in an array.

### LinkedQueue [🔗](./src/Queues/LinkedQueue.php)
First-in-first-out (FIFO) data structure. Items are stored using object references.