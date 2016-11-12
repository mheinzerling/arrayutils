<?php

namespace mheinzerling\commons;


class ArrayUtilsTest extends \PHPUnit_Framework_TestCase
{
    public function testMergeAndSortArrayKeys()
    {
        static::assertEquals([], ArrayUtils::mergeAndSortArrayKeys([], []));
        static::assertEquals(['a', 'c', 'z'], ArrayUtils::mergeAndSortArrayKeys(['a' => '', 'z' => '', 'c' => ''], []));
        static::assertEquals(['b', 'k', 'z'], ArrayUtils::mergeAndSortArrayKeys([], ['k' => '', 'b' => '', 'z' => '']));
        static::assertEquals(['a', 'b', 'c', 'k', 'z'], ArrayUtils::mergeAndSortArrayKeys(['a' => '', 'z' => '', 'c' => ''], ['k' => '', 'b' => '', 'z' => '']));
    }

}

