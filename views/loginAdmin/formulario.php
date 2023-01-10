<?php
echo "
<div class= 'form-container'>
    <div class = 'login-user-content'>
        <div class='login-user-form-foto-container'>
            <img class='login-user-form-foto' src='img/adminloginposter.png' alt='login image'>
        </div>
        <form class='login-user-form' method='post' action='index.php?controller=Login&action=loginAdmin'>
            <h2 class='form-title'>Administrador</h2>
            <div class='form-row'>
                <label for='email'><img class='form-icon' src='img/email.svg'></label>
                <input required class='login-form-input' type='email' id='email' name='email' placeholder='Tu correo'>
            </div>
            <div class='form-row'>
                <label for='password'><img class='form-icon' src='img/padlock.svg'> </label>
                <input required class='login-form-input' type='password' id='password' name='password' placeholder='Password'>
            </div>
            <input class='login-user-form-submit-button' name='submit' type='submit' id='submit' value='Iniciar session'>
        </form>
    </div>
</div>
";