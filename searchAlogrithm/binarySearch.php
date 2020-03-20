<?php
    //正常查找是遍历一遍时间复杂度 O(n) 实现原理先排序再缩小遍历范围
    function binary_search ($arr,$index)
    {
        return binary_search_internal($arr,$index,0,count($arr)-1);
    }

    function binary_search_internal($arr,$index,$low,$high){
        if($low>$high){
            return -1;
        }

        $mid=floor(($low+$high)/2);
        if($arr[$mid]>$index){
            binary_search_internal($arr,$index,$low,$mid-1);
        }else if($arr[$mid]<$index){
            binary_search_internal($arr,$index,$mid+1,$high);
        }else{
            return $mid;
        }
    }