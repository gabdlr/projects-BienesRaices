<?php



namespace Model;



class Vendedores extends ActiveRecord {



    protected static $tabla = 'vendedores';

    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];



    public $id;

    public $nombre;

    public $apellido;

    public $telefono;



    public function __construct($args = [])

    {

        $this->id = $args['id'] ?? '';

        $this->nombre = $args['nombre'] ?? '';

        $this->apellido = $args['apellido'] ?? '';

        $this->telefono = $args['telefono'] ?? '';

    }



    public function validar() {


        if(!$this->nombre) {

            self::$errores[] = "El nombre del vendedor es obligatorio!";

        }

        if(!$this->apellido) {

            self::$errores[] = "El apellido del vendedor es obligatorio!";

        }

        if(!$this->telefono) {

            self::$errores[] = "El teléfono del vendedor es obligatorio!";

        }

        //preg_match busca una expresion regular donde [0-9] indica que solo se esperan numeros y {10}

        //un extension de 10 caracteres

        //if(!preg_match('/[0-9],{9}/', $this->telefono)){

        //    self::$errores[] = "Número de teléfono inválido!";

        //}

        return self::$errores;

    }



}