<?php 
    require '../../includes/app.php';

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    //funcion que verifica si al acceder a esta pagina se logueo, sino lo manda al index
    estaAutenticado();

    //Objeto vacío, lo que actuarán los place holders del constructor de la clase al momento de entrar a crear por primera vez
    $propiedad = new Propiedad;

    //Consulta para obtener los vendedores
    $vendedores = Vendedor::all();

    //Arreglo con mensaje de errores
    $errores = Propiedad::getErrores();

    //Ejecuta el codigo despues de que el usuario envia el formulario (da clic en el boton)
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //Instanciamos un objeto de la clase Propiedad en el cual almacenamos toda la informacion de Nueva Propiedad pasandole los atributos necesarios por post
        $propiedad = new Propiedad($_POST['propiedad']);

         //crear una carpeta
         $carpetaImagenes = '../../imagenes/';

         //si no esta creada la carpeta imagenes, crearla
         if(!is_dir($carpetaImagenes)){
             mkdir($carpetaImagenes); 
         }

         //generar nombre unico (este es el nombre d ela imagen)
         $nombreImagen = md5( uniqid( rand(), true)) . ".jpg"; //nombre unico y extension

         //en caso de que haya una imagen almacenada en la global files vamos a almacenarla en memoria 
        //Realiza un resize a la imagen con Intervention  (esta es la imagen)
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        }
        
        //Validar
        $errores = $propiedad->validar();
    
        //revisar que el arreglo de errores esté vacío
        if(empty($errores)){

            //Crear la carpeta para subir imagenes
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
        
            //Subida de archivos
            //Guarda la imagen en el servidor
            $image->save($carpetaImagenes . $nombreImagen);

            //Guarda en la base de datos
            $propiedad->guardar();

        }
        
    }

     //al momento de entrar en ejecucion la variable se vuelve true, o sea cada que se abra el index.php
    //include "includes/templates/header.php"
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1 class="tituloMargin">Registrar propiedad</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde marginArriba">Volver</a>

        <!-- Mensaje de error validacion. for each se ejecuta al menos una vez por cada elemento en el arreglo, si no hay nada, no se ejecuta -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>    

        <!--Para enviar informacion sensible su utiliza POST, para obtener datos de un servidor se utiliza GET 
        enctype sirve para poder subir imagenes-->
        <form class="formulario" method="POST" action="/bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">
           
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Registrar propiedad" class="boton boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer'); 
?>