<?php
/*
* 非递归方式实现目录数量统计
*/
$dir = '/home';
function sumDir($dir)
{
    $queue = [$dir];
    $sum = 0;
    while ($current = each($queue)) {
        // echo 'aaa---';
        $currentDir = $current['value'];
        // var_dump($currentDir);
        if (is_dir($currentDir)) {
            // echo 'bb';
            $handle = opendir($currentDir);
            while ($file = readdir($handle)) {
                // echo $file.'<br>';
                if ($file == '.' || $file == '..') {
                    continue;
                }
                if (is_dir($currentDir.'/'.$file)) {
                    $sum++;
                    // echo $sum;
                    $queue[] = $currentDir.'/'.$file;
                }
            }
            closedir($handle);
        }
    }
    return $sum;
}

var_dump(sumDir($dir));

//递归函数实现遍历指定文件下的目录与文件数量
function total($dirname,&$dirnum,&$filenum){
    $dir=opendir($dirname);
    echo readdir($dir)."<br>"; //读取当前目录文件
    echo readdir($dir)."<br>"; //读取上级目录文件
    while($filename=readdir($dir)){
        //要判断的是$dirname下的路径是否是目录
        $newfile=$dirname."/".$filename;
        //is_dir()函数判断的是当前脚本的路径是不是目录
        if(is_dir($newfile)){
            //通过递归函数再遍历其子目录下的目录或文件
            total($newfile,$dirnum,$filenum);
            $dirnum++;
        }else{
            $filenum++;
        }
    }
    closedir($dir);
}
$dirnum=0;
$filenum=0;
total(" ",$dirnum,$filenum);
echo "目录总数：".$dirnum."<br>";
echo "文件总数：".$filenum."<br>";
//遍历指定文件目录与文件数量结束