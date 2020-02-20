<?php
    //插入排序
    function insertion_sort($arr=[]){
        if(count($arr)<=1){
            return $arr;
        }
        for($i=0;$i<count($arr);$i++){
            $value=$arr[$i];
            $j=$i-1;
            for(;$j>=0;$j--){
                if($arr[$j]>$value){
                    $arr[$j+1]=$arr[$j];
                }else{
                    break;
                }
                
            }
            $arr[$j+1]=$value;
        }
        return $arr;
    }