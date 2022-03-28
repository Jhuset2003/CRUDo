<?php 

    class CitaController{
        
        private $model;

        public function __construct()
        {
            require_once 'models/Cita.php';
            $this->model=new Cita();
        }

        public function getModel(){
            return $this->model;
        }

        public function index(){
            require_once 'views/header.html';
            require_once 'views/index.html';
            require_once 'views/footer.html';
        }

        public function listar(){
            $listCita=$this->model->ListCita();
            require_once 'views/header.html';
            require_once 'views/listar.html';
            require_once 'views/footer.html';
        }

        public function editar(){
            $result="";
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $id=$_POST['id'];
                $result=$this->model->Obtener($id);
            }
            require_once 'views/header.html';
            require_once 'views/editar.html';
            require_once 'views/footer.html';
        }

        public function nuevo(){
            require_once 'views/header.html';
            require_once 'views/nuevo.html';
            require_once 'views/footer.html';
        }

        public function guardar(){
            if($_SERVER['REQUEST_METHOD']==='POST'){
                require_once 'models/Cita.php';
                $cita = new Cita();
                $cita->setId($_POST['id']);
                $cita->setNombre($_POST['nombre']);
                $cita->setConsulta($_POST['consulta']);
                $cita->setFecha_consulta($_POST['fconsulta']);
                $cita->setFecha_cita($_POST['fcita']);
                $cita->setHora_cita($_POST['hcita']);
                $cita->getId() > 0 
                ? $this->model->editar($cita)
                : $this->model->nuevo($cita);
                header('Location: index.php?c=cita/listar');
            }    
        }
        public function Eliminar(){
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $id=$_POST['id'];
                $this->model->Eliminar($id);
                header('Location: index.php?c=cita/listar');
            }
        }
       
    }

?>