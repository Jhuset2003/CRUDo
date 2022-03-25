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

    public function __construct($conn)
    {
        $this->conn = $conn;
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
