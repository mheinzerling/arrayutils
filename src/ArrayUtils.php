<?php

namespace mheinzerling\commons;


class ArrayUtils
{
    public static function mergeAndSortArrayKeys(array $array1, array $array2):array
    {
        $keys1 = array_keys($array1);
        $keys2 = array_keys($array2);
        $uniqueSortedKeys = array_unique(array_merge($keys1, $keys2));
        sort($uniqueSortedKeys);
        return $uniqueSortedKeys;
    }

    /**
     * @param array $haystack
     * @param $needle
     * @return null|string the key
     */
    public static function removeFirst(array &$haystack, $needle)// :?string
    {
        $key = array_search($needle, $haystack);
        if ($key === false) return null;
        unset($haystack[$key]);
        return $key;
    }

} 