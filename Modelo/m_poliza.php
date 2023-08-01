<?php
include("conexion.php");

class Poliza extends Conexion
{
    private
        $conexion, $id, $nombre, $apellido, $cedula,
        $fechaNacimiento, $telefono, $correo, $direccion,
        $usuario, $sucursal, $estado,
        // Titular
        $titular, $cedulaTitular, $nombreTitular, $apellidoTitular,
        // vehiculo
        $placa, $puesto, $año, $serialMotor, $color,
        $serialCarroceria, $modelo, $marca, $uso,
        $clase, $tipo, $peso, $capacidad,
        // Contrato
        $cobertura,
        $fechaInicio, $fechaVencimiento, $contrato,
        $vendedor, $transporte, $dañoCosas,
        $dañoPersonas, $fianza, $asistencia, $apov,
        $muerte, $invalidez, $medico, $grua,
        $monto, $metodoPago, $referencia, $cantidadDolar,
        $cantidadBolivar,
        // ID
        $vehiculo, $cliente, $precioDolar, $debitoCredito;
    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function setDatos($datos)
    {
        $this->id = isset($datos["ID"]) ? $datos["ID"] : null;
        // Cliente
        $this->nombre = isset($datos["Nombre"]) ? $datos["Nombre"] : null;
        $this->apellido = isset($datos["Apellido"]) ? $datos["Apellido"] : null;
        $this->cedula = isset($datos["Cedula"]) ? $datos["Cedula"] : null;
        $this->fechaNacimiento = isset($datos["fechaNacimiento"]) ? $datos["fechaNacimiento"] : null;
        $this->telefono = isset($datos["Telefono"]) ? $datos["Telefono"] : null;
        $this->correo = isset($datos["Correo"]) ? $datos["Correo"] : null;
        $this->direccion = isset($datos["Direccion"]) ? $datos["Direccion"] : null;
        $this->estado = isset($datos["Estado"]) ? $datos["Estado"] : null;
        $this->usuario = isset($datos["Usuario"]) ? $datos["Usuario"] : null;
        $this->sucursal = isset($datos["Sucursal"]) ? $datos["Sucursal"] : null;
        $this->transporte = isset($datos["Transporte"]) ? $datos["Transporte"] : null;
        // Vehiculo
        $this->placa = isset($datos["Placa"]) ? $datos["Placa"] : null;
        $this->puesto = isset($datos["Puestos"]) ? $datos["Puestos"] : null;
        $this->año = isset($datos["Año"]) ? $datos["Año"] : null;
        $this->serialMotor = isset($datos["serialMotor"]) ? $datos["serialMotor"] : null;
        $this->color = isset($datos["Color"]) ? $datos["Color"] : null;
        $this->serialCarroceria = isset($datos["serialCarroceria"]) ? $datos["serialCarroceria"] : null;
        $this->modelo = isset($datos["Modelo"]) ? $datos["Modelo"] : null;
        $this->marca = isset($datos["Marca"]) ? $datos["Marca"] : null;
        $this->uso = isset($datos["Uso"]) ? $datos["Uso"] : null;
        $this->clase = isset($datos["Clase"]) ? $datos["Clase"] : null;
        $this->tipo = isset($datos["Tipo"]) ? $datos["Tipo"] : null;
        $this->peso = isset($datos["Peso"]) ? $datos["Peso"] : null;
        $this->capacidad = isset($datos["Capacidad"]) ? $datos["Capacidad"] : null;
        // Titular
        $this->cedulaTitular = isset($datos["cedulaTitular"]) ? $datos["cedulaTitular"] : null;
        $this->nombreTitular = isset($datos["nombreTitular"]) ? $datos["nombreTitular"] : null;
        $this->apellidoTitular = isset($datos["apellidoTitular"]) ? $datos["apellidoTitular"] : null;
        // Contrato
        $this->fechaInicio = isset($datos["fechaInicio"]) ? $datos["fechaInicio"] : null;
        $this->fechaVencimiento = isset($datos["fechaVencimiento"]) ? $datos["fechaVencimiento"] : null;
        $this->contrato = isset($datos["Contrato"]) ? $datos["Contrato"] : null;
        $this->vendedor = isset($datos["Vendedor"]) ? $datos["Vendedor"] : null;
        // Covertura
        $this->dañoCosas = isset($datos["dañoCosas"]) ? $datos["dañoCosas"] : null;
        $this->dañoPersonas = isset($datos["dañoPersonas"]) ? $datos["dañoPersonas"] : null;
        $this->fianza = isset($datos["Fianza"]) ? $datos["Fianza"] : null;
        $this->asistencia = isset($datos["Asistencia"]) ? $datos["Asistencia"] : null;
        $this->apov = isset($datos["Apov"]) ? $datos["Apov"] : null;
        $this->muerte = isset($datos["Muerte"]) ? $datos["Muerte"] : null;
        $this->invalidez = isset($datos["Invalidez"]) ? $datos["Invalidez"] : null;
        $this->medico = isset($datos["Medico"]) ? $datos["Medico"] : null;
        $this->grua = isset($datos["Grua"]) ? $datos["Grua"] : null;
        $this->monto = isset($datos["Monto"]) ? $datos["Monto"] : null;
        // Pago
        $this->metodoPago = isset($datos["metodoPago"]) ? $datos["metodoPago"] : null;
        $this->referencia = isset($datos["Referencia"]) ? $datos["Referencia"] : null;
        $this->cantidadDolar = isset($datos["cantidadDolar"]) ? $datos["cantidadDolar"] : null;
        $this->cantidadBolivar = isset($datos["cantidadBolivar"]) ? $datos["cantidadBolivar"] : null;
    }

