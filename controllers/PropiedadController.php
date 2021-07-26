<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {
    
    //Este metodo es static para poder llamarlo sin tener que crear una nueva instancia de la clase PropiedadController
    public static function index(Router $router) {
        $propiedades = Propiedad::all();
        $vendedores = Vendedores::all();
        $mensaje = null;
        $router->render('/propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'mensaje' => $mensaje
        ]);
    }

    public static function crear(Router $router) {

    $propiedad = new Propiedad;
    $vendedores = Vendedores::all();

    // arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Crea una nueva instancia
        $propiedad = new Propiedad($_POST['propiedad']);

        //Crear carpeta. 
         if(is_dir(!CARPETA_IMAGENES)) {
             mkdir(CARPETA_IMAGENES);
         }

        //Generar un nombre único
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        //Setea la imagen
        //Realiza un resize a la imagen con intervention
        if($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImagen($nombreImagen);
        } 
        
        //Validacion, revisa que el arreglo de errores este vacio
        $errores = $propiedad->validar();
        if(empty($errores)) {
            //Guarda en la base de datos
            $resultado = $propiedad->guardar();
            
            if(is_dir(!CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            //Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            //Mensaje de exito o error
            if($resultado) {
                header('Location: /admin.php?resultado=1');
            }
        }
    }
       
        $router->render('/propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        //No estoy muy feliz con esta linea
        $id = validarORedireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $vendedores = Vendedores::all();
        // arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Asignar atributos
            $args = $_POST['propiedad'];
    
            $propiedad->sincronizar($args);
    
            //Validacion
            $errores = $propiedad->validar();
    
            //Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            $carpetaImagenes = CARPETA_IMAGENES; 
            if($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);  
            }
    
            //Revisar que el arreglo de errores este vacio
            if(empty($errores)) {
                if($_FILES['propiedad']['tmp_name']['imagen']) {     
                //Almacenar la imagen ** lo movi desde fuera, marcar si hay un error ya que dio errores varias veces
                $image->save($carpetaImagenes . $nombreImagen);  
            }
                //Insertar en la base de datos 
                $propiedad->guardar();         
            }
        }
        
        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if($id) {
            $tipo = $_POST['tipo'];
            if(validarTiposContenido($tipo)){
                //Compara lo que vamos a eliminar
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
                }
            }
        }
    }
}