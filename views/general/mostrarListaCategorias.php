<?php
echo "<div class='main-page-list-category'>
  <div><a href='index.php?controller=Principal&action=mostrarGeneral'>Todos los libros</a></div>
  <div class='dropcategory'>
    <button class='dropbtn'>Categorias 
      <i class='fa-down'></i>
    </button>
    <div class='dropcategory-content'>";
        foreach ($resultado as $categoria) {
            if($categoria['id_genero'] == 0){
              echo "";
            }
            else{
              echo "<a href='index.php?controller=Principal&action=mostrarLibrosCategoria&id=" . $categoria['id_genero'] . "' class='list-category'>" . $categoria['nombre'] . "</a>";
            }
        }
    echo "</div>
  </div> 
</div>";
?>