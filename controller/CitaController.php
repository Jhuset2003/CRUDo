<?php 


    class CitaController{
        
        private $model;

        public function __construct()
        {
            require_once 'models/Cita.php';
            require_once 'models/Db.php';
            $db=new Db();
            $this->model=new Cita($db->getConection());
        }

        public function getModel(){
            return $this->model;
        }

        public function index(){
            echo "hola mundo";
            $listCita=$this->model->ListCita();
            require_once 'views/header.html';
            require_once 'views/index.html';
            require_once 'views/footer.html';
        }

        public function editar(){
            require_once 'views/header.html';
            require_once 'views/editar.html';
            require_once 'views/footer.html';
        }

    }
/*
    $cita=new Cita($db->getConection());
    var_dump($db->getConection());
    $listCita=$cita->ListCita();
    $citas=$listCita[0];
   echo "este es citas";
    echo "<pre/>";
    var_dump($citas);
    var_dump($listCita);*/
   // require_once '../views/prueba.html';
?>