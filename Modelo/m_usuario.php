<?php
include("conexion.php");
class Usuario extends Conexion
{
    private
        $conexion,
        $id,
        $usuario,
        $nombre,
        $apellido,
        $cedula,
        $telefono,
        $direccion,
        $correo,
        $clave,
        $rol,
        $sucursal,
        $estatus,
        $modulo;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->getBD();
    }

    public function setDatos($datos)
    {
        $this->id = isset($datos["ID"]) ? $datos["ID"] : null;
        $this->usuario = isset($datos["Usuario"]) ? $datos["Usuario"] : null;
        $this->nombre = isset($datos["Nombre"]) ? $datos["Nombre"] : null;
        $this->apellido = isset($datos["Apellido"]) ? $datos["Apellido"] : null;
        $this->cedula = isset($datos["Cedula"]) ? $datos["Cedula"] : null;
        $this->telefono = isset($datos["Telefono"]) ? $datos["Telefono"] : null;
        $this->direccion = isset($datos["Direccion"]) ? $datos["Direccion"] : null;
        $this->correo = isset($datos["Correo"]) ? $datos["Correo"] : null;
        $this->clave = isset($datos["Clave"]) ? $datos["Clave"] : null;
        $this->rol = isset($datos["Rol"]) ? $datos["Rol"] : null;
        $this->sucursal = isset($datos["Sucursal"]) ? $datos["Sucursal"] : null;
        $this->estatus = isset($datos["Estatus"]) ? $datos["Estatus"] : null;
        $this->modulo = isset($datos["Modulos"]) ? $datos["Modulos"] : [];
    }

    public function nombreRepetido()
    {
        $sql = $this->conexion->prepare("SELECT * FROM usuario WHERE usuario_usuario = ?");
        $sql->execute([$this->usuario]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultado) >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function Registro()
    {
        $sql = $this->conexion->prepare("INSERT INTO 
        usuario(
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
        $sql->execute([
            $this->usuario,
            $this->nombre,
            $this->apellido,
            $this->cedula,
            $this->telefono,
            $this->direccion,
            $this->correo,
            $this->clave,
            $this->rol,
            $this->sucursal
        ]);
        $this->id = $this->conexion->lastInsertId();
        if ($sql->rowCount() > 0) {
            return 1;
        } else {
            return 2;
        }
    }

    public function Editar()
    {
        $sql = $this->conexion->prepare("UPDATE usuario SET 
        usuario_usuario = ?,
        usuario_nombre = ?,
        usuario_apellido =?,
        usuario_cedula = ?,
        usuario_telefono = ?,
        usuario_direccion = ?,
        usuario_correo = ?,
        usuario_clave = ?
        WHERE usuario_id = ?");
        $sql->execute([
            $this->usuario,
            $this->nombre,
            $this->apellido,
            $this->cedula,
            $this->telefono,
            $this->direccion,
            $this->correo,
            $this->clave,
            $this->id
        ]);
        return 4;
    }

    public function Eliminar()
    {
        $sql = $this->conexion->prepare("UPDATE usuario SET usuario_estatus = ? WHERE usuario_id = ?");
        $sql->execute([$this->estatus, $this->id]);
    }


    public function ConsultarTodo()
    {
        $sql = $this->conexion->prepare("SELECT usuario.*, roles.*, sucursal.* 
        FROM usuario
        INNER JOIN roles ON roles.roles_id = usuario.roles_id
        INNER JOIN sucursal ON sucursal.sucursal_id = usuario.sucursal_id
        WHERE usuario_id > 56");
        if ($sql->execute()) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function consultarUno($id)
    {
        $sql = $this->conexion->prepare("SELECT usuario.*, roles.*, sucursal.* 
        FROM usuario
        INNER JOIN roles ON roles.roles_id = usuario.roles_id
        INNER JOIN sucursal ON sucursal.sucursal_id = usuario.sucursal_id 
        WHERE usuario_id = ?");
        if ($sql->execute([$id])) {
            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $resultado = [];
        }
        return $resultado;
    }

    public function Actualizar_permisos_vista()
    {
        if (!isset($this->id) || $this->id == "" || $this->id == null) return 3;
        $sql = $this->conexion->prepare("DELETE FROM permisos_usuario WHERE usuario_id = ?;");
        $sql->execute([$this->id]);
        foreach ($this->modulo as $modulo) {
            $sql2 = $this->conexion->prepare("INSERT INTO permisos_usuario(permiso_modulo, usuario_id) VALUES(?,?);");
            $sql2->execute([$modulo, $this->id]);
        }
        return 1;
    }
    public function Get_permisos_usuario($id)
    {
        $sql = $this->conexion->prepare("SELECT * FROM permisos_usuario WHERE usuario_id = ?");
        $sql->execute([$id]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }
    public function Login()
    {
        $sql = $this->conexion->prepare("SELECT * FROM usuario WHERE usuario_usuario = ? AND usuario_clave = ?");
        $sql->execute([$this->usuario, $this->clave]);
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultado)) {
            $usuario = $resultado[0];
            if ($usuario["usuario_estatus"] == 0) {
                return false;
            } else {
                $permisos = $this->Get_permisos_usuario($usuario["usuario_id"]);
                $dato = $this->consultarUno($usuario["usuario_id"]);
                $sucursal_nombre = $dato[0]["sucursal_nombre"];
                $sucursal_id = $dato[0]["sucursal_id"];
                $usuario = $dato[0]["usuario_nombre"] . " " . $dato[0]["usuario_apellido"];
                $usuario_id = $dato[0]["usuario_id"];
                $rol = $dato[0]["roles_id"];
                if (!empty($permisos)) {
                    $lista = [];
                    foreach ($permisos as $per) {
                        array_push($lista, $per["permiso_modulo"]);
                    }
                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["usuario_id"] = $usuario_id;
                    $_SESSION["permisos"] = $lista;
                    $_SESSION["sucursal"] = $sucursal_nombre;
                    $_SESSION["sucursal_id"] = $sucursal_id;
                    $_SESSION["rol"] = $rol;
                    return true;
                }
            }
        } else {
            return 2;
        }
    }
}
