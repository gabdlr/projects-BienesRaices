<?php

require_once __DIR__ . '/../includes/app.php';



use Controllers\LoginController;

use MVC\Router;

use Controllers\PropiedadController;

use Controllers\VendedorController;

use Controllers\PaginasController;

use Model\Admin;



$router = new Router();



//Pasamos en un arreglo la clase y el metodo que necesitamos llamar



//Login y autenticación

$router->get('/login', [LoginController::class, 'login']);

$router->post('/login', [LoginController::class, 'login']);

$router->get('/logout', [LoginController::class, 'logout']);



//Zona Privada

$router->get('/admin', [PropiedadController::class , 'index']);

$router->get('/propiedades/crear', [PropiedadController::class , 'crear']);

$router->post('/propiedades/crear', [PropiedadController::class , 'crear']);

$router->get('/propiedades/actualizar', [PropiedadController::class , 'actualizar']);

$router->post('/propiedades/actualizar', [PropiedadController::class , 'actualizar']);

$router->post('/propiedades/eliminar', [PropiedadController::class , 'eliminar']);



$router->get('/vendedores/crear', [VendedorController::class , 'crear']);

$router->post('/vendedores/crear', [VendedorController::class , 'crear']);

$router->get('/vendedores/actualizar', [VendedorController::class , 'actualizar']);

$router->post('/vendedores/actualizar', [VendedorController::class , 'actualizar']);

$router->post('/vendedores/eliminar', [VendedorController::class , 'eliminar']);





//Zona Publica

$router->get('/', [PaginasController::class , 'index']);

$router->get('/nosotros', [PaginasController::class , 'nosotros']);

$router->get('/propiedades', [PaginasController::class , 'propiedades']);

$router->get('/propiedad', [PaginasController::class , 'propiedad']);

$router->get('/blog', [PaginasController::class , 'blog']);

$router->get('/entrada', [PaginasController::class , 'entrada']);

$router->get('/contacto', [PaginasController::class , 'contacto']);

$router->post('/contacto', [PaginasController::class , 'contacto']);









$router->comprobarRutas();

