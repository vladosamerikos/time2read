<?php
require_once("database.php");
class Libro extends Database
{
    // private $id_articlo;
    // private $id_genero;
    // private $isbn;
    // private $nombre;
    // private $descripcion_short;
    // private $descripcion;
    // private $stock;
    // private $precio_venta;
    // private $imagen;
    // private $destacado;
    // private $estado;
    private $cantidad;

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function buscarLibros($filtro)
    {
        $consulta = $this->db->prepare("SELECT id_articulo, generos.nombre AS genero, isbn, articulo.nombre, descripcion_short, descripcion, stock, precio_venta, imagen, articulo.estado  FROM articulo INNER JOIN generos ON articulo.fk_id_genero = generos.id_genero WHERE articulo.nombre LIKE '%$filtro%' OR isbn LIKE '%$filtro%'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerCatalogo()
    {
        $consulta = $this->db->prepare("SELECT id_articulo, generos.nombre AS genero, isbn, articulo.nombre, descripcion_short, descripcion, stock, precio_venta, imagen, articulo.estado  FROM articulo INNER JOIN generos ON articulo.fk_id_genero = generos.id_genero");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function anadir(
        $idgenero,
        $isbn,
        $nombre,
        $descripcion_short,
        $descripcion,
        $stock,
        $precio_venta,
        $imagen
    ) 
    {
        $consulta = $this->db->prepare("INSERT INTO articulo (fk_id_genero, isbn, nombre, descripcion_short, descripcion, stock, precio_venta, imagen, estado) VALUES ($idgenero, $isbn, '$nombre', '$descripcion_short', '$descripcion', $stock, $precio_venta, '$imagen', 1)") ;
        $consulta->execute();
        $last_id = $this->db->lastInsertId();
        echo "Nuevo libro agregado correctamente";
        echo "ID del ultimo libro: " . $last_id;
    }

    public function editar(
        $id_articlo,
        $idgenero,
        $isbn,
        $nombre,
        $descripcion_short,
        $descripcion,
        $stock,
        $precio_venta,
        $imagen
    ) 
    {
        $consulta = $this->db->prepare("UPDATE articulo SET fk_id_genero= $idgenero, isbn = $isbn, nombre = '$nombre', descripcion_short= '$descripcion_short', descripcion = '$descripcion', stock = $stock, precio_venta = $precio_venta, imagen = '$imagen', estado=1 WHERE id_articulo = $id_articlo") ;
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function activar($id){
        $consulta = $this->db->prepare("UPDATE articulo SET estado = 1 WHERE id_articulo LIKE '$id'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    } 

    public function desactivar($id){
        $consulta = $this->db->prepare("UPDATE articulo SET estado = 0 WHERE id_articulo LIKE '$id'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    } 

    public function obtenerInfo($id){
        $consulta = $this->db->prepare("SELECT id_articulo, generos.nombre AS genero, isbn, articulo.nombre AS nombre, descripcion_short, descripcion, stock, precio_venta, imagen, fk_id_genero FROM articulo INNER JOIN generos ON articulo.fk_id_genero = generos.id_genero WHERE id_articulo = $id");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    
    public function libroDestacado()
    {
        $consulta = $this->db->prepare("SELECT * FROM articulo WHERE destacado = 1 and estado = 1");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function librosCategoria($id)
    {
        $consulta = $this->db->prepare("SELECT * FROM articulo WHERE fk_id_genero = $id and estado = 1");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    public function librosGeneral()
    {
        $consulta = $this->db->prepare("SELECT * FROM articulo and estado = 1");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerBusquedaGeneral($filtro,$contenido)
    {
        $consulta = $this->db->prepare("SELECT articulo.id_articulo, articulo.fk_id_genero, articulo.isbn, articulo.nombre, articulo.descripcion_short, articulo.descripcion, articulo.stock, articulo.precio_venta, articulo.imagen, articulo.destacado, articulo.estado FROM articulo INNER JOIN generos ON articulo.fk_id_genero = generos.id_genero WHERE $filtro LIKE '%$contenido%' and estado = 1");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


    
}