    public function buscarModelo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM modelo WHERE modelo_nombre = ?");
        $sql->execute([$this->modelo]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            $this->modelo = $resultado[0]["modelo_id"];
        } else {
            $sql = $this->conexion->prepare("INSERT INTO modelo (modelo_nombre, modelo_estatus) VALUES (?,?)");
            $sql->execute([$this->modelo, 1]);
            $this->modelo = $this->conexion->lastInsertId();
        }
    }

    public function buscarMarca()
    {
        $sql = $this->conexion->prepare("SELECT * FROM marca WHERE marca_nombre = ?");
        $sql->execute([$this->marca]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            $this->marca = $resultado[0]["marca_id"];
        } else {
            $sql = $this->conexion->prepare("INSERT INTO marca (marca_nombre, marca_estatus) VALUES (?,?)");
            $sql->execute([$this->marca, 1]);
            $this->marca = $this->conexion->lastInsertId();
        }
    }

    public function buscarTitular()
    {
        $sql = $this->conexion->prepare("SELECT * FROM titular WHERE titular_cedula = ?");
        $sql->execute([$this->cedulaTitular]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            $this->titular = $resultado[0]["titular_id"];
        } else {
            $sql = $this->conexion->prepare("INSERT INTO
            titular(titular_nombre,titular_apellido,titular_cedula,titular_estatus)
            VALUES(?,?,?,?)");
            $sql->execute([$this->nombreTitular, $this->apellidoTitular, $this->cedulaTitular, 1]);
            $this->titular = $this->conexion->lastInsertId();
        }
    }

    public function buscarColor()
    {
        $sql = $this->conexion->prepare("SELECT * FROM color WHERE color_nombre = ?");
        $sql->execute([$this->color]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            $this->color = $resultado[0]["color_id"];
        } else {
            $sql = $this->conexion->prepare("INSERT INTO color(color_nombre,color_estatus) VALUES(?,?)");
            $sql->execute([$this->color, 1]);
            $this->color = $this->conexion->lastInsertId();
        }
    }

    public function buscarCliente()
    {
        $sql = $this->conexion->prepare("SELECT * FROM cliente WHERE cliente_cedula = ?");
        $sql->execute([$this->cedula]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            $this->cliente = $resultado[0]["cliente_id"];
        } else {
            $sql = $this->conexion->prepare("INSERT INTO 
        cliente(cliente_nombre, cliente_apellido, cliente_cedula, cliente_fechaNacimiento, cliente_telefono, cliente_correo, cliente_direccion)
        VALUES(?,?,?,?,?,?,?)");
            $sql->execute([
                $this->nombre,
                $this->apellido,
                $this->cedula,
                $this->fechaNacimiento,
                $this->telefono,
                $this->correo,
                $this->direccion,
            ]);

            $this->cliente = $this->conexion->lastInsertId();
        }
    }

    public function buscarVehiculo()
    {
        $sql = $this->conexion->prepare("SELECT * FROM vehiculo WHERE vehiculo_placa = ?");
        $sql->execute([$this->placa]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            $this->vehiculo = $resultado[0]["vehiculo_id"];
        } else {
            $sql = $this->conexion->prepare("INSERT INTO vehiculo(
            vehiculo_placa,
            vehiculo_puesto,
            vehiculo_año,
            vehiculo_serialMotor,
            vehiculo_serialCarroceria,
            vehiculo_peso,
            vehiculo_capTon,
            color_id,
            modelo_id,
            marca_id,
            uso_id,
            clase_id,
            tipo_id
            )
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $sql->execute([
                $this->placa,
                $this->puesto,
                $this->año,
                $this->serialMotor,
                $this->serialCarroceria,
                $this->peso,
                $this->capacidad,
                $this->color,
                $this->modelo,
                $this->marca,
                $this->uso,
                $this->clase,
                $this->tipo,
            ]);

            $this->vehiculo = $this->conexion->lastInsertId();
        }
    }

    public function RegistrarCobertura()
    {
        $sql = $this->conexion->prepare("INSERT INTO coberturas(
            cobertura_danoCosas,
            cobertura_danoPersonas,
            cobertura_fianzaCuanti,
            cobertura_asistenciaLegal,
            cobertura_apov,
            cobertura_muerte,
            cobertura_invalidez,
            cobertura_gastosMedicos,
            cobertura_grua,
            totalPagar 
            )VALUES(?,?,?,?,?,?,?,?,?,?)");
        $sql->execute([
            $this->dañoCosas,
            $this->dañoPersonas,
            $this->fianza,
            $this->asistencia,
            $this->apov,
            $this->muerte,
            $this->invalidez,
            $this->medico,
            $this->grua,
            $this->monto
        ]);
        $this->cobertura = $this->conexion->lastInsertId();
    }

    public function EditarCobertura()
    {
        $sql = $this->conexion->prepare("UPDATE coberturas SET
            cobertura_danoCosas = ?,
            cobertura_danoPersonas = ?,
            cobertura_fianzaCuanti = ?,
            cobertura_asistenciaLegal = ?,
            cobertura_apov = ?,
            cobertura_muerte = ?,
            cobertura_invalidez = ?,
            cobertura_gastosMedicos = ?,
            cobertura_grua = ?,
            totalPagar = ?
            WHERE cobertura_id = ?"); // Asumiendo que tienes un campo 'id' que identifica la cobertura que deseas editar
        $sql->execute([
            $this->dañoCosas,
            $this->dañoPersonas,
            $this->fianza,
            $this->asistencia,
            $this->apov,
            $this->muerte,
            $this->invalidez,
            $this->medico,
            $this->grua,
            $this->monto,
            $this->id // Aquí debes proporcionar el ID de la cobertura que deseas editar
        ]);
    }


    public function registarPoliza()
    {
        $sql = $this->conexion->prepare("INSERT INTO poliza(
            cliente_id,
            titular_id,
            vehiculo_id,
            poliza_fechaInicio,
            poliza_fechaVencimiento,
            tipoContrato_id,
            estado_id,
            usuario_id,
            sucursal_id,
            cobertura_id,
            poliza_renovacion,
            debitoCredito
        )VALUES(?,?,?,?,?,?,?,?,?,?,0,?)");
        $sql->execute([
            $this->cliente,
            $this->titular,
            $this->vehiculo,
            $this->fechaInicio,
            $this->fechaVencimiento,
            $this->contrato,
            $this->estado,
            $this->usuario,
            $this->sucursal,
            $this->cobertura,
            $this->debitoCredito
        ]);
        $idPoliza = $this->conexion->lastInsertId();
        if ($sql->rowCount() > 0) {
            include("datosQR.php");
            $qr = new QR();
            $qr->generarQr($idPoliza);
            return $idPoliza;
        } else {
            return 2;
        }
    }

    public function Vencer($id)
    {
        date_default_timezone_set('America/Caracas');
        $diaActual = date('Y-m-d'); // Obtener el día actual
        $diaCinco = date('Y-m-d', strtotime('+30 day')); // Obtener el quinto día
        if ($id == 57) {
            $sql = $this->conexion->prepare("SELECT poliza.*, cliente.*, vehiculo.*, usuario.*, sucursal.*
        FROM poliza 
        INNER JOIN cliente ON cliente.cliente_id = poliza.cliente_id
        INNER JOIN sucursal ON sucursal.sucursal_id = poliza.sucursal_id
        INNER JOIN usuario ON usuario.usuario_id = poliza.usuario_id
        INNER JOIN vehiculo ON vehiculo.vehiculo_id = poliza.vehiculo_id
        WHERE poliza.poliza_fechaVencimiento > :diaActual AND 
        poliza.poliza_fechaVencimiento <= :diaCinco
        ORDER BY STR_TO_DATE(poliza.poliza_fechaVencimiento, '%Y-%m-%d') ASC");
        } else {
            $sql = $this->conexion->prepare("SELECT poliza.*, cliente.*, vehiculo.*, usuario.*, sucursal.*
        FROM poliza 
        INNER JOIN cliente ON cliente.cliente_id = poliza.cliente_id
        INNER JOIN sucursal ON sucursal.sucursal_id = poliza.sucursal_id
        INNER JOIN usuario ON usuario.usuario_id = poliza.usuario_id
        INNER JOIN vehiculo ON vehiculo.vehiculo_id = poliza.vehiculo_id
        WHERE usuario.usuario_id = :id AND 
        poliza.poliza_fechaVencimiento > :diaActual AND 
        poliza.poliza_fechaVencimiento <= :diaCinco
        ORDER BY STR_TO_DATE(poliza.poliza_fechaVencimiento, '%Y-%m-%d') ASC");
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
        }
        $sql->bindParam(':diaActual', $diaActual, PDO::PARAM_STR);
        $sql->bindParam(':diaCinco', $diaCinco, PDO::PARAM_STR);
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function ConsultarTodo($id)
    {
        if ($id == 57) {
            $sql = $this->conexion->prepare("SELECT poliza.*, cliente.*, sucursal.*,usuario.*, vehiculo.*
            FROM poliza
            INNER JOIN cliente ON cliente.cliente_id = poliza.cliente_id
            INNER JOIN sucursal ON sucursal.sucursal_id = poliza.sucursal_id
            INNER JOIN usuario ON usuario.usuario_id = poliza.usuario_id
            INNER JOIN vehiculo ON vehiculo.vehiculo_id = poliza.vehiculo_id");
        } else {
            $sql = $this->conexion->prepare("SELECT poliza.*, cliente.*, sucursal.*,usuario.*, vehiculo.*
            FROM poliza
            INNER JOIN cliente ON cliente.cliente_id = poliza.cliente_id
            INNER JOIN sucursal ON sucursal.sucursal_id = poliza.sucursal_id
            INNER JOIN usuario ON usuario.usuario_id = poliza.usuario_id
            INNER JOIN vehiculo ON vehiculo.vehiculo_id = poliza.vehiculo_id
            WHERE usuario_id = :id");
            $sql->bindParam(':id', $id, PDO::PARAM_INT);
        }
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
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
            $this->metodoPago,
            $this->referencia,
            $this->cantidadDolar,
            $this->precioDolar,
            $this->usuario,
            $this->sucursal
        ]);

        $this->debitoCredito = $this->conexion->lastInsertId();
    }

    public function consultarUno($id)
    {
        $sql = $this->conexion->prepare("SELECT poliza.*,vehiculo.*, titular.*, cliente.*, marca.*, modelo.*, usovehiculo.*, color.*,tipovehiculo.*, usuario.*, clasevehiculo.*, 
        tipocontrato.*, usovehiculo.*,coberturas.* 
        FROM poliza 
        INNER JOIN vehiculo ON vehiculo.vehiculo_id = poliza.vehiculo_id
        INNER JOIN titular ON titular.titular_id = poliza.titular_id
        INNER JOIN cliente ON cliente.cliente_id = poliza.cliente_id
        INNER JOIN marca ON marca.marca_id = vehiculo.marca_id
        INNER JOIN modelo ON modelo.modelo_id = vehiculo.modelo_id
        INNER JOIN usovehiculo ON usovehiculo.usoVehiculo_id = vehiculo.uso_id
        INNER JOIN color ON color.color_id = vehiculo.color_id
        INNER JOIN tipovehiculo ON tipovehiculo.tipoVehiculo_id = vehiculo.tipo_id
        INNER JOIN usuario ON usuario.usuario_id = poliza.usuario_id
        INNER JOIN tipocontrato ON tipocontrato.contrato_id = poliza.tipoContrato_id
        INNER JOIN clasevehiculo ON clasevehiculo.clase_id = vehiculo.clase_id
        INNER JOIN coberturas ON coberturas.cobertura_id = poliza.cobertura_id
        WHERE poliza_id = $id");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function renovar()
    {
        $sql = $this->conexion->prepare("UPDATE poliza SET
        poliza_fechaInicio =?,
        poliza_fechaVencimiento = ?,
        poliza_renovacion = poliza_renovacion+1 WHERE poliza_id = ?");
        $sql->execute([$this->fechaInicio, $this->fechaVencimiento, $this->id]);
        if ($sql->rowCount() > 0) {
            include("datosQR.php");
            $qr = new QR();
            $qr->generarQr($this->id);
            return $this->id;
        } else {
            return 2;
        }
    }

    public function editarCliente()
    {
        $sql = $this->conexion->prepare("UPDATE
        cliente SET
         cliente_nombre = ?,
         cliente_apellido = ?,
         cliente_cedula = ?,
         cliente_fechaNacimiento = ?,
         cliente_telefono = ?,
         cliente_correo = ?,
         cliente_direccion = ?
         WHERE cliente_cedula = ?");
        $sql->execute([
            $this->nombre,
            $this->apellido,
            $this->cedula,
            $this->fechaNacimiento,
            $this->telefono,
            $this->correo,
            $this->direccion,
            $this->cedula
        ]);
    }

    public function editarVehiculo()
    {
        $sql = $this->conexion->prepare("UPDATE vehiculo SET
        vehiculo_placa = ?,
        vehiculo_puesto = ?,
        vehiculo_año = ?,
        vehiculo_serialMotor = ?,
        vehiculo_serialCarroceria = ?,
        vehiculo_peso = ?,
        vehiculo_capTon = ?,
        uso_id = ?,
        clase_id = ?,
        tipo_id = ?
        WHERE vehiculo_placa = ?");
        $sql->execute([
            $this->placa,
            $this->puesto,
            $this->año,
            $this->serialMotor,
            $this->serialCarroceria,
            $this->peso,
            $this->capacidad,
            $this->uso,
            $this->clase,
            $this->tipo,
            $this->placa
        ]);
    }

    public function Consultar_Diario($desde, $hasta)
    {
        if (empty($desde) && empty($hasta)) {
            $desde = date("Y-m-d");
            $hasta = date("Y-m-d");
        }
        $sql = $this->conexion->prepare("SELECT poliza.*, usuario.*, sucursal.*, coberturas.*, debitocredito.*
        FROM poliza 
        INNER JOIN usuario ON usuario.usuario_id = poliza.usuario_id
        INNER JOIN sucursal ON sucursal.sucursal_id = poliza.sucursal_id
        INNER JOIN coberturas ON coberturas.cobertura_id = poliza.cobertura_id
        INNER JOIN debitocredito ON debitocredito.nota_id = poliza.debitoCredito
        WHERE DATE(poliza_fechaInicio) BETWEEN ? AND ?");
        $sql->bindValue(1, $desde, PDO::PARAM_STR);
        $sql->bindValue(2, $hasta, PDO::PARAM_STR);
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Consultar_Anual()
    {
        date_default_timezone_set('America/Caracas');
        $year = date('Y');
        $fechaInicio = $year . '-01-01';
        $fechaFin = $year . '-12-31';
        $sql = $this->conexion->prepare("SELECT MONTH(poliza_fechaInicio) AS mes, COUNT(*) AS cantidad FROM poliza WHERE poliza_fechaInicio BETWEEN ? AND ? GROUP BY MONTH(poliza_fechaInicio)");
        if ($sql->execute([$fechaInicio, $fechaFin])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
            // Array para almacenar la cantidad de datos de cada mes
            $cantidadPorMes = array_fill(1, 12, 0); // Inicializar con ceros
            $totalDatos = 0;
            foreach ($resultado as $fila) {
                $mes = $fila['mes'];
                $cantidad = $fila['cantidad'];
                $cantidadPorMes[$mes] = $cantidad;
                $totalDatos += $cantidad;
            }
            $enero = $cantidadPorMes[1];
            $febrero = $cantidadPorMes[2];
            $marzo = $cantidadPorMes[3];
            $abril = $cantidadPorMes[4];
            $mayo = $cantidadPorMes[5];
            $junio = $cantidadPorMes[6];
            $julio = $cantidadPorMes[7];
            $agosto = $cantidadPorMes[8];
            $septiembre = $cantidadPorMes[9];
            $octubre = $cantidadPorMes[10];
            $noviembre = $cantidadPorMes[11];
            $diciembre = $cantidadPorMes[12];
            $meses = [
                "enero" => $enero,
                "febrero" => $febrero,
                "marzo" => $marzo,
                "abril" => $abril,
                "mayo" => $mayo,
                "junio" => $junio,
                "julio" => $julio,
                "agosto" => $agosto,
                "septiembre" => $septiembre,
                "octubre" => $octubre,
                "noviembre" => $noviembre,
                "diciembre" => $diciembre,
                "monto" => $totalDatos
            ];
            return $meses;
        } else {
            $resultado = [];
        }
    }

    public function Reporte($data, $desde, $hasta)
    {
        $resultado = null;
        $sql = $this->conexion->prepare("SELECT * FROM sucursal WHERE sucursal_nombre = ?");
        $sql->execute([$data]);
        $sucursal = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($sucursal)) {
            $resultado = $sucursal;
        } else {
            $sql2 = $this->conexion->prepare("SELECT * FROM usuario WHERE usuario_nombre = ?");
            $sql2->execute([$data]);
            $usuario = $sql2->fetchAll(PDO::FETCH_ASSOC);
            if (!empty($usuario)) {
                $resultado = $usuario;
            }
        }
        if (!empty($resultado)) {
            $usuarioID = isset($resultado[0]["usuario_id"]) ? $resultado[0]["usuario_id"] : null;
            $sucursalID = isset($resultado[0]["sucursal_id"]) ? $resultado[0]["sucursal_id"] : null;
            $sql3 = $this->conexion->prepare("SELECT poliza.*, usuario.*, sucursal.*, cliente.*, tipocontrato.*, vehiculo.*, usovehiculo.*, clasevehiculo.*, color.*,
            modelo.*, marca.*, tipovehiculo.* 
            FROM poliza
            INNER JOIN sucursal ON sucursal.sucursal_id = poliza.sucursal_id
            INNER JOIN cliente ON cliente.cliente_id = poliza.cliente_id
            INNER JOIN usuario ON usuario.usuario_id = poliza.usuario_id
            INNER JOIN tipocontrato ON tipocontrato.contrato_id = poliza.tipoContrato_id
            INNER JOIN vehiculo ON vehiculo.vehiculo_id = poliza.vehiculo_id
            INNER JOIN usovehiculo ON usovehiculo.usoVehiculo_id = vehiculo.uso_id
            INNER JOIN clasevehiculo ON clasevehiculo.clase_id = vehiculo.clase_id
            INNER JOIN color ON color.color_id = vehiculo.color_id
            INNER JOIN modelo ON modelo.modelo_id = vehiculo.modelo_id
            INNER JOIN marca ON marca.marca_id = vehiculo.marca_id
            INNER JOIN tipovehiculo ON tipovehiculo.tipoVehiculo_id = vehiculo.tipo_id
            WHERE (poliza.sucursal_id = ? OR poliza.usuario_id = ?) AND poliza_fechaInicio BETWEEN ? AND ?");
            $sql3->execute([$sucursalID, $usuarioID, $desde, $hasta]);
            $dato = $sql3->fetchAll(PDO::FETCH_ASSOC);
            return $dato;
        }
        return [];
    }
}
