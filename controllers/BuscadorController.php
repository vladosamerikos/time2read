<?php
require "models/libro.php";
require "models/categoria.php";
require "models/pedidos.php";
require "models/usuario.php";

class BuscadorController
{

    public function buscarCategoria()
    {
        require_once "views/adminPanel/menu.php";
        $filtro = $_POST['search'];
        $buscador = new Categoria();
        $catalogo = $buscador->buscarCategorias($filtro);
        require_once "views/adminPanel/tablaCategorias.php";
    }

    public function buscarLibro()
    {
        require_once "views/adminPanel/menu.php";
        $filtro = $_POST['search'];
        $buscador = new Libro();
        $catalogo = $buscador->buscarLibros($filtro);
        require_once "views/adminPanel/tablaLibros.php";
    }

    public function buscarPedido()
    {
        require_once "views/adminPanel/menu.php";
        $filtro = $_POST['search'];
        $buscador = new Pedido();
        $catalogo = $buscador->buscarPedidos($filtro);
        $estados = $buscador->obtenerEstados();
        require_once "views/adminPanel/tablaPedidos.php";
    }

    public function buscadorGeneral()
    {
        $categoria = new Categoria();
        $resultado = $categoria->obtenerListado();
        require_once "views/general/mostrarListaCategorias.php";
        
        $filtro = $_POST['filtro'];
        $contenido = $_POST['search'];
        $buscador = new Libro();
        $resultado = $buscador->obtenerBusquedaGeneral($filtro,$contenido);
        require_once "views/principal/librosBuscador.php";
        require_once "views/principal/preFooter.html";
    }
    
    public function buscadorFactura()
    {
        require_once "views/general/menuPerfil.php";
        $pedido = new Usuario();
        $id_pedido = $_POST['id_pedido'];
        $email = $_SESSION['email'];
        $userOrders = $pedido->obtenerBusquedaPedidoUsuario($id_pedido,$email);
        require_once "views/perfilUsuario/userOrders.php";
    }
    
}