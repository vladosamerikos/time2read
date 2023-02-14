<?php
echo "
<div class='admin-panel-content-container'>
<div class='admin-panel-title-container'>
    <h1 class='admin-panel-title'>Pedidos</h1>
    <div class='orange-line'></div>
</div>";
echo "
    <div>
        <p><b>Nombre:</b> &nbsp&nbsp&nbsp&nbsp&nbsp".$datosUser[0]['nombre']."</p>
        <p><b>Apellidos:</b> &nbsp&nbsp".$datosUser[0]['apellidos']." </p>
        <p><b>Direccion:</b> &nbsp&nbsp".$datosUser[0]['direccion']."</p>
    </div>


";

echo "<table class='admin-panel-page-table'>
    <tr>
        <th>ID Articulo</th>
        <th>ISBN</th>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio Unitario (€)</th>
        <th>Precio Total (€)</th>
    </tr>";
foreach ($catalogo as $pedido) {
    echo " <tr>
        <td class='text'>" . $pedido['fk_id_articulo'] . "</td>
        <td class='text'>" . $pedido['isbn'] . "</td>
        <td><img class='libroicon' src='" . $pedido['imagen'] . "'></td>
        <td class='text'>" . $pedido['nombre'] . "</td>
        <td class='text'>" . $pedido['cantidad'] . "</td>
        <td class='text'>" . formatarPrecio($pedido['precio_venta']) . "€</td>
        <td class='text'>" . formatarPrecio($pedido['precio']) . "€</td>

        </tr>";
}
echo "</table>
</div>";