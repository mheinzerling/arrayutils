<?php

namespace mheinzerling\commons;


use const null;

class ArrayUtilsTest extends \PHPUnit_Framework_TestCase
{
    public function testMergeAndSortArrayKeys()
    {
        static::assertEquals([], ArrayUtils::mergeAndSortArrayKeys([], []));
        static::assertEquals(['a', 'c', 'z'], ArrayUtils::mergeAndSortArrayKeys(['a' => '', 'z' => '', 'c' => ''], []));
        static::assertEquals(['b', 'k', 'z'], ArrayUtils::mergeAndSortArrayKeys([], ['k' => '', 'b' => '', 'z' => '']));
        static::assertEquals(['a', 'b', 'c', 'k', 'z'], ArrayUtils::mergeAndSortArrayKeys(['a' => '', 'z' => '', 'c' => ''], ['k' => '', 'b' => '', 'z' => '']));
    }

    public function testRemoveFirst()
    {
        $this->assertRemoveFirst([], [], "Hallo", null);
        $this->assertRemoveFirst(["Hallo"], [], "Hallo", 0);
        $this->assertRemoveFirst(["Hallo", "Hallo"], [1 => "Hallo"], "Hallo", 0);
    }

    public function assertRemoveFirst(array $initial, array $expectedArray, $needle, $expectedKey)
    {
        static::assertEquals($expectedKey, ArrayUtils::removeFirst($initial, $needle));
        static::assertEquals($expectedArray, $initial);
    }

    public function testFlatten()
    {
        static::assertEquals([], ArrayUtils::flatten([]));
        static::assertEquals([1, 2, 3], ArrayUtils::flatten([1, 2, 3]));
        static::assertEquals(["a" => 1, "b" => 2, "c" => 3], ArrayUtils::flatten(["a" => 1, "b" => 2, "c" => 3]));
        static::assertEquals(['a' => 1, 'b' => 2,
            'c.a.a' => 1, 'c.a.b' => 2, 'c.a.c' => 3,
            'c.b' => 2, 'c.c' => 3], ArrayUtils::flatten(["a" => 1, "b" => 2, "c" => ["a" => ["a" => 1, "b" => 2, "c" => 3], "b" => 2, "c" => 3]]));
    }

}

