<?php
echo "
<div class='progress-container'>
        <div style='width: 66.6667%;' class='progress' id='progress'> </div>
        <div class='circle active'><a href='index.php?controller=Cesta&action=mostrarCesta'>Cesta</a></div>
        <div class='circle active'><a href='index.php?controller=Cesta&action=selecionarDireccion'>Dirección de envío</a></div>
        <div class='circle active'>Métodos de pago</div>
        <div class='circle'>Resumen</div>
</div>


<form class='pago-page-container' method='POST'>
    <div class='pago-content-container'>
        <div class='pago-options'>
            <div class='pago-option'><input type='radio' id='bankTransfer' name='metodoDePago' value='bankTransfer' checked><label class='pago-option-label' for='bankTransfer'><img class='payment-icon' src='./img/bank-transfer.svg'>Transferencia bancaria</label></div>
            <div class='pago-option'><input type='radio' id='card' name='metodoDePago' value='card' checked><label class='pago-option-label' for='card'><img class='payment-icon' src='./img/credit-card.svg'>Tarjeta de crédito</label></div>
            <div class='pago-option'><input type='radio' id='cash' name='metodoDePago' value='cash' checked><label class='pago-option-label' for='cash'><img class='payment-icon' src='./img/cash.svg'>Efectivo</label></div>
        </div>

        <div class='cesta-total-container'>
            <div class='cesta-total-row'>
                <div class='total-container-title'>Resumen</div>
                <div class='container-title-low-text'>Los cupones se pueden añadir durante el proceso de pago</div>
                <div class='cesta-total-line'></div>
            </div>
            <div class='cesta-total-row'>
                <div class='subtotal-container-title'><div class='left'>Subtotal</div><div class='rigth'>". formatarPrecio($_SESSION['Cesta']['subTotal']) ."€</div></div>
                <div class='subtotal-container-title'><div class='left'>Gastos de envío</div><div class='rigth'>";
                $_SESSION['Cesta']['Total']= $_SESSION['Cesta']['subTotal']+$_SESSION['Cesta']['Envio'];
                    if( $_SESSION['Cesta']['Envio']>0){
                        echo $_SESSION['Cesta']['Envio']."€";
                    }else{
                        echo "Gratis";
                    }

                echo"</div></div>
                <div class='cesta-total-line'></div>
            </div>
            <div class='cesta-total-row'>
                <div class='total-container-title'><div class='left'>Total</div><div class='rigth'>". formatarPrecio($_SESSION['Cesta']['Total']) ."€</div></div>
                <div class='container-title-low-text'><div class='left'>IVA incluido</div><div class='rigth'></div></div>
            </div>
            <a href='index.php?controller=Cesta&action=tramitarPedido' class='total-container-submit-button'>Tramitar pedido</a>
        </div>

    </div>

    
</form>";
