<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

    require '../../includes/app.php';
 
    estaAutenticado();

    $id = $_GET['id'];
    //$id = filter_var($id, FILTER_VALIDATE_INT);

    // Validamos que el ID por URL sea cualquier positivo entero
    if(!is_numeric($id)){               
        header('Location: /bienesraices/admin/index.php');
    }
    // Validamos que el ID por URL no sea una letra o un string y validamos que sea un entero
    elseif(!is_string($id)){           
        $id = filter_var($id, FILTER_VALIDATE_INT);
    }

     //Consultar para obtener los datos de la propiedad
     $propiedad = Propiedad::find($id);
     $vendedores = Vendedor::all();

    if(!$propiedad){
        header('Location: /bienesraices/admin/index.php');
    }

    //Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    //Ejecuta el codigo despues de que el usuario envia el formulario (da clic en el boton)
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Asignar los atributos
        $args = $_POST['propiedad'];
       
        //Sincronizar los cambios con el objeto en memoria
        $propiedad->sincronizar($args);

        //Validacion
        $errores = $propiedad->validar();

        //Subida de archivos
        $nombreImagen = md5( uniqid( rand(), true)) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }
        
        //revisar que el arreglo de errores esté vacío
        if(empty($errores)){
            if($_FILES['propiedad']['tmp_name']['imagen']){
            //Guardar la imagen en BD
                if ($_FILES['propiedad']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
            }
            $propiedad->guardar();

        }
        
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1 class="tituloMargin">Actualizar</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde marginArriba">Volver</a>

        <!-- Mensaje de error validacion. for each se ejecuta al menos una vez por cada elemento en el arreglo, si no hay nada, no se ejecuta -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>    

        <!--Para enviar informacion sensible su utiliza POST, para obtener datos de un servidor se utiliza GET
        si no se le pone action el post se envia al mismo archivo  -->
        <form class="formulario" method="POST" enctype="multipart/form-data">
           
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer'); 
?>