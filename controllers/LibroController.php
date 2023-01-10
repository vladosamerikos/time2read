<?php
require "models/libro.php";
require "models/categoria.php";

class LibroController
{

    public function mostrarLibros()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            $libro = new Libro();
            $catalogo = $libro->obtenerCatalogo();
            require_once "views/adminPanel/tablaLibros.php";
        }
        else{
            adminIncorrecte();
        }
    }

    public function mostrarAnadirLibro()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            $categoria = new Categoria();
            $listadoCategorias = $categoria->obtenerListadoActivos();
            require_once "views/adminPanel/menu.php";
            require_once "views/adminPanel/anadirLibro.php";
        }
        else{
            adminIncorrecte();
        }
    }

    public function anadirLibro()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            $libro = new Libro();
            $_idgenero = trim($_POST['idgenero']);
            $_isbn = trim($_POST['isbn']);
            $_nombre = $_POST['nombre'];
            $_descripcion_short = $_POST['descripcion_short'];
            $_descripcion = $_POST['descripcion'];
            $_stock = $_POST['stock'];
            $_precio_venta = $_POST['precio_venta'];

            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                $nombreDirectorio = "img/libros";
                $idUnico = $_isbn;
                $nomorig = $_FILES['imagen']['name'];
                $cont = explode(".", $nomorig);
                $ext = $cont[1];
                $nombreFichero = $idUnico . "." . $ext;
                move_uploaded_file(
                    $_FILES['imagen']['tmp_name'],
                    $nombreDirectorio . $nombreFichero
                );
            }
            $_imagen = $nombreDirectorio . $nombreFichero;
            $libro->anadir($_idgenero, $_isbn, $_nombre, $_descripcion_short, $_descripcion, $_stock, $_precio_venta, $_imagen);
        }
        else{
            adminIncorrecte();
        }
    }

    public function activarLibro()
    {
        $_idlibro = $_GET['id'];
        $libro = new Libro();
        $libro->activar($_idlibro);
        header("Location: index.php?controller=Libro&action=mostrarLibros");
    }

    public function desactivarLibro()
    {
        $_idlibro = $_GET['id'];
        $libro = new Libro();
        $libro->desactivar($_idlibro);
        header("Location: index.php?controller=Libro&action=mostrarLibros");
    }

    public function mostrarEditarLibro()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            $categoria = new Categoria();
            $listadoCategorias = $categoria->obtenerListadoActivos();
            $_idlibro = $_GET['id'];
            $libro = new Libro();
            $datosLibro = $libro->obtenerInfo($_idlibro);
            require_once "views/adminPanel/menu.php";
            require_once "views/adminPanel/editarLibro.php";
        }
        else{
            adminIncorrecte();
        }
    }

    public function editarLibro()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
            require_once "views/adminPanel/menu.php";
            $libro = new Libro();
            $_oldimagen = $_POST['oldimagen'];
            $_id_articulo = $_POST['id_articulo'];
            $_idgenero = trim($_POST['idgenero']);
            $_isbn = trim($_POST['isbn']);
            $_nombre = $_POST['nombre'];
            $_descripcion_short = $_POST['descripcion_short'];
            $_descripcion = $_POST['descripcion'];
            $_stock = $_POST['stock'];
            $_precio_venta = $_POST['precio_venta'];

            if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                // Eliminamos la imagen anterior
                if (unlink($_oldimagen)) {
                    // mensaje que confirma la eliminacion
                } else {
                    // mensaje que muestra error
                }

                $nombreDirectorio = "img/libros/";
                $idUnico = $_isbn;
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
            $libro->editar($_id_articulo, $_idgenero, $_isbn, $_nombre, $_descripcion_short, $_descripcion, $_stock, $_precio_venta, $_imagen);
            header("Location: index.php?controller=Libro&action=mostrarLibros");
        }
        else{
            adminIncorrecte();
        }
        
    }

    public function mostrarLibro()
    {
        $categoria = new Categoria();
        $resultado = $categoria->obtenerListado();
        require_once "views/general/mostrarListaCategorias.php";
        
        $_idlibro = $_GET['id'];
        $libro = new Libro();
        $datosLibro = $libro->obtenerInfo($_idlibro);
        require_once "views/paginaLibro/libro.php";
    }

}