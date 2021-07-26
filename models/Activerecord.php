<?php
namespace Model;

class ActiveRecord {

    //Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = "";

    //Errores
    //Se heredan tanto a propiedad como a vendedor para que cada clase tenga sus metodos de validacion
    //y manejen de forma independiente el objeto de errores sobre el cual van escribiendo
    protected static $errores = [];

    //Definir la conexion a la base de datos
    public static function setDB($database) {
        self::$db = $database;
    }


    //Si hay un id llama a la funcion guardar() y si no a crear()
    //Esto es un principio de Active Record
    public function guardar() {
        if($this->id) {
            //actualizar
            $this->actualizar();
        } else {
            //crear
            $this->crear();
        }
    }

    public function crear() {

        $atributos = $this->sanitizarAtributos();

        //Insertar en la base de datos  
        $query = " INSERT INTO " . static::$tabla . "( ";
        $query .= join(', ', array_keys($atributos));  
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') " ;
        $resultado = self::$db->query($query);
        if($resultado) {
            header('Location: /admin?resultado=1');
        }
    }

    public function actualizar() {
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        //Unimos atributos y valores
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores); 
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
        $resultado = self::$db->query($query);

        if($resultado) {
            //Redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }

    //Eliminar
    public function eliminar() {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " .  self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado) {
            header('Location: /admin?resultado=3');
        }
    }

    //Identificar y unir los atributos de la base de datos
    public function atributos() {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value)
        {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen) {
        //Elimina la imagen previa (en el caso de editar)
        if(empty(!$this->id)) { 
            $this->borrarImagen();
        }

        //Asignar al atributo de imagen el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        } 
    }

    //Eliminar imagen
    public function borrarImagen() {
        //Comprobar si existe el archivo
        $archivoExiste = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($archivoExiste) {
        unlink(CARPETA_IMAGENES  . $this->imagen);
        }
    }

    //Validacion
    public static function getErrores() {
        //Cambios de self a staric al crear las clases hijo
        //para que haga referencia a la clase que invoca al metodo en lugar de la clase padre
        return static::$errores;
    }

    public function validar() {

        //Limpiamos el arreglo y generamos los nuevos errores
        static::$errores = [];
        return static::$errores;
    }

    //Lista todas los registros

    public static function all() {
        //Static a diferencia de self hace referencia a la clase desde donde se llama la funcion
        //es decir en tanto self:: llama a la variable $tabla de la clase Activerecord (donde fue definido el método)
        // static:: busca la variable $tabla en la clase desde donde se hace llamar
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Obtiene un determinado numero de registros
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Busca un registro por su ID

    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";
        $resultado = self::consultarSQL($query);
        //Devuelve el primer resultado dentro de un arreglo
        //En este caso es un arreglo de una sola posicion que contiene el objeto seleccionado por id
        return array_shift($resultado);
    }

    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array [] = static::crearObjeto($registro);
        }
        //Liberar la memoria
        $resultado->free();

        //Retornar los resultados
        return $array;

    }   

    protected static function crearObjeto($registro) {
        $objeto = new static; //Instancia un objeto de la clase que llama a la funcion 
        foreach($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincronizar, sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar( $args = []) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            };
        }
    }

}