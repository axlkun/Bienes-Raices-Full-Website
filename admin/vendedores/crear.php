<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    //Validar campos
    $errores = $vendedor->validar();

    if(empty($errores)){
        $vendedor->guardar();
    }

}

incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
        <h1 class="tituloMargin">Registrar vendedor(a)</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde marginArriba">Volver</a>

        <!-- Mensaje de error validacion. for each se ejecuta al menos una vez por cada elemento en el arreglo, si no hay nada, no se ejecuta -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>    

        <!--Para enviar informacion sensible su utiliza POST, para obtener datos de un servidor se utiliza GET  -->
        <form class="formulario" method="POST" action="/bienesraices/admin/vendedores/crear.php">
           
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar vendedor" class="boton boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer'); 
?>