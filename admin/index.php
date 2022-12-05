<?php 

    require '../includes/app.php';

    
    estaAutenticado();
    
    //Importar las clases
    use App\Propiedad;
    use App\Vendedor;

    //Obtener propiedades
    $propiedades =  Propiedad::all();
    $vendedores = Vendedor::all();

    //muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null; //busca el valor, si no existe le asigna null

    //verifica si existen las variables, ya que sin el request method no existe el post por lo que marcaria un undefined
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       
        $id = $_POST['id'];
        $id = filter_var($id,FILTER_VALIDATE_INT);

        if($id){

            $tipo = $_POST['tipo'];
            
            if(validarTipoContenido($tipo)){
                //Compara que se va a eliminar
                if($tipo === 'vendedor' ){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }else if($tipo === 'propiedad'){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }else{

                }
            } 
        
        }
    }

    //Incluye un template
   
     //al momento de entrar en ejecucion la variable se vuelve true, o sea cada que se abra el index.php
    //include "includes/templates/header.php"
    incluirTemplate('header');
?>

<script type="text/javascript">
    function ventanaEmergente(){
    var respuesta = confirm("Estas seguro que deseas eliminar el registro?");

    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}
</script>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php
            $mensaje = mostrarNotificacion(intval($resultado));
            if($mensaje){ ?>
                <p class="alerta exito"> <?php echo s($mensaje) ?> </p>
        <?php } ?>
        
            
        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
        <a href="/bienesraices/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo vendedor</a>

        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr> 
            </thead>

            <tbody> <!-- Mostrar los resultados --> 
            <?php foreach($propiedades as $propiedad): ?>
                <tr>
                    <td data-titulo="ID"> <?php echo $propiedad->id; ?> </td>
                    <td data-titulo="Titulo"> <?php echo $propiedad->titulo; ?> </td>
                    <td  data-titulo="Imagen"> <img src="/bienesraices/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="imagen propiedad"> </td>
                    <td data-titulo="Precio">$ <?php echo $propiedad->precio; ?> </td>
                    <td >
                        <div class="tabla-botones">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton-rojo-block w-100" value="Eliminar" onclick="return ventanaEmergente()">
                            </form>

                            <a href="/bienesraices/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        </div>
                        
                    </td>
                </tr> 
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr> 
            </thead>

            <tbody> <!-- Mostrar los resultados --> 
            <?php foreach($vendedores as $vendedor): ?>
                <tr>
                    <td data-titulo="ID"> <?php echo $vendedor->id; ?> </td>
                    <td data-titulo="Titulo"> <?php echo $vendedor->nombre . " " . $vendedor->apellido; ?> </td>
                
                    <td data-titulo="Precio"><?php echo $vendedor->telefono; ?> </td>
                    <td >
                        <div class="tabla-botones">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" class="boton-rojo-block w-100" value="Eliminar" onclick="return ventanaEmergente()">
                            </form>

                            <a href="/bienesraices/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        </div>
                        
                    </td>
                </tr> 
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php 
    incluirTemplate('footer'); 
?>