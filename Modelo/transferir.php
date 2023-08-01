<?php
include("conexion.php");
include("conexion2.php");

class Transferir
{
    private $conexion, $conexion2;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
        $this->conexion2 = new Conexion2();
        $this->conexion2 = $this->conexion2->getBD();
    }

    public function cliente()
    {
        set_time_limit(40000);
        $sql = $this->conexion2->prepare("SELECT * FROM cliente");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO cliente(
                cliente_nombre,
                cliente_apellido,
                cliente_cedula,
                cliente_fechaNacimiento,
                cliente_telefono,
                cliente_correo,
                cliente_direccion
            )VALUES(?,?,?,?,?,?,?)");
            $sql2->execute([
                $fila["cliente_nombre"],
                $fila["cliente_apellido"],
                $fila["cliente_cedula"],
                $fila["cliente_fechaNacimiento"],
                $fila["cliente_telefono"],
                $fila["cliente_correo"],
                $fila["cliente_direccion"]
            ]);
        }
    }

    public function titular()
    {
        set_time_limit(40000);
        $sql = $this->conexion2->prepare("SELECT cedulaTitular FROM poliza");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $cantidadDatos = count($resultado);

            echo "La variable \$resultado contiene $cantidadDatos datos.<br>";
            // $nombresApellidos = explode(" ", $valor);
            // // Obtener los primeros dos nombres
            // $nombre = $nombresApellidos[0] . " " . $nombresApellidos[1];
            // // Obtener los dos apellidos (últimos dos eementos)
            // $apellido = $nombresApellidos[count($nombresApellidos) - 2] . " " . $nombresApellidos[count($nombresApellidos) - 1];
            // if ($nombre == "") {
            //     $nombre = "";
            // }
            // if ($apellido == "") {
            //     $apellido = " ";
            // }

            // $sql2 = $this->conexion->prepare("INSERT INTO titular(
            //     titular_nombre,
            //     titular_apellido,
            //     titular_cedula,
            //     titular_estatus) VALUES (?,?,?,?)");
            // $sql2->execute([
            //     $nombre,
            //     $apellido,
            //     $fila["cedulaTitular"],
            //     1
            // ]);
        };
    }
    function claseVehiculo()
    {
        set_time_limit(40000);
        $sql = $this->conexion2->prepare("SELECT * FROM clasevehiculo");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO clasevehiculo(clase_nombre,clase_estatus) VALUES(?,?)");
            $sql2->execute([
                $fila["clase_nombre"],
                $fila["clase_estatus"]
            ]);
        }
    }
    // $sql = $this->conexion1->prepare("ALTER Table vendedor AUTO_INCREMENT");
    function cobertura()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM poliza");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            echo "<br>" . $fila["poliza_id"];
            $sql2 = $this->conexion->prepare("INSERT INTO coberturas(cobertura_id)VALUES(?)");
            $sql2->execute([$fila["poliza_id"]]);
        }
    }
    function cobertura2()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM poliza");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("UPDATE coberturas SET
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
                WHERE cobertura_id = ?");
            $sql2->execute([
                $fila["totalDañoCosas"],
                $fila["totalDañoPersona"],
                $fila["totalFianzaFacultativa"],
                $fila["totalAsistenciaLegal"],
                $fila["totalAPOV"],
                $fila["totalMuert"],
                $fila["totalInvalidez"],
                $fila["totalGastosMedicos"],
                $fila["totalGruaEstacionamiento"],
                $fila["totalPagar"],
                $fila["poliza_id"]
            ]);
        }
    }

    function color()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT DISTINCT vehiculo_color FROM vehiculo");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO color(color_nombre,color_estatus) VALUES(?,1)");
            $sql2->execute([$fila["vehiculo_color"]]);
        }
    }

    function estado()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM estado");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO estado (estado_nombre,estado_estatus) VALUES(?,1)");
            $sql2->execute([$fila["estado_nombre"]]);
        }
    }

    function marca()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT DISTINCT vehiculo_marca FROM vehiculo");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO marca (marca_nombre,marca_estatus) VALUES(?,1)");
            $sql2->execute([
                $fila["vehiculo_marca"]
            ]);
        }
    }

    function roles()
    {
        set_time_limit(5000);
        $sql = $this->conexion2->prepare("SELECT * FROM roles");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO roles(roles_nombre,roles_estatus) VALUES(?,1)");
            $sql2->execute([$fila["roles_nombre"]]);
        }
    }
    function usuario()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM usuarios");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO usuario(
                usuario_usuario,
                usuario_nombre,
                usuario_apellido,
                usuario_cedula,
                usuario_telefono,
                usuario_direccion,
                usuario_correo,
                usuario_clave,
                roles_id,
                sucursal_id,
                usuario_estatus
            )VALUES(?,?,?,?,?,?,?,?,?,?,1)");
            $sql2->execute([
                $fila["usuario_usuario"],
                $fila["usuario_nombre"],
                $fila["usuario_apellido"],
                $fila["usuario_cedula"],
                $fila["usuario_telefono"],
                $fila["usuario_direccion"],
                $fila["usuario_correo"],
                $fila["usuario_clave"],
                $fila["roles_id"],
                $fila["sucursal_id"]
            ]);
        }
    }

    function sucursal()
    {
        $sql = $this->conexion2->prepare("SELECT * FROM sucursal");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO sucursal(sucursal_nombre,sucursal_estatus) VALUES(?,1)");
            $sql2->execute([$fila["sucursal_nombre"]]);
        }
    }

    function modelo()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT DISTINCT vehiculo_modelo FROM vehiculo");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO modelo (modelo_nombre,modelo_estatus) VALUES(?,1)");
            $sql2->execute([
                $fila["vehiculo_modelo"]
            ]);
        }
    }

    function permisos()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM permisos_usuario");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO permisos_usuario(permiso_modulo,usuario_id)VALUES(?,?)");
            $sql2->execute([
                $fila["modulo"],
                $fila["usuario_id"]
            ]);
        }
    }

    function tipoContrato()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM tipocontrato");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO tipocontrato(
                contrato_nombre,dañoCosas,dañoPersonas,fianzaCuanti,asistenciaLegal,apov,muerte,invalidez,gastosMedicos,grua,contrato_estatus)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $sql2->execute([
                $fila["contrato_nombre"],
                $fila["dañoCosas"],
                $fila["dañoPersonas"],
                $fila["fianzaCuanti"],
                $fila["asistenciaLegal"],
                $fila["apov"],
                $fila["muerte"],
                $fila["invalidez"],
                $fila["gastosMedicos"],
                $fila["grua"],
                $fila["tipo_estatus"]
            ]);
        }
    }

    function uso()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM usovehiculo");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO usovehiculo (usoVehiculo_nombre,usoVehiculo_estatus) VALUES(?,1)");
            $sql2->execute([
                $fila["uso_nombre"]
            ]);
        }
    }
    function tipo()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM tipovehiculo");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO tipovehiculo (tipoVehiculo_nombre,tipoVehiculo_precio,tipoVehiculo_estatus) VALUES(?,?,1)");
            $sql2->execute([
                $fila["tipo_nombre"],
                $fila["tipo_precio"]
            ]);
        }
    }

    function medico()
    {
        $sql = $this->conexion2->prepare("SELECT * FROM medico");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO medico(
            cliente_id,
            medico_edad,
            medico_fechaInicio,
            medico_fechaVencimiento,
            medico_tipoSangre,
            medico_lente,
            medico_observacion,
            usuario_id,
            sucursal_id)VALUES(?,?,?,?,?,?,?,1,1)");
            $sql2->execute([
                $fila["cliente_id"],
                $fila["medico_edad"],
                $fila["medico_fechaInicio"],
                $fila["medico_fechaVencimiento"],
                $fila["medico_tipoSangre"],
                $fila["medico_lente"],
                $fila["medico_observacion"],
            ]);
        }
    }

    function vehiculo()
    {
        set_time_limit(90000);
        $vehiculo_id_inicio = 4425; // Valor inicial del vehiculo_id
        $sql = $this->conexion2->prepare("SELECT * FROM vehiculo WHERE vehiculo_id > 4423");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO vehiculo
            (vehiculo_id,
            vehiculo_placa,
            vehiculo_puesto,
            vehiculo_año,
            vehiculo_serialMotor,
            vehiculo_serialCarroceria,
            vehiculo_peso,
            vehiculo_capTon)VALUES(?,?,?,?,?,?,?,?)");
            $sql2->execute([
                $vehiculo_id_inicio,
                $fila["vehiculo_placa"],
                $fila["vehiculo_puesto"],
                $fila["vehiculo_año"],
                $fila["vehiculo_serialMotor"],
                $fila["vehiculo_serialCarroceria"],
                $fila["vehiculo_peso"],
                $fila["vehiculo_capTon"]
            ]);
            $vehiculo_id_inicio++; // Incrementa el vehiculo_id para el siguiente registro
        }
    }

    function vehiculoColor()
    {
        set_time_limit(90000);
        $sql = $this->conexion->prepare("SELECT * FROM color");
        $sql->execute();
        $resultado1 = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado1 as $color) {
            $sql2 = $this->conexion2->prepare("SELECT * FROM vehiculo WHERE vehiculo_color = ?");
            $sql2->execute([$color["color_nombre"]]);
            $resultad2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultad2 as $id) {
                $sql3 = $this->conexion->prepare("UPDATE vehiculo SET
                color_id = ? WHERE vehiculo_id = ?");
                $sql3->execute([
                    $color["color_id"],
                    $id["vehiculo_id"]
                ]);
            }
        }
    }
    function vehiculoModelo()
    {
        set_time_limit(90000);
        $sql = $this->conexion->prepare("SELECT * FROM modelo");
        $sql->execute();
        $resultado1 = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado1 as $modelo) {
            $sql2 = $this->conexion2->prepare("SELECT * FROM vehiculo WHERE vehiculo_modelo = ?");
            $sql2->execute([$modelo["modelo_nombre"]]);
            $resultad2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultad2 as $id) {
                $sql3 = $this->conexion->prepare("UPDATE vehiculo SET
                modelo_id = ? WHERE vehiculo_id = ?");
                $sql3->execute([
                    $modelo["modelo_id"],
                    $id["vehiculo_id"]
                ]);
            }
        }
    }

    function vehiculoMarca()
    {
        set_time_limit(90000);
        $sql = $this->conexion->prepare("SELECT * FROM marca");
        $sql->execute();
        $resultado1 = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado1 as $marca) {
            $sql2 = $this->conexion2->prepare("SELECT * FROM vehiculo WHERE vehiculo_marca = ?");
            $sql2->execute([$marca["marca_nombre"]]);
            $resultad2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultad2 as $id) {
                $sql3 = $this->conexion->prepare("UPDATE vehiculo SET
                marca_id = ? WHERE vehiculo_id = ?");
                $sql3->execute([
                    $marca["marca_id"],
                    $id["vehiculo_id"]
                ]);
            }
        }
    }

    function vehiculoDatos()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM vehiculo");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("UPDATE vehiculo SET 
        uso_id = ?,
        clase_id = ?,
        tipo_id = ?
        WHERE vehiculo_id = ?");
            $sql2->execute([
                $fila["uso_id"],
                $fila["clase_id"],
                $fila["tipo_id"],
                $fila["vehiculo_id"]
            ]);
        }
    }
    function poliza()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM poliza");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO poliza(
                poliza_id,
                cliente_id,
                vehiculo_id,
                poliza_fechaInicio,
                poliza_fechaVencimiento,
                tipoContrato_id,
                estado_id,
                usuario_id,
                sucursal_id,
                transporte_id,
                poliza_renovacion
            )VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $sql2->execute([
                $fila["poliza_id"],
                $fila["cliente_id"],
                $fila["vehiculo_id"],
                $fila["poliza_fechaInicio"],
                $fila["poliza_fechaVencimiento"],
                $fila["contrato_id"],
                $fila["estado_id"],
                $fila["vendedor_id"],
                $fila["sucursal_id"],
                $fila["transporte_id"],
                $fila["renovaciones"]
            ]);
        }
    }
    function poliaTitular()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM poliza");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $cedula = $fila["cedulaTitular"];
            $sql2 = $this->conexion->prepare("SELECT * FROM titular WHERE titular_cedula = ?");
            $sql2->execute([$cedula]);
            $resultad2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultad2 as $fila2) {
                $sql3 = $this->conexion->prepare("UPDATE poliza SET titular_id = ? WHERE poliza_id = ?");
                $sql3->execute([$fila2["titular_id"], $fila["poliza_id"]]);
            }
        }
    }

    function polizaCobertura()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT * FROM poliza");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $id = $fila["poliza_id"];
            $sql2 = $this->conexion->prepare("SELECT * FROM coberturas WHERE cobertura_id = ?");
            $sql2->execute([$id]);
            $resultado2 = $sql2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado2 as $fila2) {
                $sql3 = $this->conexion->prepare("UPDATE poliza SET cobertura_id = ? WHERE poliza_id = ?");
                $sql3->execute([$fila2["cobertura_id"], $fila["poliza_id"]]);
            }
        }
    }

    function debitoCredito()
    {
        set_time_limit(90000);
        $sql = $this->conexion2->prepare("SELECT poliza_id FROM poliza");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $sql2 = $this->conexion->prepare("INSERT INTO debitocredito (nota_id) VALUES (?)");
            $sql2->execute([$fila["poliza_id"]]);
        }
    }

    function debitocredito2()
    {
        set_time_limit(9000);
        $sql = $this->conexion2->prepare("SELECT * FROM poliza");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila) {
            $var = "";
            $metodo = $fila["formaDePago"];
            if ($metodo == "Pago movil"){
                $var = "0";
            }
            if ($metodo == "Efectivo"){
                $var = "1";
            }
            if ($metodo == "Transferencia"){
                $var = "2";
            }
            if ($metodo == "Punto"){
                $var = "3";
            }
            $sql2 = $this->conexion->prepare("INSERT INTO debitocredito(
                nota_IngresoEgreso,
                nota_motivo,
                nota_fecha,
                nota_tipoPago,
                nota_referencia,
                nota_monto,
                usuario_id,
                sucursal_id
            )VALUES(?,?,?,?,?,?,?,?)");
            $sql2->execute([
                1,
                "RCV",
                $fila["poliza_fechaInicio"],
                $var,
                "",
                $fila["cantidadDolar"],
                $fila["vendedor_id"],
                $fila["sucursal_id"]
            ]);
        }
    }

    function polizaDebito(){
        set_time_limit(90000);
        $sql = $this->conexion->prepare("SELECT * FROM debitocredito");
        $sql->execute();
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultado as $fila){
            $sql2 = $this->conexion->prepare("UPDATE poliza SET debitoCredito = ? WHERE poliza_id = ?");
            $sql2->execute([$fila["nota_id"], $fila["nota_id"]]);
        }
    }
}

$a = new Transferir();
