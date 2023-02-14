<?php
echo "
<div class='admin-panel-content-container'>
<div class='admin-panel-title-container'>
    <h1 class='admin-panel-title'>Pedidos</h1>
    <div class='orange-line'></div>
</div>";

require_once "views/adminPanel/buscadorPedidos.php";

echo "<table class='admin-panel-page-table'>
    <tr>
        <th>Id Factura</th>
        <th>Usuario</th>
        <th>Fecha</th>
        <th>Total (€)</th>
        <th>Estado</th>
        <th>Detalles del pedido</th>
    </tr>";
foreach ($catalogo as $pedido) {
    echo " <tr>
        <td class='text'>" . $pedido['id_factura'] . "</td>
        <td class='text'>" . $pedido['nombreusu'] . "</td>
        <td class='text'>" . transformarFecha($pedido['fecha']) . "</td>
        <td class='text'>" . $pedido['total'] . "</td>
        <td><form class='admin-panel-pedido-editar-estado-form' method='post' action='index.php?controller=Pedido&action=editarEstado'>
            <input readonly class='ocult' name='id_factura' id='id_factura' value='".$pedido['id_factura']."'>
            <select name='estado' id='estado'>";
                    foreach ($estados as $estado){
                        if($pedido['id_estado']==$estado['id_estado']){
                            echo "<option selected value='".$estado['id_estado']."'>".$estado['estado']."</option>";
                        }else {
                            echo "<option value='".$estado['id_estado']."'>".$estado['estado']."</option>";
                        }
                    }
    echo    "</select>
            <input class='admin-panel-pedido-submit-button' type='image' name='submit' src='./img/upload2.svg' alt='Confirmar'>
        </form></td>
        <td class='admin-panel-page-table-td-link'><a class='details-comanda-link' href='index.php?controller=Pedido&action=mostrarFacturas&id=". $pedido['id_factura'] . "&email=".$pedido['userEmail']."'>Mostrar detalle</a></td>
        </tr>";
}
echo "</table>
</div>";