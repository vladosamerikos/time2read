<?php

require "models/usuario.php";

class PerfilController{
    public function mostrarPerfil()
    {
        require_once "views/general/menuPerfil.php";
        $usuario = new Usuario();
        $datosUser = $usuario->getProfile($_SESSION['email']);
        require_once "views/perfilUsuario/userProfile.php";
    }
    
    public function mostrarPedidosUsuario()
    {
        require_once "views/general/menuPerfil.php";
        $usuario = new Usuario();
        $userOrders = $usuario->getOrders($_SESSION['email']);
        require_once "views/perfilUsuario/userOrders.php";
    }

    public function mostrarDetallePedidoUsuario()
    {
        require_once "views/general/menuPerfil.php";
        $pedido = new Usuario();
        $id_pedido = $_GET['id'];
        $userOrders = $pedido->obtenerDetallePedido($id_pedido);
        $estados = $pedido->obtenerEstados();
        require_once "views/perfilUsuario/userOrdersDetails.php";
    }

    public function cambiarFoto(){
        $usuario = new Usuario();

        $email = $_SESSION['email'];
        $_oldimagen = $_POST['oldimagen'];
        $random= rand(1,4000);
        $id = $_SESSION['nombre'].(string)$random;

        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
            // Eliminamos la imagen anterior
            if (unlink($_oldimagen)) {
                // mensaje que confirma la eliminacion
            } else {
                // mensaje que muestra error
            }

            $nombreDirectorio = "img/usuarios/";
            $idUnico = $id;
            $nomorig = $_FILES['imagen']['name'];
            $cont = explode(".", $nomorig);
            $ext = $cont[1];
            $nombreFichero = $idUnico . "." . $ext;
            move_uploaded_file(
                $_FILES['imagen']['tmp_name'],
                $nombreDirectorio . $nombreFichero
            );
            $_imagen = $nombreDirectorio . $nombreFichero;
        } else {
            $_imagen = $_oldimagen;
        }
        $usuario->editFoto($email, $_imagen);

        header('Location: index.php?controller=Perfil&action=mostrarPerfil');


    }


}

