<?php

function calcularCesta(){
    $res = 0;
    foreach($_SESSION['Cesta'] as $articulo=>$valor){
        if (is_numeric($articulo)){
            $res += $valor['cant'];
        }
    }
    return $res;
}

function transformarFecha($fecha){
    $objFecha = date_create_from_format('Y-m-d', $fecha);
    $formatFecha = date_format($objFecha, 'd/m/Y');
    return $formatFecha;
}

function formatarPrecio($precio){
    $precioArr = explode('.', (string)$precio);
    if(!isset($precioArr[1])){
        return str_replace(".",",",(string)$precio);
    }else{
        if (strlen($precioArr[1])==1){
            $precioArr[1]= $precioArr[1]."0";
        }
        $precioFormat=$precioArr[0].",".$precioArr[1];
        return $precioFormat;
    }
   
}

function adminIncorrecte(){
    header("Location: index.php?controller=Login&action=mostrarLoginAdmin");
}

function usuariIncorrecte(){
    header("Location: index.php?controller=Login&action=mostrarLoginUser");
}