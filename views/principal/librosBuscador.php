
<?php
    echo "<p class='name-categoria-libros-categoria'>Libros encontrados</p>";
    echo "<div class='orange-line'></div>";
?>

<div class="main-page-important-books">
    <?php
        foreach ($resultado as $libro) {
            echo " <div class='important-book'>
                <div><img class='important-book-image' src='" . $libro['imagen'] . "'></div>
                <div><h3>" . $libro['nombre'] . "</h3></div>
                <div class='important-book-short-description'>" . $libro['descripcion_short'] . "</div>
                <div class='important-book-price'>" .str_replace('.',',',(string)$libro['precio_venta']) . "€" . "</div>
                <div>" . "<a href='index.php?controller=Libro&action=mostrarLibro&id=" . $libro['id_articulo'] . "' class='important-reservation-book-button'>Ver detalles</a>" . "</div>
            </div>";
        }
    ?>
</div>