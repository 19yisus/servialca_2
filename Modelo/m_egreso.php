<?php
include("conexion.php");

class Egreso extends Conexion
{
    private $conexion, $motivo, $monto, $precioDolar;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function setDatos($datos)
    {
        $this->motivo = isset($datos["Motivo"]) ? $datos["Motivo"] : null;
        $this->monto = isset($datos["Monto"]) ? $datos["Monto"] : null;
        $this->precioDolar = isset($datos["Precio"]) ? $datos["Precio"] : null;
    }

    public function precioDolar($precio)
    {
        date_default_timezone_set('America/Caracas');
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $sql = $this->conexion->prepare("SELECT * FROM preciodolar WHERE dolar_monto = ? AND dolar_fecha=?");
        $sql->execute([$precio, $fecha]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        $this->precioDolar = $resultado[0]["dolar_id"];
        if (count($resultado) == 0) {
            $sql = $this->conexion->prepare("INSERT INTO preciodolar(dolar_monto,dolar_hora,dolar_fecha)VALUES(?,?,?)");
            $sql->execute([$precio, $hora, $fecha]);
            $this->precioDolar = $this->conexion->lastInsertId();
        }
    }

    public function registrar()
    {
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $sql = $this->conexion->prepare("INSERT INTO debitocredito(
            nota_IngresoEgreso,
            nota_motivo,
            nota_fecha,
            nota_hora,
            nota_monto,
            precioDolar_id
        )VALUES(?,?,?,?,?,?)");
        $sql->execute([
            0,
            $this->motivo,
            $fecha,
            $hora,
            $this->monto,
            $this->precioDolar
        ]);
        return true;
    }

    public function consultarTodos()
    {
        $fechaActual = date('Y-m-d');
        $primerDiaMes = date('Y-m-01', strtotime($fechaActual));
        $ultimoDiaMes = date('Y-m-t', strtotime($fechaActual));
    
        $sql = "SELECT * FROM debitocredito WHERE nota_IngresoEgreso = 0 AND nota_fecha BETWEEN '$primerDiaMes' AND '$ultimoDiaMes'";
    
        $resultado = [];
    
        try {
            $stmt = $this->conexion->query($sql);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de errores si es necesario
            // Por ejemplo, puedes imprimir $e->getMessage() para obtener información sobre el error.
        }
    
        return $resultado;
    }

}
