<?php
echo "<h2 class='my-profile-title'>Detalles del pedido</h2>";
echo "<div class='orange-line-profile'></div>";
echo "<div class='profile-orders-panel-content-container'>
    <div class='profile-orders-main-container'>";
        foreach ($userOrders as $orderDetail) {
            echo "<div class='profile-order-details-container'>
                <p>ID Articulo: " . $orderDetail['fk_id_articulo'] . "</p>
                <p>ISBN: " . $orderDetail['isbn'] . " </p>
                <img src='" . $orderDetail['imagen'] . "'>
                <p class='title'>Titulo: " . $orderDetail['nombre'] . "</p>
                <p>Unidades: " . $orderDetail['cantidad'] . "</p>
                <p>Precio/uds: " . formatarPrecio($orderDetail['precio_venta']) . "€</p>
                <p>Total €: " . formatarPrecio($orderDetail['precio']) . "€</p>
            </div>";
        }
    echo "</div>
</div>";