<?php
echo "<h2 class='my-profile-title'>Mis pedidos</h2>";
echo "<div class='orange-line-profile'></div>";
echo "<div class='profile-orders-panel-content-container'>
    <div class='search_bar'>
        <img class='search_img' src='img/search.svg' alt='lupa de busqueda'>
        <form class='search_form' action='index.php?controller=Buscador&action=buscadorFactura' method='post'>
            <input type='text' name='id_pedido' id='id_pedido' placeholder='Introduce el ID del pedido a buscar'>
            <button type='submit'>Buscar</button>
        </form>
    </div>";
    echo "<div class='profile-orders-main-container'>";
        foreach ($userOrders as $order) {
            echo "<div class='profile-order-container'>
                <div class='profile-order-container-text'>
                    <p>Numero de factura: " . $order['id_factura'] . "</p>
                    <br>
                    <p>Fecha del pedido: " . transformarFecha($order['fecha']) . "</p>
                    <br>
                    <p>Total €:  " . $order['total'] . " €</p>
                    <br>
                    <p>Estado del pedido: " . $order['estado'] . "</p>
                </div>
                <p class='profile-orders-panel-page-table-td-link'><a class='details-comanda-link' href='index.php?controller=Perfil&action=mostrarDetallePedidoUsuario&id=". $order['id_factura'] . "'>Mostrar detalle</a></p>
            </div>";
        }
    echo "</div>
</div>";