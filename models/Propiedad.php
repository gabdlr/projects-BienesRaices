<?php
namespace Model;

class Propiedad extends ActiveRecord {
    
    protected static $tabla = 'propiedades';

    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones',
    'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId; 

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d') ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar() {
        
        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un título!";
        }
        if(!$this->precio) {
            self::$errores[] = "El precio es obligatorio!";
        }
         if(!$this->imagen) {
             self::$errores[] = "Una imagen es obligatoria";
         }
        if( strlen($this->descripcion) < 50) {
            self::$errores[] = "La descripción debe contener al menos 50 caracteres.";
        }
        if(!$this->habitaciones) {
            self::$errores[] = "El número de habitaciones es obligatorio!";
        }
        if(!$this->wc) {
            self::$errores[] = "El número de baños es obligatorio!";
        }
        if(!$this->estacionamiento) {
            self::$errores[] = "El número de puestos de estacionamiento es obligatorio!";
        }
        if(!$this->vendedorId) {
            self::$errores[] = "Seleccione un vendedor!";
        }
        return self::$errores;
    }


}