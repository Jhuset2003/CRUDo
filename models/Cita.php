<?php 
    class Cita{
        public $conn;
        
        private $id;
        private $nombre;
        private $fecha;
        private $hora;

        public function __construct($conn)
        {
            $this->conn=$conn;
        }

        public function ListCita(){
            echo "si imprimer";
           
            $sql = "SELECT * FROM cita";
            $query = $this->conn->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_ASSOC);
            var_dump($result);
            return $result;
        }

    }
?>