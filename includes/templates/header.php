<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="icon" href="/bienesraices/build/img/iconopestana.png">
    <link rel="stylesheet" href="/bienesraices/build/css/app.css"> <!-- la primera / indica la raiz del proyecto, entonces busca ahi una carpeta llamada build -->
</head>
<body>  
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>"> <!-- con un if (operador ternario) evalua si la variable inicio es true para agregar la clase inicio al header y sino no agregarla ----- isset es una funcion que permite revisar si una variable esta definida-->
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices/index.php">
                    <img src="/bienesraices/build/img/logo.svg" alt="Logotipo de Bienes raices">
                </a>
                
                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/bienesraices/build/img/dark-mode.svg" alt="boton dark mode">
                    <nav class="navegacion">
                        <a href="/bienesraices/nosotros.php">Nosotros</a>
                        <a href="/bienesraices/anuncios.php">Anuncios</a>
                        <a href="/bienesraices/blog.php">Blog</a>
                        <a href="/bienesraices/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/bienesraices/logout.php">Cerrar sesión</a>
                        <?php endif ?>
                    </nav>
                </div>

            </div> <!--barra-->

            <!--titulo de la pagina que solo aparece en la pagina inicio-->
            <?php if($inicio): ?>
                <h1>Venta de Casas y Departamentos de lujo</h1>
            <?php endif;?>

        </div>
    </header>