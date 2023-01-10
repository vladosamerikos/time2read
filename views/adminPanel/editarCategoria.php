<?php
echo "
<form class='admin-panel-form' method='post' action='index.php?controller=Categoria&action=editarCategoria'>
    <input type='text' id='id_genero' name='id_genero' value='" . $datosCategoria[0]['id_genero'] . "' class='ocult' readonly>
    <input type='text' class='place-holder' placeholder='Nombre' id='nombre' name='nombre' value='" . $datosCategoria[0]['nombre'] . "'><br><br>
    <input type='text' id='estado' name='estado' value='" . $datosCategoria[0]['estado'] . "' class='ocult' readonly>
    <input name='submit' class='submit-button' type='submit' id='submit' value='Editar genero'><br>
</form>";