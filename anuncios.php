<?php 
    require 'includes/app.php';
     //al momento de entrar en ejecucion la variable se vuelve true, o sea cada que se abra el index.php
    //include "includes/templates/header.php"
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h2>Casas y depas en venta</h2>

        <?php
            include 'includes/templates/anuncios.php'
        ?>

    </main>

<?php 
    incluirTemplate('footer'); 
?>