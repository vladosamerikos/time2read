<?php
    echo "<h2 class='my-profile-title'>Mi perfil</h2>";
    echo "<div class='orange-line-profile'></div>";
    echo "<div class='div1-user'>
        <div class='subdiv1-user'>
            <div><img src='img/person.svg' width='20px' height='20px' class='image-profile-dades'><h3>Nombre: &nbsp</h3>" .$datosUser[0]['nombre']."</div>
            <br>
            <div><img src='img/person.svg' width='20px' height='20px' class='image-profile-dades'><h3>Apellidos: &nbsp</h3>".$datosUser[0]['apellidos']."</div>
            <br>
            <div><img src='img/home.svg' width='20px' height='20px' class='image-profile-dades'><h3>Dirección: &nbsp</h3>".$datosUser[0]['direccion']."</div>
            <br>
            <div><img src='img/email.svg' width='20px' height='20px' class='image-profile-dades'><h3>Correo: &nbsp</h3>".$datosUser[0]['email']."</div>
            <br>
        </div>
        <form  class='subdiv2-user' method='post' ENCTYPE='multipart/form-data' action='index.php?controller=Perfil&action=cambiarFoto'>
            <div class='user-profile-row'><img src=' ".$datosUser[0]['foto']."' height='200px' width='170px'></div>
            <div class='user-profile-row'><input type='text' class='ocult' id='oldimagen' name='oldimagen' value='".$datosUser[0]['foto']."'></div>
            <div class='user-profile-row'><input required type='file' class='foto-input' id='imagen' name='imagen'></div>
            <div class='user-profile-row'><button class='profile-save-button' type='submit'><img class='save-icon' src='./img/save.svg' /></button></div>

        </form>
    </div>"; 
?>