<?php
require_once("database.php");
class Pedido extends Database
{

    public function buscarPedidos($filtro)
    {
        $consulta = $this->db->prepare("SELECT id_factura, U.nombre AS nombreusu, fecha, total, F.estado AS id_estado FROM factura F INNER JOIN usuario U ON U.id_usuario = F.fk_id_usuario INNER JOIN estado_factura  E ON F.estado = E.id_estado WHERE U.nombre LIKE '%$filtro%'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerPedido()
    {
        $consulta = $this->db->prepare("SELECT id_factura, U.nombre AS nombreusu, fecha, total, F.estado AS id_estado, U.email AS userEmail FROM factura F INNER JOIN usuario U ON U.id_usuario = F.fk_id_usuario INNER JOIN estado_factura  E ON F.estado = E.id_estado");
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
    
    public function modificarEstado($id_pedido, $id_estado){
        $consulta = $this->db->prepare("UPDATE factura SET estado = '$id_estado' WHERE id_factura = $id_pedido") ;
        $count =$consulta->execute();
    }

    public function obtenerDetallePedido($idfactura){
        $consulta = $this->db->prepare("SELECT * FROM detalle_factura F INNER JOIN articulo A ON F.fk_id_articulo = A.id_articulo WHERE fk_id_factura = $idfactura");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

}
