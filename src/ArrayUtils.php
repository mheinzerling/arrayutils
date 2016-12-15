<?php
declare(strict_types = 1);

namespace mheinzerling\commons;

class ArrayUtils
{
    public static function mergeAndSortArrayKeys(array $array1, array $array2): array
    {
        $keys1 = array_keys($array1);
        $keys2 = array_keys($array2);
        $uniqueSortedKeys = array_unique(array_merge($keys1, $keys2));
        sort($uniqueSortedKeys);
        return $uniqueSortedKeys;
    }

    /**
     * @param array $haystack
     * @param string $needle
     * @return string|integer|null
     */
    public static function removeFirst(array &$haystack, string $needle)
    {
        $key = array_search($needle, $haystack);
        if ($key === false) return null;
        unset($haystack[$key]);
        return $key;
    }

    public static function flatten(array $array): array
    {
        $result = [];
        foreach ($array as $key => $value) self::flattenRecursive($result, $key, $value);
        return $result;
    }

    /**
     * @param array $result
     * @param string|integer $key
     * @param mixed $value
     */
    private static function flattenRecursive(array &$result, $key, $value): void
    {
        if (is_array($value)) {
            foreach ($value as $subKey => $subValue) self::flattenRecursive($result, $key . "." . $subKey, $subValue);
        } else {
            $result[$key] = $value;
        }
    }

    public static function fixOrderByKey(array $keys, array &$data): void
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