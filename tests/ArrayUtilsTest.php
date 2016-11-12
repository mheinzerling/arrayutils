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

}

