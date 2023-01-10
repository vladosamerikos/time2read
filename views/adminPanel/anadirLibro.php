<?php
echo "<form class='admin-panel-form' method='post' ENCTYPE='multipart/form-data' action='index.php?controller=Libro&action=anadirLibro'>
    <label for='idgenero'>Genero: </label>
    <select required name='idgenero' id='idgenero'>";
foreach ($listadoCategorias as $categorias) {
    echo "<option value=" . $categorias['id_genero'] . ">" . $categorias['nombre'] . "</option>";
}
echo "</select><br><br>
    <input type='number' id='isbn' class='place-holder' name='isbn' placeholder='ISBN' required><br><br>
    <textarea id='nombre' class='tetx-area-panel-form-name' name='nombre' placeholder='Nombre' required></textarea><br><br>
    <textarea id='descripcion_short' class='tetx-area-panel-form' rows'3' cols='40' name='descripcion_short' placeholder='Descripción Corta' required></textarea><br><br>
    <textarea id='descripcion' class='tetx-area-panel-form' rows'5' cols='40' name='descripcion' placeholder='Descripción' required></textarea><br><br>
    <input type='number' maxlength='10' id='stock' class='place-holder' name='stock' placeholder='Stock' required><br><br>
    <input type='number' maxlength='5' id='precio_venta' step='0.01' class='place-holder' name='precio_venta' placeholder='Precio' required><br><br>
    <input type='file' id='imagen' name='imagen' required><br><br>
    <input name='submit' type='submit' class='submit-button' id='submit' value='Añadir libro'><br>
</form>";