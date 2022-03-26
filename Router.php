<?php 

    class Router{

        public $rutasGET = [];
        public $rutasPOST= [];

        public function get($url, $fn){
            $this->rutasGET[$url]=$fn;
        }

        public function post($url, $fn){
            $this->rutasPOST[$url]=$fn;
        }
        
        public function comprobarRutas(){
            //$urlActual = $_SERVER['PATH_INFO'] ?? '/';
            $urlActual =$_REQUEST['c']?? 'inicio';
            $metodo = $_SERVER['REQUEST_METHOD'];
           // echo $urlActual;
           // echo $metodo;
            if($metodo === 'GET'){
               // var_dump( $this->rutasGET);
                $fn = $this->rutasGET[$urlActual] ?? null;
            }else{
                $fn = $this->rutasPOST[$urlActual] ?? null;
            }
            if($fn){
                call_user_func($fn, $this);
            }else{
                echo 'Error 404 pagina no encontrada';
            }
        }

    }
?>