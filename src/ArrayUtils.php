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

    public static function flatten(array $array):array
    {
        $result = [];
        foreach ($array as $key => $value) self::flattenRecursive($result, $key, $value);
        return $result;
    }

    /**
     * @param array $result
     * @param string $key
     * @param $value
     * @return void
     */
    private static function flattenRecursive(array &$result, string $key, $value)
    {
        if (is_array($value)) {
            foreach ($value as $subkey => $subvalue) self::flattenRecursive($result, $key . "." . $subkey, $subvalue);
        } else {
            $result[$key] = $value;
        }
    }

    /**
     * @param array $keys
     * @param array $data
     * @return void
     */
    public static function fixOrderByKey(array $keys, array &$data)
    {
        if (array_keys($data) == $keys) return;
        if (array_keys($data) == range(0, count($keys) - 1)) return;

        $new = [];
        foreach ($keys as $key) {
            $new[$key] = $data[$key];
        }
        $data = $new;
    }

} 