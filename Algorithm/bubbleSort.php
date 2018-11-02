<?php
/**
 * 冒泡排序 PHP实现
 * 原理：两两相邻比较，如果反序就交换，否则不交换
 * 时间复杂度：最好 O(n) 最坏 O(n2) 平均 O(n2)
 * 空间复杂度：O(1)
 * 什么时候使用：当所有的数据位于单向链表中
 */
function bubble_sort(&$arr){
    for ($i=0,$len=count($arr); $i < $len; $i++) {
        for ($j=1; $j < $len-$i; $j++) {
            if ($arr[$j-1] > $arr[$j]) {
                $temp = $arr[$j-1];
                $arr[$j-1] = $arr[$j];
                $arr[$j] = $temp;
            }
            var_dump($arr);
        }
    }
}