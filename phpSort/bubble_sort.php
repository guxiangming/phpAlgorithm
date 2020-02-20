<?php
    //冒泡排序
    function bubble_sort($arr=[]){
        if(count($arr)<=1){
            return $arr;
        }

        for($i=0;$i<count($arr);$i++){
            $flag=false;
            for($j=0;$j<count($arr)-$i-1;$j++){
                if($arr[$j]>$arr[$j+1]){
                    list($arr[$j],$arr[$j+1])=[$arr[$j+1],$arr[$j]];
                    $flag=true;
                }
            }

            if(!$flag){
            break;
            }
        }
        return $arr;
    }