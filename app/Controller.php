<?php

 class Controller
 {
	 public function salir()
     {
		 session_start();
		 session_destroy();
         header("Location: index.php?ctl=login");
     }
	 

     public function inicio()
     {
         require __DIR__ . '/templates/inicio.php';
     }
	 
	 public function registro()
     {
		 require __DIR__ . '/templates/registro.php';
     }
	 
	 public function registrar()
     {
		 $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
					 
	    if(isset($_POST['usuario'])){
			$usuario = $_POST['usuario'];
			$nombre = $_POST['nombre'];
			$apellido_paterno = $_POST['apellido1'];
			$apellido_materno = $_POST['apellido2'];
			$contrasena = $_POST['contrasena'];
			$calle = $_POST['calle'];
			$numero = $_POST['numero'];
			$ciudad = $_POST['ciudad'];
			$edad = $_POST['edad'];
			$foto = 'Aun no';
			$email = $_POST['email'];
			$telefono = $_POST['telefono'];
			
			$result = $m->validarRegistro($usuario, $nombre, $apellido_materno, $apellido_materno, $contrasena, $calle, $numero, $ciudad, $telefono, $edad, $foto, $email);
			if($result != 0 ){
		     session_start();
			 $_SESSION['autentica']= "SIP";
			 $_SESSION['usuarioactual']= $usuario;
			 require __DIR__ . '/templates/inicio.php';
		 }
		 else{
			 echo "<script>alert('ERROR');window.location.href='index.php?ctl=registro'</script>”";
		 }
		}
		 

     }
	 
	 public function login()
     {
		 require __DIR__ . '/templates/login.php';
     }
	 
	  public function logear()
     {
		 $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$result = $m->validarUsuario($_POST['usuario'], $_POST['contrasena']);
              
         }
		 
		 if($result != 0 && $result != 2){
		     session_start();
			 $_SESSION['autentica']= "SIP";
			 $_SESSION['usuarioactual']= $_POST['usuario'];
			 require __DIR__ . '/templates/inicio.php';
		 }
		 else{
			 echo "<script>alert('ERROR');window.location.href='index.php?ctl=login'</script>”";
		 }
     }
	 
	  public function listar()
     {
         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

         $params = array(
             'libros' => $m->dameLibros(),
         );

         require __DIR__ . '/templates/mostrarLibros.php';
     }
	 
	 public function ver()
     {
         if (!isset($_GET['id'])) {
             throw new Exception('Página no encontrada');
         }

         $id = $_GET['id'];

         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

         $libro = $m->dameLibro($id);

         $params = $libro;

         require __DIR__ . '/templates/verLibro.php';
     }

 }