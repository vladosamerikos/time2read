<?php

require_once("database.php");
class Usuario extends Database
{
    private $id;
    private $nombre;
    private $direccion;
    private $email;
    private $clave;
    private $estado;

    public function login($email, $password)
    {
        $consulta = $this->db->prepare("SELECT * FROM usuario WHERE email LIKE '$email' and clave LIKE '$password' and estado = 1");
        $consulta->execute();
        if ($consulta->fetch(PDO::FETCH_OBJ)) {
            return true;
        } else {
            return false;
        }
    }
 
    public function comprobarEmail($email){
        $consulta = $this->db->prepare("SELECT * FROM usuario WHERE email LIKE '$email'");
        $consulta->execute();
        if ($consulta->fetch(PDO::FETCH_OBJ)) {
            return true;
        } else {
            return false;
        }
    }

    public function signin($email, $password, $nombre, $apellidos, $direccion)
    {
        $consulta = $this->db->prepare("INSERT INTO usuario (nombre, apellidos, direccion, email, clave, estado) VALUES ('$nombre', '$apellidos', '$direccion', '$email', '$password', 1)");
        if($consulta->execute()){
            $last_id = $this->db->lastInsertId();
            return true;
        }else{
            return false;
        }
    }

    public function getDireccion($email){
        $consulta = $this->db->prepare("SELECT direccion FROM usuario WHERE email LIKE '$email'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function setDireccion($email, $direccion){
        $consulta = $this->db->prepare("UPDATE usuario SET direccion = '$direccion' WHERE email = '$email'") ;
        $count =$consulta->execute();
    }


    public function getId($email){
        $consulta = $this->db->prepare("SELECT id_usuario FROM usuario WHERE email LIKE '$email'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function getFoto($email){
        $consulta = $this->db->prepare("SELECT foto FROM usuario WHERE email LIKE '$email'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function getNombre($email){
        $consulta = $this->db->prepare("SELECT nombre FROM usuario WHERE email LIKE '$email'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function getProfile($email){
        $consulta = $this->db->prepare("SELECT * FROM usuario WHERE email LIKE '$email'");
        $consulta->execute();
        $datosUser = $consulta->fetchAll();
        return $datosUser;
    }

    public function editFoto($email,$foto){
        $consulta = $this->db->prepare("UPDATE usuario SET foto = '$foto' WHERE email = '$email'") ;
        $_SESSION['foto']= $foto;
        $count =$consulta->execute();
    }



    public function getOrders($email){
        $consulta = $this->db->prepare("SELECT id_factura, U.nombre AS nombreusu, fecha, total, E.estado AS estado FROM factura F INNER JOIN usuario U ON U.id_usuario = F.fk_id_usuario INNER JOIN estado_factura  E ON F.estado = E.id_estado WHERE U.email LIKE '$email' ORDER BY fecha DESC");
        $consulta->execute();
        $userOrders = $consulta->fetchAll();
        return $userOrders;
    }

    public function obtenerDetallePedido($idfactura){
        $consulta = $this->db->prepare("SELECT * FROM detalle_factura F INNER JOIN articulo A ON F.fk_id_articulo = A.id_articulo WHERE fk_id_factura = $idfactura");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerEstados(){
        $consulta = $this->db->prepare("SELECT * FROM estado_factura");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerBusquedaPedidoUsuario($id_pedido,$email)
    {
        $consulta = $this->db->prepare("SELECT id_factura, fecha, total, E.estado AS estado FROM factura F INNER JOIN usuario U ON U.id_usuario = F.fk_id_usuario INNER JOIN estado_factura  E ON F.estado = E.id_estado WHERE U.email LIKE '$email' AND id_factura = '$id_pedido'");
        $consulta->execute();
        $userOrders = $consulta->fetchAll();
        return $userOrders;
    }
}
