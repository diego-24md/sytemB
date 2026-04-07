<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//El slash "/" representa el HOME de tu aplicación
//es decir www.miweb.com/programador

$routes->get('/', 'Home::dashboard');
$routes->get('/senati', 'Home::index'); //Primer ejemplo de navegación

//¿Cómo funciona una ruta?
//$routes->verbo('/ruta/', 'Controlador::MetodoAccion');
//Nota: Es posible crear más de una ruta para una vista

$routes->get('/libros', 'Recurso::index');

//Rutas para el CRUD de personas(alumnos)
$routes->get('/alumnos', 'Persona::index');
$routes->post('/alumnos/importar', 'Persona::importar');