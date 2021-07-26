<?php

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/public/imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false) {

    include TEMPLATES_URL . "/${nombre}.php";

}



function estaAutenticado() : bool {session_start();

    if($_SESSION['login']){

        return true;

    } 

        return false;

}



// function estaAutenticado(){

//     session_start();

//     if(!$_SESSION['login']){

//         header('Location: /bienesraices_inicio/login.php');

//     } 

// }

//Sanitiza el codigo que se imprime (HTML)

function s($html) : string {

 $s = htmlspecialchars($html);

 return $s;

}



//Validar tipo de contenido

function validarTiposContenido($tipo) {

    $tipos = ['propiedad', 'vendedor'];

    //Busca el tipo que se pasa por parametro dentro del arreglo tipos

    return in_array($tipo, $tipos);

}



//Muestra los mensajes

function mostrarNotificacion($codigo) {

    $mensaje = '';

    switch($codigo) {

        case 1:

            $mensaje = 'Creado correctamente';

        break;

        case 2:

            $mensaje = 'Actualizado correctamente';

        break;

        case 3:

            $mensaje = 'Eliminado correctamente';

        break;

        default:

            $mensaje = false;

        break;

        }

    return $mensaje;

}



//Actualizar propiedades validar Id o redireccionar



function validarORedireccionar(string $url) {

     //Id que viene en el get

     $id = $_GET['id'];

     //Validar el id

     $id = filter_var($id, FILTER_VALIDATE_INT);

     if(!$id) {

         header("Location: ${url}");

     }



     return $id;

}



