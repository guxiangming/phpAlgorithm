<?php 
    //私聊是计算一个节点到所有节点最短路径 然后扩展开每一个节点 到终点为止

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

class EdgeWeightedGraph{
    function getPosition(){

    }

    function addVertex(){

    }

    function addEdge(){

    }

    function dijkstra($start){
        $prev=[];//前驱顶点数组
        $dist=[];//起点顶点最短路径
        $flag=[];

        //起点
        $flag[$start]=true;
        $dist[$start]=0;

        $k=0;
        for($i=1;$i<$this->vNum;$i++)
        {
            $min=INF;
            for($j=0;$j<$this->vNum;$j++){
                if($flag[$j]==false&&$dist[$j]<$min){
                    $min=$dist[$j];
                    $k=$j;
                }

            }
            $flag[$k]=true;
        }
        for ($j = 0; $j < $this->vNum; $j++) {
            $tmp = ($this->getWeight($k, $j) == INF ? INF : ($min + $this->getWeight($k, $j)));
            if ($flag[$j] == false && ($tmp < $dist[$j])) {
                $dist[$j] = $tmp;
                $prev[$j] = $k;
            }
        }
         // 打印dijkstra最短路径的结果
        printf("dijkstra(%s): \n", $this->vData[$start]);
        for ($i = 0; $i < $this->vNum; $i++) {
            printf("  shortest(%s, %s)=%d\n", $this->vData[$start], $this->vData[$i], $dist[$i]);
        }
    }
}

// 构造无向连通网
$graph = new EdgeWeightedGraph(count($nodes));
foreach ($nodes as $i => $v) {
    $graph->addVertex($i, $v);
}
foreach ($edges as $edge) {
    $start = $graph->getPosition($edge[0]);
    $end = $graph->getPosition($edge[1]);
    $graph->addEdge($start, $end, $edge[2]);
}

// 计算并打印最短路径
$graph->dijkstra($graph->getPosition('A'));



