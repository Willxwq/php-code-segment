<?php

/**
 * 二分查找
 *
 * -------------------------------------------------------------
 * 思路分析：数组中间的值floor((low+top)/2)
 * -------------------------------------------------------------
 * 先取数组中间的值floor((low+top)/2)然后通过与所需查找的数字进行比较，
 * 若比中间值大则将首值替换为中间位置下一个位置，继续第一步的操作；
 * 若比中间值小，则将尾值替换为中间位置上一个位置，继续第一步操作
 * 重复第二步操作直至找出目标数字
 */
/**
 * 非递归版 二分查找
 *
 * @param array $container
 * @param       $search
 * @return int|string
 */
function binaryQuery($arr, $search)
{
    $count = count($arr);
    $low = 0;
    $i = 0;

    while ($count >= $low) {
        $i++;
        $mid = intval(floor($count + $low) / 2);

        if ($arr[$mid] == $search) {
            var_dump($i);
            return $mid;
        } elseif ($arr[$mid] > $search) {
            $count = $mid - 1;
        } elseif ($arr[$mid] < $search) {
            $low = $mid + 1;
        }
    }
    return '无';
}


/**
 * 递归版 二分查找
 *
 * @param array  $container
 * @param        $search
 * @param int    $low
 * @param string $top
 * @return int|string
 */
function BinaryQueryRecursive($arr, $search, $low = 0, $count = null, $i = 0)
{
    $i++;
    empty($count) && $count = count($arr);
    if ($low <= $count) {
        $mid = intval(floor($count + $low) / 2);
        if ($arr[$mid] == $search) {
            //var_dump($i);
            return $mid;
        } elseif ($arr[$mid] > $search) {
            if ($mid == 3333) var_dump('11');
            return binaryQuery($arr, $search, $low, $mid - 1, $i);
        } elseif ($arr[$mid] < $search) {
            if ($mid == 3333) var_dump('11');
            return binaryQuery($arr, $search, $mid + 1, $count, $i);
        }
    }

    return 'wu';
}
