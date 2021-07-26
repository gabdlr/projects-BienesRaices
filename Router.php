<?php



namespace MVC;



class Router{



    //Se definen como arreglos porque luego usaremos una funcion que recibe un arreglo como parametro

    public $rutasGET = [];

    public $rutasPOST = [];

    



    public function get($url, $fn) {

        $this->rutasGET[$url] = $fn;

    }



    public function post($url, $fn) {

        $this->rutasPOST[$url] = $fn;

    }



    public function comprobarRutas() {



        session_start();

        $auth = $_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas

        $rutas_protegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar',

        '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'

            ];





        $urlActual = $_SERVER['PATH_INFO'] ?? '/';

        $metodo = $_SERVER['REQUEST_METHOD'];



        if($metodo === 'GET') {

            $fn = $this->rutasGET[$urlActual] ?? null;

        } else {

            $fn = $this->rutasPOST[$urlActual] ?? null;

        }



        //Proteger rutas

        if(in_array($urlActual, $rutas_protegidas) && !$auth){

            header('Location: /login');

        }



        if($fn){

            //La url existe y hay una funcion asociada

            call_user_func($fn, $this);

        } else {

            header('Location: /');

        }

    }



    //Muestra una vista



    public function render($view, $datos = []) {

        foreach ($datos as $key => $value) {

            //Mostramos los datos (el valor) con el nombre de la llave

            // el $$ significa variable de variables

            //el sentido de este codigo es acceder al valor de una llave llamandola como Svariable

            //genera variables con el nombre de los keys del arreglo que le estamos pasando

            $$key = $value;

        }

        //Almacena en memoria la vista

        ob_start();

        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();



        include __DIR__ . "/views/layout.php"; 

    }

}