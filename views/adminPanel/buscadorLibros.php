<?php

echo "<div class='search_bar'>
            <img class='search_img' src='img/search.svg' alt='lupa de busqueda'>
            <form class='search_form' action='index.php?controller=Buscador&action=buscarLibro' method='post'>
                <input type='text' name='search' id='search' placeholder='Introduce el ISBN o nombre del libro'>
                <button type='submit'>Buscar</button>
            </form>
        </div>";