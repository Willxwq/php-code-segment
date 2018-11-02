<?php
// 冒泡排序 找最小数，一个数和后面的所有排序
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