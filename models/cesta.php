<?php
require_once("libro.php");
require_once("database.php");
class Cesta extends Database
{
    public function agregarACesta($id, $cant)
    {   
        if (isset($_SESSION['Cesta'])){
            if (isset($_SESSION['Cesta'][$id])){
                $_SESSION['Cesta'][$id]['cant']+=$cant;
            }else{
                $_SESSION['Cesta'][$id]['cant']=$cant;
            }
        }else{
            $_SESSION['Cesta'][$id]['cant']=$cant;
        }     

    }

    public function limpiarCesta(){
        unset($_SESSION['Cesta']);
    }


    public function obtenerDatosCesta(){
        if(isset($_SESSION['Cesta'])){
            $_SESSION['Cesta']['subTotal']=0;
            $_SESSION['Cesta']['Total']=0;
            $_SESSION['Cesta']['Envio']=0;
            foreach($_SESSION['Cesta'] as $id=>$data){
                if (is_numeric($id)){
                    $libro = new Libro();
                    $datos_libro = $libro->obtenerInfo($id);
                    $_SESSION['Cesta'][$id]['imagen'] = $datos_libro[0]['imagen'];
                    $_SESSION['Cesta'][$id]['titulo'] = $datos_libro[0]['nombre'];
                    $_SESSION['Cesta'][$id]['precio'] = $datos_libro[0]['precio_venta'];
                    $_SESSION['Cesta']['subTotal']+= $_SESSION['Cesta'][$id]['precio'] * $_SESSION['Cesta'][$id]['cant'];
                }
            }
            if ($_SESSION['Cesta']['subTotal']>50){
                $_SESSION['Cesta']['Envio']= 0;
                $_SESSION['Cesta']['Total']= $_SESSION['Cesta']['subTotal'];
            }else{
                $_SESSION['Cesta']['Envio']= 5;
                $_SESSION['Cesta']['Total']= $_SESSION['Cesta']['subTotal']+$_SESSION['Cesta']['Envio'];
            }
        }
    }

    public function eliminarLibro($id){
        unset($_SESSION['Cesta'][$id]);
    }

    public function anadirUnaCant($id){
        $_SESSION['Cesta'][$id]['cant']+=1;
    }

    public function eliminarUnaCant($id){
        if ($_SESSION['Cesta'][$id]['cant']>1){
            $_SESSION['Cesta'][$id]['cant']-=1;
        }
    }

    public function tramitarPedido($id_usu){
        $fechaActual = date('Y-m-d');
        $total = $_SESSION['Cesta']['Total'];
        // genera la factura
        $consulta = $this->db->prepare("INSERT INTO factura (fk_id_usuario, fecha, total, estado) VALUES ($id_usu, '$fechaActual', $total, 1)") ;
        $consulta->execute();
        $last_id = $this->db->lastInsertId();
        
        // genera el detalle de la factura y resta el stock
        foreach($_SESSION['Cesta'] as $articulo=>$valor){
            if (is_numeric($articulo)){
                $cantidad = $valor['cant'];
                $subtotal = $cantidad* $valor['precio'];
                $consulta = $this->db->prepare("INSERT INTO detalle_factura (fk_id_factura, fk_id_articulo, cantidad, precio) VALUES ($last_id, $articulo, $cantidad, $subtotal)") ;
                $consulta->execute();
                $lastdetalle_id = $this->db->lastInsertId();
                // Quitar el stock
                $consulta2 = $this->db->prepare("UPDATE articulo SET stock = stock - $cantidad WHERE id_articulo = $articulo");
                $consulta2->execute();
            }
        }
        // Limpia la cesta 
        unset($_SESSION['Cesta']);


    }

}