<?php 


    class CitaController{
        
        private $model;

        public function __construct()
        {
            require_once 'models/Cita.php';
            //require_once 'models/Db.php';
            $this->model=new Cita();
        }

        public function getModel(){
            return $this->model;
        }

        public function index(){
           // echo "hola mundo";
            $listCita=$this->model->ListCita();
            require_once 'views/header.html';
            require_once 'views/index.html';
            require_once 'views/footer.html';
        }

        public function editar(){
            if($_SERVER['REQUEST_METHOD']==='POST'){
                require_once 'models/Cita.php';
                $cita = new Cita();
                $cita->setId($_POST['id']);
                $cita->setNombre($_POST['nombre']);
                $cita->setConsulta($_POST['consulta']);
                $cita->setFecha_consulta($_POST['fconsulta']);
                $cita->setFecha_cita($_POST['fcita']);
                $cita->setHora_cita($_POST['hcita']);
                var_dump( $cita);
                $this->model->editar($cita);
                //$cita->nombre=$_POST['nombre'];
                //$this->model->editar();
                //$this->model->editar($cita);
            }

            require_once 'views/header.html';
            require_once 'views/editar.html';
            require_once 'views/footer.html';
        }
        public function nuevo(){
            if($_SERVER['REQUEST_METHOD']==='POST'){
                require_once 'models/Cita.php';
                $cita = new Cita();
                $cita->setNombre($_POST['nombre']);
                $cita->setConsulta($_POST['consulta']);
                $cita->setFecha_consulta($_POST['fconsulta']);
                $cita->setFecha_cita($_POST['fcita']);
                $cita->setHora_cita($_POST['hcita']);
                var_dump( $cita);
                $this->model->nuevo($cita);
                //$cita->nombre=$_POST['nombre'];
                //$this->model->editar();
                //$this->model->editar($cita);
            }

            require_once 'views/header.html';
            require_once 'views/nuevo.html';
            require_once 'views/footer.html';
        }
        public function Eliminar(){
            $this->model->Eliminar($_REQUEST['id']);
            header('Location: index.html');
        }
       
    }

?>