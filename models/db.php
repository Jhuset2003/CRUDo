<?php 
    class Db{

        private $conn;

        public function __construct(){
            $this->conn=null;
            try {
                $this->conn= $this->mysql=$this->connect();
                echo 'conexion exitosa';
            } catch (PDOException $excepcion) {
                echo 'Error de conexion' . $excepcion->getMessage();
            } 
        }

        function connect(){
            $env=(include 'config/env.php');
            //nombre del host, nombre de la database, nombre del usuario, password, charset utf-8
            //PDO mysqli
            $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
            $pdo =new pdo("mysql:host={$env['bd']['host']}; dbname={$env['bd']['database']};charset{$env['bd']['charset']}", $env['bd']['user'], $env['bd']['password'], $options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }

        public function getConection(){
            return $this->conn;
        }

        

    }
?>