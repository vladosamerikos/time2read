<?php
echo "<div class='main-menu-bar'>
<a href='index.php?controller=Login&action=index'><img class='main-menu-bar-logo' src='./img/logo-high.svg' alt='logo' height='100px' width='100px'></a>
<ul class='main-menu-list'>";
    if (isset($_SESSION['email'])) {
        if (isset($_SESSION['email']) && $_SESSION['role']=='admin')
        {
            // Vista 1: Admin
            echo "<li class='main-menu-list-item'><a href='index.php?controller=Login&action=destroySesion'>Cerrar Sesión</a></li>";
        }
        if (isset($_SESSION['email']) && $_SESSION['role']=='user')
        {
            // Vista 2: User

            echo "
            <div class='search_bar_header'>
                    <form class='form_search_form_header' action='index.php?controller=Buscador&action=buscadorGeneral' method='post'>
                        <select name='filtro' class='option_search_bar'>
                            <option value='articulo.nombre' selected> Titulo </option>
                            <option value='articulo.isbn'> ISBN </option>
                            <option value='generos.nombre'> Genero </option>
                        </select>
                        <input type='text' class='input_search_bar_header' name='search' id='search'>
                        <button type='submit' class='button_search_bar_header'>Buscar</button>
                    </form>
                </div>";
            if(isset($_SESSION['Cesta'])){
                echo "<span style='color: white;'>".calcularCesta()."</span>";
            }
            echo "<a href='index.php?controller=Cesta&action=mostrarCesta'><img class='menu-header-basket-photo' src='./img/basket.svg' alt='basket' height='40px' width='40px'></a>";
            if ($_SESSION['foto']!=''){
                echo "<a class='foto-perfil' href='index.php?controller=Perfil&action=mostrarPerfil'><img class='menu-header-user-photo' src='".$_SESSION['foto']."' alt='user' height='50px' width='50px'>".$_SESSION['nombre']."</a>";
            }else{
                echo "<a class='foto-perfil' href='index.php?controller=Perfil&action=mostrarPerfil'><img class='menu-header-user-photo' src='./img/user.svg' alt='user' height='40px' width='40px'>".$_SESSION['nombre']."</a>";
            }
            echo "<li class='main-menu-list-item'><a href='index.php?controller=Login&action=destroySesion'>Cerrar Sesión</a></li>";
        }
    }
    else
    {
        // Vista 3: User no logueado
        echo "<div class='search_bar_header'>
                    <form class='form_search_form_header' action='index.php?controller=Buscador&action=buscadorGeneral' method='post'>
                        <select name='filtro' class='option_search_bar'>
                            <option value='articulo.nombre' selected> Título </option>
                            <option value='articulo.isbn'> ISBN </option>
                            <option value='generos.nombre'> Género </option>
                        </select>
                        <input type='text' class='input_search_bar_header' name='search' id='search'>
                        <button type='submit' class='button_search_bar_header'>Buscar</button>
                    </form>
                </div>";
        if(isset($_SESSION['Cesta'])){
            echo "<span style='color: white;'>".calcularCesta()."</span>";
        }
        echo "<a href='index.php?controller=Cesta&action=mostrarCesta'><img class='menu-header-basket-photo' src='./img/basket.svg' alt='basket' height='40px' width='40px'></a>";
        echo "<li class='main-menu-list-item'><a href='index.php?controller=Login&action=mostrarLoginUser'>Iniciar Sesión</a></li>";
    }
echo "</ul>
</div>";
