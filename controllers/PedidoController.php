<?php
require "models/pedidos.php";
require "models/usuario.php";
class PedidoController
{
    public function mostrarPedidos()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            $pedido = new Pedido();
            $catalogo = $pedido->obtenerPedido();
            $estados = $pedido->obtenerEstados();
            require_once "views/adminPanel/tablaPedidos.php";
        }
        else{
            adminIncorrecte();
        }
    }

    public function editarEstado()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            $_id_estado = $_POST['estado'];
            $_id_factura = $_POST['id_factura'];
            $pedido = new Pedido();
            $pedido->modificarEstado($_id_factura, $_id_estado);
            $catalogo = $pedido->obtenerPedido();
            $estados = $pedido->obtenerEstados();
            require_once "views/adminPanel/menu.php";
            require_once "views/adminPanel/tablaPedidos.php";
        }
        else{
            adminIncorrecte();
        }
    }

    public function mostrarFacturas()
    {
        if(isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            $pedido = new Pedido();
            $user = new Usuario();
            $id_pedido = $_GET['id'];
            $email = $_GET['email'];

            $catalogo = $pedido->obtenerDetallePedido($id_pedido);
            $estados = $pedido->obtenerEstados();
            $datosUser = $user->getProfile($email);
            require_once "views/adminPanel/tablaFacturas.php";
        }
        else{
            adminIncorrecte();
        }
    }
}
