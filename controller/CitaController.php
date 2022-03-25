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
            if($_SERVER['REQUEST_METHOD']==='POST'){
                //$cita= new Cita();
                //$cita->nombre=$_POST['nombre'];
                //$this->model->editar();
                var_dump( $_POST['nombre']);
                var_dump( $_POST['consulta']);
                //$this->model->editar($cita);
            }

            require_once 'views/header.html';
            require_once 'views/editar.html';
            require_once 'views/footer.html';
        }

    }

?>