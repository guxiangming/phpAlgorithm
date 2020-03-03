<?php
class EdgeWeightedGraph {
    function addVertex(){

    }

    function getPostion($value){

    }

    function addEdge(){

    }

    function getWeight(){

    }

    function floyd(){
        $path = [];    // 路径，$path[$i][$j]=$k表示顶点i到顶点j的最短路径会经过顶点k。
        $dist = [];    // 长度数组，即$dist[$i][$j]=$sum表示顶点i到顶点j的最短路径的长度是$sum。

        // 初始化
        for ($i = 0; $i < $this->vNum; $i++) {
            for ($j = 0; $j < $this->vNum; $j++) {
                $dist[$i][$j] = $this->getWeight($i, $j);  // 顶点i到顶点j的路径长度为i到j的权值。
                $path[$i][$j] = $j;                // 顶点i到顶点j的最短路径是经过顶点j。
            }
        }

         // 计算最短路径
    for ($k = 0; $k < $this->vNum; $k++) {
        for ($i = 0; $i < $this->vNum; $i++) {
            for ($j = 0; $j < $this->vNum; $j++) {
                // 如果经过下标为k顶点路径比原两点间路径更短，则更新$dist[$i][$j]和$path[$i][$j]
                $tmp = ($dist[$i][$k] == INF || $dist[$k][$j] == INF) ? INF : ($dist[$i][$k] + $dist[$k][$j]);
                if ($dist[$i][$j] > $tmp) {
                    // i到j最短路径对应的值为更小的一个(即经过k的路径)
                    $dist[$i][$j] = $tmp;
                    // i到j最短路径对应的路径经过k
                    $path[$i][$j] = $path[$i][$k];
                }
            }
        }
    }

    // 打印最短路径的结果
    printf("floyd: \n");
    for ($i = 0; $i < $this->vNum; $i++) {
        for ($j = 0; $j < $this->vNum; $j++) {
            printf("%2d  ", $dist[$i][$j]);
        }
        printf("\n");
    }
    }
}

// 顶点和边数据
$nodes = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
$edges = [
    ['A', 'B', 12],
    ['A', 'F', 16],
    ['A', 'G', 14],
    ['B', 'C', 10],
    ['B', 'F', 7],
    ['C', 'D', 3],
    ['C', 'E', 5],
    ['C', 'F', 6],
    ['D', 'E', 4],
    ['E', 'F', 2],
    ['E', 'G', 8],
    ['F', 'G', 9],
];

$graph=new EdgeWeightedGraph(count($nodes));
foreach($node as $i=>$v){
    $graph->addVertex($i,$v);
}

foreach($edges as $edge){
    $start=$graph->getPosition($dege[0]);
    $end=$graph=$getPostion($dege[1]);
    $graph->addEdge($start,$end,$edge[2]);
}

$graph->floayd();