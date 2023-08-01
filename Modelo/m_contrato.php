<?php
include("conexion.php");

class Contrato extends Conexion
{
    private
        $conexion,
        $id,
        $nombre,
        $dañoCosas,
        $dañoPersonas,
        $fianza,
        $asistencia,
        $apov,
        $muerte,
        $invalidez,
        $gastos,
        $grua,
        $estatus;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function setDatos($datos)
    {
        $this->id = isset($datos["ID"]) ? $datos["ID"] : null;
        $this->nombre = isset($datos["Nombre"]) ? $datos["Nombre"] : null;
        $this->dañoCosas = isset($datos["dañoCosas"]) ? $datos["dañoCosas"] : null;
        $this->dañoPersonas = isset($datos["dañoPersonas"]) ? $datos["dañoPersonas"] : null;
        $this->fianza = isset($datos["Fianza"]) ? $datos["Fianza"] : null;
        $this->asistencia = isset($datos["Asistencia"]) ? $datos["Asistencia"] : null;
        $this->apov = isset($datos["Apov"]) ? $datos["Apov"] : null;
        $this->muerte = isset($datos["Muerte"]) ? $datos["Muerte"] : null;
        $this->invalidez = isset($datos["Invalidez"]) ? $datos["Invalidez"] : null;
        $this->gastos = isset($datos["Gastos"]) ? $datos["Gastos"] : null;
        $this->grua = isset($datos["Grua"]) ? $datos["Grua"] : null;
        $this->estatus = isset($datos["Estatus"]) ? $datos["Estatus"] : null;
    }

    public function nombreRepetido()
    {
        $sql = $this->conexion->prepare("SELECT * FROM tipocontrato WHERE contrato_nombre = ?");
        $sql->execute([$this->nombre]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function Registro()
    {
        $sql = $this->conexion->prepare("INSERT INTO tipocontrato
        (
            contrato_nombre,
            dañoCosas,
            dañoPersonas,
            fianzaCuanti,
            asistenciaLegal,
            apov,
            muerte,
            invalidez,
            gastosMedicos,
            grua,
            contrato_estatus
        ) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $sql->execute([
            $this->nombre,
            $this->dañoCosas,
            $this->dañoPersonas,
            $this->fianza,
            $this->asistencia,
            $this->apov,
            $this->muerte,
            $this->invalidez,
            $this->gastos,
            $this->grua,
            1
        ]);
        if ($sql->rowCount() > 0) {
            return 1;
        } else {
            return 2;
        }
    }

    public function Editar()
    {
        $sql = $this->conexion->prepare("UPDATE tipocontrato SET 
        contrato_nombre = ?,
        dañoCosas = ?,
        dañoPersonas = ?,
        fianzaCuanti = ?,
        asistenciaLegal = ?,
        apov = ?,
        muerte = ?,
        invalidez = ?,
        gastosMedicos =?,
        grua= ? 
        WHERE contrato_id = ?");
        $sql->execute([
            $this->nombre,
            $this->dañoCosas,
            $this->dañoPersonas,
            $this->fianza,
            $this->asistencia,
            $this->apov,
            $this->muerte,
            $this->invalidez,
            $this->gastos,
            $this->grua,
            $this->id
        ]);
        return 4;
    }

    public function Eliminar()
    {
        $sql = $this->conexion->prepare("UPDATE tipocontrato SET contrato_estatus = ? WHERE contrato_id = ?");
        $sql->execute([$this->estatus, $this->id]);
    }

    public function ConsultarTodo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM tipocontrato");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function consultarUno()
    {
        $sql = $this->conexion->prepare("SELECT * FROM tipocontrato WHERE contrato_id = ?");
        if ($sql->execute([$this->id])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }
}
