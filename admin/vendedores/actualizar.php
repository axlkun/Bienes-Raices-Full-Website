<?php

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

//Validar ID
$id = $_GET['id'];
$id = filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('Location /bienesraices/admin/index.php');
}

//Obtener el arregle del vendedor
$vendedor = Vendedor::find($id);

$errores = Vendedor::getErrores();

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Asignar los valores
    $args = $_POST['vendedor'];

    //Sincronizar objeto en memoria con lo que el usuario escribió
    $vendedor->sincronizar($args);

    //Validar
    $errores = $vendedor->validar();

    if(empty($errores)){
        $vendedor->guardar();
    }
}

incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">
        <h1 class="tituloMargin">Actualizar vendedor(a)</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde marginArriba">Volver</a>

        <!-- Mensaje de error validacion. for each se ejecuta al menos una vez por cada elemento en el arreglo, si no hay nada, no se ejecuta -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>    

        <!--Para enviar informacion sensible su utiliza POST, para obtener datos de un servidor se utiliza GET  -->
        <form class="formulario" method="POST">
           
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Actualizar vendedor" class="boton boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer'); 
?>