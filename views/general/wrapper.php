<?php
echo "<wrapper>
    <div class='div-footer-2'>
        <p> © 2022 Time2Read</p>
        <a class='footer-link' href='#'>| Política de privacidad</a>
        <a class='footer-link' href='#'>| Política de cookies</a>";

        if (!(isset($_SESSION['role'])))
        {
            echo "<a class='footer-link' href='index.php?controller=Login&action=mostrarLoginAdmin'>| Panel Administrador</a>";
        }
        
    echo "</div>
</wrapper>";
?>