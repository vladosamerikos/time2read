<?php
echo "
<div class= 'form-container'>
    <div class = 'login-user-content'>
        <div class='login-user-form-foto-container'>
            <img class='login-user-form-foto' src='img/loginposter.png' alt='login image'>
            <a class='signin-user-link' href='index.php?controller=Login&action=mostrarSignupUser'>Crear una cuenta</a>
        </div>
        <form class='login-user-form' method='post' action='index.php?controller=Login&action=loginUser'>
            <h2 class='form-title'>Iniciar Sesión</h2>
            <div class='form-row'>
                <label for='email'><img class='form-icon' src='img/email.svg'></label>
                <input required class='login-form-input' type='email' id='email' name='email' placeholder='Tu correo'>
            </div>
            <div class='form-row'>
                <label for='password'><img class='form-icon' src='img/padlock.svg'> </label>
                <input required class='login-form-input' type='password' id='password' name='password' placeholder='Password'>
            </div>
            <div class='form-row'>
                <input type='checkbox' name='remember-me' id='remember-me' class='form-checkbox'>
                <label for='remember-me' class='form-label-checkbox mobile-label'>Recuérdame</label>
            </div>    
            <a class='signin-user-mobile-link' href='index.php?controller=Login&action=mostrarSignupUser'>Crear una cuenta</a>
            <input class='login-user-form-submit-button' name='submit' type='submit' id='submit' value='Iniciar Sesión'>
        </form>
    </div>
</div>
";