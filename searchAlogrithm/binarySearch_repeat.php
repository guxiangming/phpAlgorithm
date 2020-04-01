<?php
    //正常查找是遍历一遍时间复杂度 O(n) 实现原理先排序再缩小遍历范围
    function binary_search ($arr,$index)
    {
        if(count($arr)<=1){
            return 0;
        }
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
            // 1 2 3 3 3 5 第一个值运算
            if($mid==0||$arr[$mid-1]!=$index){
                return $mid;
            }else{
                return binary_search_internal($arr,$index,$low,$mid-1);
            }

            //最后一个值算法
            // if($mid+1==count($arr)||$arr[$mid+1]!=$index){
            //     return $mid;
            // }else{
            //     return binary_search_internal($arr,$index,$mid+1,$high);
            // }
        }
    }

 