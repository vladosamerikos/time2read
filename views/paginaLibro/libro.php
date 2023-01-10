<?php 
echo "
    <div class='content-libro-container'>
        <div class='libro-image-container'>
            <img class='libro-image' src='".$datosLibro[0]['imagen']."'>
        </div>
        <div class='libro-text-container'>
            <h2 class='libro-text-title'>".$datosLibro[0]['nombre']."</h2>
            <p class='libro-text-categoria'>".$datosLibro[0]['genero']."</p>
            <p class='libro-text-isbn'>ISBN ".$datosLibro[0]['isbn']."</p>
            <p class='libro-text-stock'>Stock: ".$datosLibro[0]['stock']."</p>
            <p class='libro-text-descrip-corta'>".$datosLibro[0]['descripcion_short']."</p>
            <p class='libro-text-descrip'>".$datosLibro[0]['descripcion']."</p>";
        if(strlen($datosLibro[0]['descripcion'])>414){
            echo"<p id='mostrar-mas' onclick='mostrarOcultarDescrip()'>Mostrar más</p>";
        }    
        echo "</div>
        <div class='libro-actions-container'>
            <p class='libro-price'>".formatarPrecio($datosLibro[0]['precio_venta'])." €</p>
            <form class='add-carito-form' method='POST' action='index.php?controller=Cesta&action=agregarLibroACesta'> 
                <input class='ocult' value='".$datosLibro[0]['id_articulo']."' id='id_lib' name='id_lib' readonly>
                <input class='num-libro-input' id='cant' name='cant' value='1' type='number' min='1' max='".$datosLibro[0]['stock']."'>
                <button class='add-to-carito-button'>Añadir a la cesta</button>
            </form>
        </div>
    </div>
";