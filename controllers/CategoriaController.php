<?php
require "models/categoria.php";

class CategoriaController
{

    public function mostrarCategorias()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            $categoria = new Categoria();
            $catalogo = $categoria->obtenerListado();
            require_once "views/adminPanel/tablaCategorias.php";
        }
        else{
            adminIncorrecte();
        }
    }

    public function mostrarAnadirCategoria()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            require_once "views/adminPanel/anadirCategoria.php";
        }
        else{
            adminIncorrecte();
        }
    }

    public function anadirCategoria()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            $categoria = new Categoria();
            $nombre = $_POST['nombre'];
            $categoria->anadir($nombre);
        }
        else{
            adminIncorrecte();
        }
    }

    public function activarCategoria()
    {
        $_idcategoria = $_GET['id'];
        $categoria = new Categoria();
        $categoria->activar($_idcategoria);
        header("Location: index.php?controller=Categoria&action=mostrarCategorias");
    }

    public function desactivarCategoria()
    {
        $_idcategoria = $_GET['id'];
        $categoria = new Categoria();
        $categoria->desactivar($_idcategoria);
        header("Location: index.php?controller=Categoria&action=mostrarCategorias");
    }

    public function mostrarEditarCategoria()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            $_idcategoria = $_GET['id'];
            $categoria = new Categoria();
            $datosCategoria = $categoria->obtenerInfo($_idcategoria);
            require_once "views/adminPanel/menu.php";
            require_once "views/adminPanel/editarCategoria.php";
        }
        else{
            adminIncorrecte();
        }
    }

    public function editarCategoria()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            $categoria = new Categoria();
            $_id_genero = $_POST['id_genero'];
            $_nombre = $_POST['nombre'];
            $_estado = $_POST['estado'];
            $categoria->editar($_id_genero, $_nombre);
            header("Location: index.php?controller=Categoria&action=mostrarCategorias");
        }
        else{
            adminIncorrecte();
        }
    }
    
}