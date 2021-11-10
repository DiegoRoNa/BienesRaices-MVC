<?php 

/*ESTE ARCHIVO SE ENCARGA DE EJECUTAR INTERNAMENTE LOS CONTROLADORES, MODELOS Y VISTAS
A TRAVÉS DEL ROUTER QUE CONTIENE LAS RUTAS DE LA WEB */


//INCLUIR BD, AUTOLOAD, FUNCIONES Y HERLPERS
require_once __DIR__.'/../includes/app.php';

use MVC\Router;//enrutador
use Controllers\PropiedadController;//controlador de propiedad
use Controllers\VendedorController;//controlador de vendedor
use Controllers\PaginasController;//controlador de Paginas

$router = new Router();


//RUTAS
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedad/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedad/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedad/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedad/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedad/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedor/crear', [VendedorController::class, 'crear']);
$router->post('/vendedor/crear', [VendedorController::class, 'crear']);
$router->get('/vendedor/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedor/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedor/eliminar', [VendedorController::class, 'eliminar']);

$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->comprobarRutas();
