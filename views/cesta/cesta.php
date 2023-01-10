<?php   
if (isset($_SESSION['Cesta'])){
    echo "
    <div class='progress-container'>
        <div  class='progress' id='progress'> </div>
        <div class='circle active'>Cesta</div>
        <div class='circle'>Dirección de envío</div>
        <div class='circle'>Métodos de pago</div>
        <div class='circle'>Resumen</div>
    </div>
    
    <div class='cesta-page-container' >
        <div class='cesta-container'>
            <div class='cesta-subcontainer'>";
                foreach ($_SESSION['Cesta'] as $id=>$data){
                    if (is_numeric($id)){ 
        echo "<div class='cesta-item'>
                        
                        <div class='cesta-item-info-container'>
                            <a href='index.php?controller=Libro&action=mostrarLibro&id=".$id."' class='cesta-item-imagen'><img class='cesta-imagen' src='".$data['imagen']."' alt='imagen producto'></a>
                            <div class='cesta-item-info-text-container'>
                                <a href='index.php?controller=Libro&action=mostrarLibro&id=".$id."' class='cesta-item-titulo'>".$data['titulo']."</a>";
                                
                                if($data['cant']>1){
                                    echo "
                                    <p class='cesta-item-precio'>".formatarPrecio($data['precio']*$data['cant'])."€</p>
                                    <p class='cesta-item-precio-unitario'>Precio unitario ".formatarPrecio($data['precio'])."€</p>";
                                }else{
                                    echo"<p class='cesta-item-precio'>".formatarPrecio($data['precio'])."€</p>";
                                }
                    echo    "</div>
                        </div>
                        <div class='cesta-item-action-container'>
                                <a class='cesta-item-action-container-item cesta-item-action-container-item-basura' href='index.php?controller=Cesta&action=elimLibro&id=".$id."'><img class='cesta-item-action-img' src='./img/trash-bin.svg'></a>
                                <div class='cesta-item-action-container-items'>
                                    <a class='cesta-item-action-container-item cesta-item-action-container-item-dell'  href='index.php?controller=Cesta&action=eliminarUnaCant&id=".$id."'><img class='cesta-item-action-img' src='./img/remove.svg'></a>
                                    <a class='cesta-item-action-container-item cesta-item-action-container-item-num'>".$data['cant']."</a>
                                    <a class='cesta-item-action-container-item cesta-item-action-container-item-add' href='index.php?controller=Cesta&action=anadirUnaCant&id=".$id."'><img class='cesta-item-action-img' src='./img/add.svg'></a>
                                </div>
                        </div> 
                </div>";
                    }
                }
        echo   "<div class='cesta-actions-container'>
                        <a class='cesta-action' href='index.php?controller=Cesta&action=limpiarCesta'><img class='cesta-item-action-img' src='./img/trash-bin.svg'>&nbsp Vaciar cesta</a>
                        <a class='cesta-action' href='index.php?controller=Principal&action=mostrarPaginaPrincipal'>Seguir comprando</a>
                </div>
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
                <a href='index.php?controller=Cesta&action=selecionarDireccion' class='total-container-submit-button'>Realizar pedido</a>
            </div>


        </div>

    </div>";
}else{
    echo "<div class='cesta-custom-msg-container'>
        <img class='cesta-custom-msg-img' src='./img/empty-cart.svg'>
        <div class='cesta-custom-msg'>No hay productos en tu carrito </div>
        <a class='cesta-action' href='index.php?controller=Principal&action=mostrarPaginaPrincipal'>Seguir comprando</a>
    </div>";
}

