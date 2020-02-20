<?php
//选择排序 时间复杂度是O(n2)

function selection_sort($arr){
    if(count($arr)<=1){
        return $arr;
    }

    for($i=0;$i<count($arr);$i++){
        $min=$i;
        for($j=$i+1;$j<count($arr);$j++){
            if($arr[$min]>$arr[$j]){
                $min=$j;
            }
        }
        if($min!=$i){
            // 互换
            $arr[$min]=$arr[$min]^$arr[$i];
            $arr[$i]=$arr[$i]^$arr[$min];
            $arr[$min]=$arr[$min]^$arr[$i];
        }
    }


    return $arr;
}

$a = "This is A"; // a变量原始值
$b = "This is B"; // b变量原始值
echo '交换之前 $a 的值：'.$a.', $b 的值：'.$b,'<br>'; // 输出原始值
$a .= $b; // 将$b的值追加到$a中
/**
 * $b得到$a值详解：
 *  先通过strlen()分别计算出$a和$b中字符串的长度【此时$a是原始$a和$b的合值】
 *  通过strlen($a)-strlen($b)即可得出原始$a的值长度
 *  在通过substr()方法在合并后的$a中从0开始截取到$a的长度，那么即可得到原始$a的值
 * $a得到$b值详解：
 *  由于此刻$b已经是$a的原始值了，而$a合并后的值为原始$a+原始$b的值，故用substr()在$a中从$b(原始$a)长度位置截取，则去的内容则为原始$b，则将$b值付给$a成功
 */
$b = substr($a,0,(strlen($a)-strlen($b)));
$a = substr($a, strlen($b));
echo '交换之后 $a 的值：'.$a.', $b 的值：'.$b,'<br>'; // 输出结果值