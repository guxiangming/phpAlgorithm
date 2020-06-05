<?php


// Trie 树，也叫「前缀树」或「字典树」，顾名思义，它是一个树形结构，专门用于处理字符串匹配，用来解决在一组字符串集合中快速查找某个字符串的问题。
class TrieNode
{
    public $data; //节点名称
    public $children=[]; //存放子节点引用
    public $isEndingChar=false; //是否字符串结束字符

    public function __construct($data){
        $this->data=$data;
    }


}


class PhpTire
{
    private $root;

    public function __construct()
    {
        $this->root=new TrieNode('/');

    }

    public function insert($text){
        $p=$this->root;
        for($i=0;$i<mb_strlen($text);$i++)
        {
            $index=$data=$text[$i];
            if($p->children[$index]==null){
                $newNode=new TrieNode($data);
                $p->children[$index]=$newNode;
            }
            $p=$p->children[$index];
        }
        $p->isEndingChar=true;
    }

    public function find($pattern){
        $p = $this->root;
        for ($i = 0; $i < mb_strlen($pattern); $i++) {
            $index = $pattern[$i];
            if ($p->children[$index] == null) {
                // 不存在 pattern
                return false;
            }
            $p = $p->children[$index];
        }
        if ($p->isEndingChar == false) {
            return false; // 不能完全匹配，只是前缀
        }
        return true; // 找到 pattern
    }
}

$trie = new PhpTire();
$strs = ['Laravel', '学院君', 'Framework', '学院', 'PHP'];
foreach ($strs as $str) {
    $trie->insert($str);
}
if ($trie->find('学院君')) {
    print '包含这个字符串';
} else {
    print '不包含这个字符串';
}