<?php
echo"

<div class='progress-container'>
        <div style='width: 33.3333%;' class='progress' id='progress'> </div>
        <div class='circle active'><a href='index.php?controller=Cesta&action=mostrarCesta'>Cesta</a></div>
        <div class='circle active'>Dirección de envío</div>
        <div class='circle'>Métodos de pago</div>
        <div class='circle'>Resumen</div>
</div>


<div class='direccion-page-container'>
    <div class='direccion-page-content'>
        <div class='current-direction'>
            
            <div class='direction-text-content'><img class='payment-icon' src='./img/house.svg'>
                ".$direccion[0]['direccion']."
            </div>
            <a class='cesta-item-action-container-item cesta-item-action' href='index.php?controller=Cesta&action=mostrarEditarDireccion'>Editar</a>
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
            <a href='index.php?controller=Cesta&action=selecionarMetodoDePago' class='total-container-submit-button'>Guardar y continuar</a>
        </div>

    </div>

    
</div>";