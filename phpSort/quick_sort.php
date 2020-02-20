<?php
    //选择排序 经过比较把值放中间
    function quick_sort($arr){
        if(count($arr)<=1){
            return $arr;
        }

        quick_sort_c($arr,0,count($arr)-1);

        return $arr;
    }

    function quick_sort_c(&$arr,$p,$r){
        if($p>$r){
            return ;
        }

        $q=partition($arr,$p,$r);
        quick_sort_c($arr,$p,$q-1);
        quick_sort_c($arr,$p+1,$r);
    }

    function partition(&$arr,$p,$r){
        $pivot=$arr[$r];
        $i=$p;
        for($j=$p;$j<$r;$j++){
            if($arr[$j]<$pivot){
                list($arr[$j],$arr[$i])=[$arr[$i],$arr[$j]];
                $i++;
            }
        }
        list($arr[$j],$arr[$i])=[$arr[$i],$pivot];
        return $i;
    }