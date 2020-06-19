<?php

class Node{
    public $data;
    public $left=null;
    public $right=null;

    public function __construct($data)
    {   
        $this->data=$data;
    }

}


class BinarySortedTree
{
    /**
     * @var Node
     */

     private $tree;

     public function getTree(){
         return $this->tree;
     }

     public function insert(int $data){
        if(!$this->tree){
            $this->tree=new Node($data);
            return ;
        }
        $p=$this->tree;
        while($p){
            if($data<$p->data){
                if(!$p->left){
                    $p->left=new Node($data);
                    return ;
                }
                $p=$p->left;
            }elseif($data>$p->data){
                if(!$p->right){
                    $p->right=new Node($data);
                    return ;
                }
                $p=$p->right;
            }
        }
     }

     public function find(int $data){
         $p=$this->tree;
         while($p){
            if($data<$p->data){
                $p=$p->left;
            }elseif($data>$p->data){  
                $p=$p->right;
            }else{
                return $p;
            }
         }
         return null;
     }

     public function delete(int $data){
         if(!$this->tree){
            return ;
         }
         $p=$this->tree;
         $pp=null;

         while($p && $p->data !=$data){
             $pp=$p;
             if($p->data<$data){
                $p=$p->right;
             }else{
                $p=$p->left;
             }
         }
         
         if($p==null){
            return ;
         }

         if($p->left&&$p->right){
            $minP=$p->right;
            $minpp=$p;
            
            while($minP->left){
                $minPP=$minP;
                $minP=$minP->left;
            }

            $p->data=$minP->data;
            $p=$minP;//这步应该是有问题不应该有$p->left 判断？
            $pp=$minPP;
         }
         $child=null;
         if($p->left){
            $child=$p->left;
         }elseif($p->right){
            $child=$p->right;
         }else{
             $child=null;
         }
         if(!$pp){
            $this->tree=$child;
         }elseif($pp->left==$p){
            $pp->left=$child;
         }else{
            $pp->right=$child;
         }
     }
}


function midOrderTraverse($data){
    if(!$data){
        return null;
    }
    midOrderTraverse($data->left);
    printf("- %s",$data->data);
    midOrderTraverse($data->right);
}

$tree=new BinarySortedTree();
$tree->insert(3);
$tree->insert(2);
$tree->insert(5);
$tree->insert(1);
$tree->insert(3);
midOrderTraverse($tree->getTree());

$tree->find(3);
