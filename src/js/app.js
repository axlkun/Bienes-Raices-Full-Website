document.addEventListener('DOMContentLoaded', function(){
    eventListeners();
    darkMode();

    // if(window.innerWidth <= 768){
    //     temporaryClass(document.querySelector('.navegacion'), 'visibilidadTemporal', 500);
    // }
 
    //Eliminar texto de confirmación de CRUD en admin/index.php
    // borraMensaje();
});

function darkMode(){

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)'); //sirve para leer las preferencias de la computadora del usuario tema dark o light
    console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){
        if(prefiereDarkMode.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click',navegacionResponsive);
}

function navegacionResponsive(){
    //console.log('desde navegacionResponsive');
    const navegacion = document.querySelector('.navegacion');

    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }else{
        navegacion.classList.add('mostrar');
    }

    //navegacion.classList.toggle('mostrar'); toggle hace exactamente lo mismo que el if de arriba
}

// document.addEventListener('DOMContentLoaded', function() {
//     eventListeners();
//     if(window.innerWidth <= 768){
//         temporaryClass(document.querySelector('.navegacion'), 'visibilidadTemporal', 500);
//     }
 
//     //Eliminar texto de confirmación de CRUD en admin/index.php
//     borraMensaje();
// });
 
function borraMensaje() {
    const mensajeConfirm = document.querySelector('.alerta');
    if(mensajeConfirm !== null){
        setTimeout(function() {
            const padre = mensajeConfirm.parentElement;
            padre.removeChild(mensajeConfirm);
            history.pushState(null, "", "/bienesraices/admin/index.php");
        }, 2500);
        console.log("Hay mensaje de error");
    }else {
        console.log("No hay mensaje de error");
    }
}

