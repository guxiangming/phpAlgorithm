<?php

    class Node
    {
        public $data;
        public $left=null;
        public $right=null;

        public function __construct($data){
            $this->data=$data;
        }
    }

    function preOrderTraverse($tree){
        if($tree ==null){
            return ;
        }
        printf("%s\n",$tree->data);
        preOrderTraverse($tree->left);
        preOrderTraverse($tree->right);

    }

    function midOrderTraverse($tree){
        if($tree==null){
            return ;
        }
        midOrderTraverse($tree->left);
        printf("%s\n",$tree->data);
        midOrderTraverse($tree->right);
    }

    function postOrderTraverse($tree){
        if($tree==null){
            return ;
        }
        postOrderTraverse($tree->left);
        postOrderTraverse($tree->right);
        printf("%s\n",$tree->data);
    }


    $node1=new Node('A');
    $node2=new Node('B');
    $node3=new Node('C');
    $node1->left=$node2;
    $node1->right=$node3;