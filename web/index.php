<?php
 // web/index.php

 // carga del modelo y los controladores
 require_once __DIR__ . '/../app/Config.php';
 require_once __DIR__ . '/../app/Model.php';
 require_once __DIR__ . '/../app/Controller.php';

 // enrutamiento
 $map = array(
     'inicio' => array('controller' =>'Controller', 'action' =>'inicio'),
     'registro' => array('controller' =>'Controller', 'action' =>'registro'),
	 'registrar' => array('controller' =>'Controller', 'action' =>'registrar'),
	 'login' => array('controller' =>'Controller', 'action' =>'login'),
	 'logear' => array('controller' =>'Controller', 'action' =>'logear'),
	 'salir' => array('controller' =>'Controller', 'action' =>'salir'),
	 'listar' => array('controller' =>'Controller', 'action' =>'listar'),
	 'buscar' => array('controller' =>'Controller', 'action' =>'buscarPorNombre'),
	 'ver' => array('controller' =>'Controller', 'action' =>'ver'),
	 'anadir' => array('controller' =>'Controller', 'action' =>'anadir'),
	 'verCarrito' => array('controller' =>'Controller', 'action' =>'verCarrito'),
	 'eliminar' => array('controller' =>'Controller', 'action' =>'eliminar'),
	 'comprar' => array('controller' =>'Controller', 'action' =>'comprar'),
	 'verHistorial' => array('controller' =>'Controller', 'action' =>'verHistorial'),
	 'verNota' => array('controller' =>'Controller', 'action' =>'verNota')
 );

 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {
         header('Status: 404 Not Found');
         echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                 $_GET['ctl'] .
                 '</p></body></html>';
         exit;
     }
 } else {
     $ruta = 'login';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: El controlador <i>' .
             $controlador['controller'] .
             '->' .
             $controlador['action'] .
             '</i> no existe</h1></body></html>';
 }