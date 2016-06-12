
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'backend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//USUARIOS
$route['backend/login'] = 'signin'; 
$route['backend/usuarios/nuevo-usuario'] = 							'users/createUser';
$route['backend/usuarios/crear-usuario'] = 							'users/newUser';
$route['backend/usuarios/ver-usuarios'] = 							'users/loadUsers';
$route['backend/usuarios/ver-usuario/(.*)'] = 						'users/showUser/$1';
$route['backend/usuarios/eliminar-usuario/(.*)'] = 					'users/deleteUser/$1';
$route['backend/usuarios/eliminacion-usuario/(.*)'] = 				'users/deleteUserAction/$1';
$route['backend/usuarios/modificar-usuario/(.*)'] = 				'users/updateUser/$1';
$route['backend/usuarios/modificacion-usuario'] = 					'users/updatingUser';
//HABITACIONES
$route['backend/habitaciones/nueva-habitacion'] = 					'rooms/newRoom';
$route['backend/habitaciones/crear-habitacion'] = 					'rooms/createNewRoom';
$route['backend/habitaciones/ver-habitaciones'] = 					'rooms/loadRooms';
$route['backend/habitaciones/ver-habitacion/(.*)'] = 				'rooms/showRoom/$1';
$route['backend/habitaciones/actualizar-habitacion/(.*)'] = 		'rooms/updateRoom/$1';
$route['backend/habitaciones/modificacion-habitacion'] = 			'rooms/updatingRoom';
$route['backend/habitaciones/eliminar-habitacion/(.*)'] = 			'rooms/deleteRoom/$1';
$route['backend/habitaciones/eliminacion-usuario/(.*)'] = 			'rooms/deletingRoom/$1';
//CLIENTES
$route['backend/clientes/nuevo-cliente'] = 							'customers/createCustomer';
$route['backend/clientes/crear-cliente'] = 							'customers/newCustomer';
$route['backend/clientes/ver-clientes'] = 							'customers/loadCustomers';
$route['backend/clientes/ver-cliente/(.*)'] = 						'customers/showCustomer/$1';
$route['backend/clientes/eliminar-cliente/(.*)'] = 					'customers/deleteCustomer/$1';
$route['backend/clientes/eliminacion-cliente/(.*)'] = 				'customers/deleteCustomerAction/$1';
$route['backend/clientes/modificar-cliente/(.*)'] = 				'customers/updateCustomer/$1';
$route['backend/clientes/modificacion-cliente'] = 					'customers/updatingCustomer';
//RESERVACIONES
$route['backend/reservas/verificar-disponibilidad'] = 				'reserves/verifyAvailability';
$route['backend/reservas/verificando-disponibilidad'] = 			'reserves/verifyingAvailability';
$route['backend/reservas/ver-habitacion-reserva/(.*)/(.*)/(.*)'] = 	'reserves/createReserve/$1/$2/$3';
$route['backend/reservas/crear-reserva/(.*)/(.*)/(.*)'] = 			'reserves/loadNewReserve/$1/$2/$3';
$route['backend/reservas/reservar'] = 								'reserves/reservingRoom';
$route['backend/reservas/ver-reservas'] = 							'reserves/loadReserves';
$route['backend/reservas/reservas-de-hoy'] =					    'reserves/loadTodayReserves';
$route['backend/reservas/ver-habitaciones-disponibles/(.*)/(.*)'] = 'reserves/loadAvailableRooms/$1/$2';
$route['backend/reservas/ver-habitaciones-reservadas/(.*)/(.*)'] = 	'reserves/loadReservedRooms/$1/$2';




