<?php
include("conexion.php");
class Cliente extends Conexion
{
    private $conexion, $id, $cedula, $nombre, $apellido, $fecha, $telefono,
        $correo, $direccion, $edad, $sangre, $lente, $formaPago,
        $referencia, $cantidadDolar, $sucursal, $usuario, $desde, $hasta,
        $debitoCredito, $precioDolar;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function setDatos($datos)
    {
        $this->fecha = isset($datos["Fecha"]) ? $datos["Fecha"] : null;
        $this->cedula = isset($datos["Cedula"]) ? $datos["Cedula"] : null;
        $this->nombre = isset($datos["Nombre"]) ? $datos["Nombre"] : null;
        $this->apellido = isset($datos["Apellido"]) ? $datos["Apellido"] : null;
        $this->telefono = isset($datos["Telefono"]) ? $datos["Telefono"] : null;
        $this->correo = isset($datos["Correo"]) ? $datos["Correo"] : null;
        $this->direccion = isset($datos["Direccion"]) ? $datos["Direccion"] : null;
        $this->edad = isset($datos["Edad"]) ? $datos["Edad"] : null;
        $this->sangre = isset($datos["Sangre"]) ? $datos["Sangre"] : null;
        $this->lente = isset($datos["Lente"]) ? $datos["Lente"] : null;
        $this->formaPago = isset($datos["formaPago"]) ? $datos["formaPago"] : null;
        $this->referencia = isset($datos["Referencia"]) ? $datos["Referencia"] : null;
        $this->cantidadDolar = isset($datos["cantidadDolar"]) ? $datos["cantidadDolar"] : null;
        $this->sucursal = isset($datos["Sucursal"]) ? $datos["Sucursal"] : null;
        $this->usuario = isset($datos["Asesor"]) ? $datos["Asesor"] : null;
        $this->desde = isset($datos["Desde"]) ? $datos["Desde"] : null;
        $this->hasta = isset($datos["Hasta"]) ? $datos["Hasta"] : null;
    }

    public function Consultar_Todos()
    {
        $sql = $this->conexion->prepare("SELECT medico.*, cliente.*, usuario.*, sucursal.*
        FROM medico
        INNER JOIN cliente ON cliente.cliente_id = medico.cliente_id
        INNER JOIN usuario ON usuario.usuario_id = medico.usuario_id
        INNER JOIN sucursal ON sucursal.sucursal_id = medico.sucursal_id");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }



    public function Consultar_Uno()
    {
        $sql = $this->conexion->prepare("SELECT * FROM cliente WHERE cliente_cedula = ? AND cliente_nombre != '' AND cliente_apellido != '' ");
        if ($sql->execute([$this->cedula])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }
    
     public function Consultar_Medico($id)
    {
        $sql = $this->conexion->prepare("SELECT medico.*, cliente.* 
        FROM medico 
        INNER JOIN cliente ON cliente.cliente_id = medico.cliente_id
        WHERE medico_id = ?");
        if ($sql->execute([$id])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function consultar_Titular()
    {
        $sql = $this->conexion->prepare("SELECT * FROM cliente WHERE cliente_cedula = ? AND cliente_nombre != '' AND cliente_apellido != ''");
        if ($sql->execute([$this->cedula])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql2 = $this->conexion->prepare("SELECT * FROM titular WHERE titular_cedula = ?");
            if ($sql2->execute([$this->cedula])) {
                $resultadoTitular = $sql2->fetchAll(PDO::FETCH_ASSOC);
                return $resultadoTitular;
            } else {
                return [];
            }
        }
        return $resultado;
    }

    public function Cumple()
    {
        $dia = date("d");
        $mes = date("m");
        $sql = $this->conexion->prepare("SELECT cliente.*, usuario.*, sucursal.* FROM cliente 
        INNER JOIN usuario_
        WHERE MONTH(cliente_fechaNacimiento) = :mes 
        AND DAY(cliente_fechaNacimiento) = :dia");
        $sql->bindParam(":mes", $mes, PDO::PARAM_INT);
        $sql->bindParam(":dia", $dia, PDO::PARAM_INT);
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function buscarCliente()
    {
        $sql = $this->conexion->prepare("SELECT * FROM cliente WHERE cliente_cedula = ?");
        $sql->execute([$this->cedula]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            $this->id = $resultado[0]["cliente_id"];
        }else {
            $sql = $this->conexion->prepare("INSERT INTO 
        cliente(cliente_nombre, cliente_apellido, cliente_cedula, cliente_fechaNacimiento)
        VALUES(?,?,?,?)");
            $sql->execute([
                $this->nombre,
                $this->apellido,
                $this->cedula,
                $this->fecha
            ]);

            $this->id = $this->conexion->lastInsertId();
        }
    }

    public function registrar()
    {
        if ($this->desde == "" || $this->desde == null) {
            $this->desde = date('Y-m-d'); // Establecer $this->desde a la fecha actual si está vacío o nulo
        }

        if ($this->hasta == "" || $this->hasta == null) {
            $fechaActual = new DateTime($this->desde);
            $fechaActual->modify('+5 years');
            $this->hasta = $fechaActual->format('Y-m-d'); // Establecer $this->hasta a $this->desde + 5 años si está vacío o nulo
        }
        $sql = $this->conexion->prepare("INSERT INTO medico 
            (cliente_id, 
            medico_edad, 
            medico_fechaInicio, 
            medico_fechaVencimiento, 
            medico_tipoSangre, 
            medico_lente,
            debitoCredito_id, 
            usuario_id, 
            sucursal_id)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?,?)");
        $sql->execute([
            $this->id,
            $this->edad,
            $this->desde,
            $this->hasta,
            $this->sangre,
            $this->lente,
            $this->debitoCredito,
            $this->usuario,
            $this->sucursal
        ]);
        return $this->conexion->lastInsertId();
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

    public function debitoCredito($ingreso, $motivo)
    {
        date_default_timezone_set('America/Caracas');
        $fecha = date("Y-m-d");
        $hora = date("H:i:s");
        $sql = $this->conexion->prepare("INSERT INTO debitocredito(
            nota_IngresoEgreso,
            nota_motivo,
            nota_fecha,
            nota_hora,
            nota_tipoPago,
            nota_referencia,
            nota_monto,
            precioDolar_id,
            usuario_id,
            sucursal_id
        )VALUES(?,?,?,?,?,?,?,?,?,?)");
        $sql->execute([
            $ingreso,
            $motivo,
            $fecha,
            $hora,
            $this->formaPago,
            $this->referencia,
            $this->cantidadDolar,
            $this->precioDolar,
            $this->usuario,
            $this->sucursal
        ]);

        $this->debitoCredito = $this->conexion->lastInsertId();
    }

    public function Seguro($id)
    {
        $sql = $this->conexion->prepare("SELECT medico.*, cliente.*
        FROM medico
        INNER JOIN cliente ON cliente.cliente_id = medico.cliente_id
        WHERE medico_id = ?");
        $sql->execute([$id]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
}
