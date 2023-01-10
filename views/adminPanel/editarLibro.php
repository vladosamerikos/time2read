<?php
echo "<form class='admin-panel-form' method='post' ENCTYPE='multipart/form-data' action='index.php?controller=Libro&action=editarLibro'>
<input readonly class='ocult' type='number' id='id_articulo' name='id_articulo' value='" . $datosLibro[0]['id_articulo'] . "'>    
<label for='idgenero'>Genero:</label>
    <select required name='idgenero' id='idgenero' >";
foreach ($listadoCategorias as $categorias) {
    if( $categorias['id_genero'] == $datosLibro[0]['fk_id_genero']){
        echo "<option selected value=" . $categorias['id_genero'] . ">" . $categorias['nombre'] . "</option>";
    }else{
        echo "<option value=" . $categorias['id_genero'] . ">" . $categorias['nombre'] . "</option>";
    }
}
echo "</select><br><br>
    <input type='number' id='isbn' class='place-holder' placeholder='ISBN' name='isbn' value='" . $datosLibro[0]['isbn'] . "'><br><br>
    <textarea id='nombre' class='tetx-area-panel-form-name' name='nombre'>" . $datosLibro[0]['nombre'] . "</textarea><br><br>
    <textarea class='tetx-area-panel-form' rows'3' cols='40' id='descripcion_short' name='descripcion_short'>" . $datosLibro[0]['descripcion_short'] . "</textarea><br><br>
    <textarea class='tetx-area-panel-form' rows'5' cols='40' id='descripcion' name='descripcion'>" . $datosLibro[0]['descripcion'] . "</textarea><br><br>
    <input type='text' id='stock' class='place-holder' name='stock' value='" . $datosLibro[0]['stock'] . "'><br><br>
    <input type='number' id='precio_venta' step='0.01' class='place-holder' name='precio_venta' value='" . $datosLibro[0]['precio_venta'] . "'><br><br>
    <span id='edit-foto-btn' onclick='mostrarEditFoto()'>Editar foto</span><br><br>
    <div id='edit-container'>";
if ($datosLibro[0]['imagen'] != null) {
    echo "<img class='libroicon' src='" . $datosLibro[0]['imagen'] . "'>";
} else {
    echo "No tenia foto";
}
echo "<input readonly class='ocult' type='text' id='oldimagen' name='oldimagen' value='" . $datosLibro[0]['imagen'] . "'>
    <input type='file' id='imagen' name='imagen'><br><br>
    </div>
    <input name='submit' class='submit-button' type='submit' id='submit' value='Editar libro'><br>
</form>";