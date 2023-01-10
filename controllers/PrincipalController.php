<?php
require "models/libro.php";
require "models/categoria.php";

class PrincipalController
{

    public function mostrarPaginaPrincipal()
    {
        $categoria = new Categoria();
        $resultado = $categoria->obtenerListado();
        require_once "views/general/mostrarListaCategorias.php";
        $libro = new Libro();
        $resultado = $libro->libroDestacado();
        require_once "views/principal/librosImportantes.php";
        require_once "views/principal/preFooter.html";
    }

    public function mostrarLibrosCategoria()
    {
        $categoria = new Categoria();
        $resultado = $categoria->obtenerListado();
        require_once "views/general/mostrarListaCategorias.php";
        $_idcategoria = $_GET['id'];
        $categoria2 = new Categoria();
        $datosCategoria = $categoria2->obtenerInfo($_idcategoria);
        $librosCategoria = new Libro();
        $resultado = $librosCategoria->librosCategoria($_idcategoria);
        require_once "views/principal/librosCategoria.php";
        require_once "views/principal/preFooter.html";
    }

    public function mostrarGeneral()
    {
        $categoria = new Categoria();
        $resultado = $categoria->obtenerListado();
        require_once "views/general/mostrarListaCategorias.php";
        $libros = new Libro();
        $resultado = $libros->librosGeneral();
        require_once "views/principal/librosCategoria.php";
        require_once "views/principal/preFooter.html";
    }
    
}