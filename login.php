<?php 
    require 'includes/app.php';
     //al momento de entrar en ejecucion la variable se vuelve true, o sea cada que se abra el index.php
    //include "includes/templates/header.php"
    incluirTemplate('header');

    $db = conectarDB();

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $email = mysqli_real_escape_string($db,filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
        $contraseña = mysqli_real_escape_string($db, $_POST['contraseña']);

        if(!$email){
            $errores[] = "El email es obligatorio o no es válido"; 
        }
        if(!$contraseña){
            $errores[] = "El password es obligatorio o no es válido"; 
        }

        if(empty($errores)){
            $query = "SELECT * FROM usuarios where email = '$email'";
            $resultado = mysqli_query($db,$query);
            //var_dump($resultado);

            if($resultado->num_rows){
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado); //resultado de la consulta
                $auth = password_verify($contraseña,$usuario['password']); //retorna true o false

                if($auth){
                    //el usuario esta autenticado
                    session_start();
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;
                    header('Location: /bienesraices/admin/index.php');
                }else{
                    $errores[] = "El password es incorrecto";
                }
                
            }else{
                $errores[] = "El usuario no existe";
            }
            //var_dump($query);
        }
    }
?>


    <main class="contenedor seccion centrar-login">
        <h1>Inicio de sesión</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data" novalidate>
            <fieldset>
                <legend>Credenciales</legend>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" placeholder="Ingresa tu correo">

                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña">
            </fieldset>

            <div class="centrar-boton">
                <input type="submit" value="Ingresar" class="boton boton-verde">
                <!-- <a href="/inventario_ayuntamiento/registros.php" class="boton-rojo">Ingresar</a> -->
            </div>

            <div class="espacio">

            </div>
            
        </form>


    </main>

    <?php 
        incluirTemplate('footer'); 
    ?>