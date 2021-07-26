<?php

namespace Controllers;

use MVC\Router;

use Model\Vendedores;



class VendedorController {



    public static function crear(Router $router){

        $vendedor = new Vendedores;

        $errores = Vendedores::getErrores();
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {



            //Crear una nueva instancia

            $vendedor = new Vendedores($_POST['vendedores']);

    

            //Validar campos

            $errores = $vendedor->validar();

            if(empty($errores)) {

                $vendedor->guardar();

            }

        }

	    $router->render('vendedores/crear', [

            'vendedor' => $vendedor,

            'errores' => $errores

        ]);
       

    }



    public static function actualizar(Router $router){

        $id = validarORedireccionar('/admin');

        $vendedor = Vendedores::find($id);

        $errores = Vendedores::getErrores();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //Sincronizar el objeto en memoria con los nuevos datos

        //Asignar los valores

        $args = $_POST['vendedores'];

        //Sincronizar el objeto en memoria

        $vendedor->sincronizar($args);

        //Validacion

        $errores = $vendedor->validar();



            if(empty($errores)) {

                $vendedor->guardar();

            }

        }

	$router->render('vendedores/actualizar', [

            'vendedor' => $vendedor,

            'errores' => $errores

        ]);

    }



    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //Validar id

        $id = $_POST['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {

                $tipo = $_POST['tipo'];

                if(validarTiposContenido($tipo)){   

                        $vendedor = Vendedores::find($id);

                        $vendedor->eliminar();

                }

            }

        }

    }

}