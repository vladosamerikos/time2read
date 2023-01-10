<?php
echo "
<div class='admin-panel-content-container'>
<div class='admin-panel-title-container'>
    <h1 class='admin-panel-title'>Libros</h1>
    <a class='admin-panel-add-link' href='index.php?controller=Libro&action=mostrarAnadirLibro'>Añadir libro</a><br>
    <div class='orange-line'></div>
</div>";

require_once "views/adminPanel/buscadorLibros.php";

echo    "<table class='admin-panel-page-table'>
    <tr>
        <th>Id</th>
        <th>Genero</th>
        <th>ISBN</th>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th>Stock</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Estado</th>
        <th>Editar</th>
    </tr>";
foreach ($catalogo as $libro) {
    echo " <tr>
        <td class='text'>" . $libro['id_articulo'] . "</td>
        <td class='text'>" . $libro['genero'] . "</td>
        <td class='text'>" . $libro['isbn'] . "</td>
        <td class='text'>" . $libro['nombre'] . "</td>
        <td class='text'>" . $libro['descripcion_short'] . "</td>
        <td class='text'>" . $libro['stock'] . "</td>
        <td class='text'>" . formatarPrecio($libro['precio_venta']) . "€</td>
        <td><img class='libroicon' src='" . $libro['imagen'] . "'></td>";
    if ($libro['estado']) {
        echo "<td><a href='index.php?controller=Libro&action=desactivarLibro&id=" . $libro['id_articulo'] . "''><img class='control-icons' src='img/on.svg'></a></td>";
    } else {
        echo "<td><a href='index.php?controller=Libro&action=activarLibro&id=" . $libro['id_articulo'] . "'><img class='control-icons' src='img/off.svg'></a></td>";
    }
    echo "
        <td><a href='index.php?controller=Libro&action=mostrarEditarLibro&id=" . $libro['id_articulo'] . "''><img class='control-icons' src='img/edit.svg'></a></td>
        </tr>";
}
echo "</table>
</div>";