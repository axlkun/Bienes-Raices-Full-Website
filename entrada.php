<?php 
    require 'includes/funciones.php';
     //al momento de entrar en ejecucion la variable se vuelve true, o sea cada que se abra el index.php
    //include "includes/templates/header.php"
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacad2a.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>

        <p class="informacion-meta">Escrito el <span>20/10/2022</span> por: <span>Admin</span></p>
        
        <div class="resumen-propiedad">
            
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.
            </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.
            </p>
        </div>

    </main>

    <?php 
        incluirTemplate('footer'); 
    ?>