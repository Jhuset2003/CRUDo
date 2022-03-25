<?php
class Cita
{
    public $conn;

    private $id;
    private $nombre;
    private $consulta;
    private $fecha_consulta;
    private $fecha_cita;
    private $hora_cita;

    public function __construct()
    {
        require_once 'models/Db.php';
        $db=new Db();
        $this->conn = $db->getConection();
    }

	public function setId($id) {
		$this->id = $id;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function setConsulta($consulta) {
		$this->consulta = $consulta;
	}

	public function setFecha_consulta($fecha_consulta) {
		$this->fecha_consulta = $fecha_consulta;
	}

	public function setFecha_cita($fecha_cita) {
		$this->fecha_cita = $fecha_cita;
	}

	public function setHora_cita($hora_cita) {
		$this->hora_cita = $hora_cita;
	}

    

    
    public function ListCita()
    {
        echo "si imprimer";

        $sql = "SELECT * FROM cita";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
       // var_dump($result);
        return $result;
    }

    public function editar($cita)
    {
        $sql = "UPDATE cita SET nombre=:nombre,consulta=:consulta,fecha_consulta=:fconsulta,fecha_cita=:fcita,hora_cita=:hcita WHERE id=:id";
        $this->conn->prepare($sql)
            ->execute([
                ':nombre' => $cita->nombre,
                ':consulta' => $cita->consulta,
                ':fconsulta'=>$cita->fecha_consulta,
                ':fcita'=>$cita->fecha_cita,
                ':hcita'=>$cita->hora_cita,
                ':id'=>$cita->id,
            ]);
    }
}
