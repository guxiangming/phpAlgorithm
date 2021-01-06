<?php
# 比较类

## 冒泡排序

function bubbling(array $data)
{
    for ($i = 0; $i < count($data) - 1; $i++) {
        for ($j = count($data) - 1; $j > $i; $j--) {
            if ($data[$j - 1] > $data[$j]) {
                list($data[$j - 1], $data[$j]) = [$data[$j], $data[$j - 1]];
            }
        }
    }
    return $data;
}

var_dump(bubbling([3, 2, 6, 8, 4, 6, 7]));

## 快速排序
function quicksort(array $data, int $left, int $right)
{

}
# 非比较类
