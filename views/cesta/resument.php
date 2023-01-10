<?php
echo "
    <div class='progress-container'>
            <div style='width: 100%;' class='progress' id='progress'> </div>
            <div class='circle active'>Cesta</div>
            <div class='circle active'>Dirección de envío</div>
            <div class='circle active'>Métodos de pago</div>
            <div class='circle active'>Resumen</div>
    </div>
    <div class='cesta-page-container'>
        <div class='cesta-resumen-container'>
                <h3>Tu pedido ha sigo tramitado correctamente.</h3>    
                <img class='cesta-resumen-msg-img' src='./img/succes-cart.png'>
                <div class='cesta-resumen-actions-container'>
                    <a href='index.php?controller=Perfil&action=mostrarPedidosUsuario' class='cesta-action'>Ver mis pedidos</a>
                    <a href='index.php?controller=Principal&action=mostrarPaginaPrincipal' class='cesta-action'>Seguir comprando</a>
                </div>
        </div>
    </div>";
?>