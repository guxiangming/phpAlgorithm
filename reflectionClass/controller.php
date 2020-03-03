<?php
    class routeController{
        private $method;
        protected $controller;
        public $route;

        public function __construct($method,$route){

            echo "__construct";
            $this->method=$method;
            
            $this->route=$route;
        }

        public function getName(){
            echo "getName";
        }
    }

    $refector=new ReflectionClass('routeController');

    $constructor=$refector->getConstructor();
    $parameters=$constructor->getParameters();

    foreach ($parameters as $key => $parameter) {
        // 获取参数声明的类
      
        $injector = new ReflectionClass('routeController');
        var_dump( $injector->newInstance('1','2'));
        // 实例化参数声明类并填入参数列表
    }
    