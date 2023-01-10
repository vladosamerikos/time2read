<?php
echo "
<div class= 'form-container'>
    <div class = 'login-user-content'>
        <form class='login-user-form' method='post' action='index.php?controller=Login&action=signupUser'>
            <h2 class='form-title'>Crear Cuenta</h2>
            <div class='form-row'>
                <label for='nombre'><img class='form-icon' src='img/person.svg'></label>
                <input required class='login-form-input' type='text' id='nombre' name='nombre' placeholder='Nombre'>
            </div>
            <div class='form-row'>
                <label for='apellidos'><img class='form-icon' src='img/person.svg'></label>
                <input required class='login-form-input' type='text' id='aplellidos' name='apellidos' placeholder='Apellido'>
            </div>
            <div class='form-row'>
                <label for='email'><img class='form-icon' src='img/email.svg'></label>
                <input required class='login-form-input' type='email' id='email' name='email' placeholder='Correo'>
            </div>
            <div class='form-row'>
                <label for='direccion'><img class='form-icon' src='img/home.svg'></label>
                <input required class='login-form-input' type='text' id='direccion' name='direccion' placeholder='Direccion'>
            </div>
            <div class='form-row'>
                <label for='password'><img class='form-icon' src='img/padlock.svg'> </label>
                <input required class='login-form-input' oninput='comprobarPassword()' type='password' id='password' name='password' placeholder='Password'>
            </div>
            <div class='form-row' id='repite-password'>
                <label for='password2'><img class='form-icon' src='img/redo.svg'> </label>
                <input required class='login-form-input' oninput='comprobarPassword()' type='password' id='password2' name='password2' placeholder='Repite el password'>
                <span id='clave-dif-msg'>Las contraseñas no coinciden!</span>
            </div>
            <div class='form-row'>
                <input required type='checkbox' name='accept-condition' id='accept-condition' class='form-checkbox'>
                <label for='accept-condition' class='form-label-checkbox mobile-label'>Acepto los términos de servicio</label>
            </div>
            <a class='signin-user-mobile-link' href='index.php?controller=Login&action=mostrarLoginUser'>Tengo cuenta</a>
            <input class='login-user-form-submit-button' id='submit-button-login-form' name='submit' type='submit' id='submit' value='Crear cuenta'>
        </form>
        <div class='login-user-form-foto-container'>
            <img class='login-user-form-foto' src='img/signposter.png' alt='login image'>
            <a class='signin-user-link' href='index.php?controller=Login&action=mostrarLoginUser'>Ya tengo cuenta</a>
        </div>
    </div>
</div>
";