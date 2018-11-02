<?php

/**
 * 快速排序是找出一个元素（理论上可以随便找一个）作为基准(pivot),然后对数组进行分区操作,使基准左边元素的值都不大于基准值,基准右边的元素值 都不小于基准值，如此作为基准的元素调整到排序后的正确位置。递归快速排序，将其他n-1个元素也调整到排序后的正确位置。最后每个元素都是在排序后的正 确位置，排序完成。所以快速排序算法的核心算法是分区操作，即如何调整基准的位置以及调整返回基准的最终位置以便分治递归。
 * 时间复杂度 最坏O(n2) 平均 O(nlogn)
 * 空间复杂度 O(log2n)~O(n)
 */
function quick_sort($arr) {
    //先判断是否需要继续进行
    $length = count($arr);
    if($length <= 1) {
        return $arr;
    }
    //如果没有返回，说明数组内的元素个数 多余1个，需要排序
    //选择一个标尺
    //选择第一个元素
    $base_num = $arr[0];
    //遍历 除了标尺外的所有元素，按照大小关系放入两个数组内
    //初始化两个数组
    $left_array = array();//小于标尺的
    $right_array = array();//大于标尺的
    for($i=1; $i<$length; $i++) {
        if($base_num > $arr[$i]) {
            //放入左边数组
            $left_array[] = $arr[$i];
        } else {
            //放入右边
            $right_array[] = $arr[$i];
        }
    }
    //再分别对 左边 和 右边的数组进行相同的排序处理方式
    //递归调用这个函数,并记录结果
    $left_array = quick_sort($left_array);
    $right_array = quick_sort($right_array);
    //合并左边 标尺 右边
    return array_merge($left_array, array($base_num), $right_array);
}

//快速排序法 非递归
function quickSort(&$arr,$start,$end)
{
    if($start > $end){
        return;
    }
    $key = $arr[$start];
    $left = $start;
    $right = $end;
    while($left<$right){
        while($left<$right && $arr[$right]>=$key){
            $right--;
        }
        while($left<$right && $arr[$left]<=$key){
            $left++;
        }
        if($left<$right){
            $tmp = $arr[$left];
            $arr[$left] = $arr[$right];
            $arr[$right] = $tmp;
        }
    }
    $arr[$start] = $arr[$left];
    $arr[$left] = $key;
    quick_sort($arr,$start,$right-1);
    quick_sort($arr,$right+1,$end);
}


// 测试
$arr = array(10,2,36,14,10,25,23,85,99,45);
bubble_sort($arr);
print_r($arr);
