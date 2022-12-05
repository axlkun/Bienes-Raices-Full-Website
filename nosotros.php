<?php 
    require 'includes/app.php';
     //al momento de entrar en ejecucion la variable se vuelve true, o sea cada que se abra el index.php
    //include "includes/templates/header.php"
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp"> 
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg"> 
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.
                    
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.
                </p>
            </div>
        </div>

    </main>

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rutrum, sapien nec feugiat rhoncus, elit tellus aliquet odio, ac facilisis mi felis sit amet orci. Nunc elementum eros nec blandit gravida.</p>
            </div>
        </div>
    </section>


    <?php 
        incluirTemplate('footer'); 
    ?>