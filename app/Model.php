<?php

 class Model
 {
     protected $conexion;

     public function __construct($dbname,$dbuser,$dbpass,$dbhost)
     {
       $mvc_bd_conexion = mysql_connect($dbhost, $dbuser, $dbpass);

       if (!$mvc_bd_conexion) {
           die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
       }
       mysql_select_db($dbname, $mvc_bd_conexion);

       mysql_set_charset('utf8');

       $this->conexion = $mvc_bd_conexion;
     }



     public function bd_conexion()
     {

     }
	 
	 public function validarUsuario($nombre, $contrasena){
		 $sql = "select usuario from cliente where usuario = '" . $nombre . "'";
		 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		 
		 $numusuarios = mysql_num_rows($result);
		 
		 if ($numusuarios != 0){
		 $sql2 = "select usuario from cliente where usuario = '" . $nombre . "' and contraseña ='" .$contrasena ."'";
		 $result2 = mysql_query($sql2, $this->conexion) or die(mysql_error());
		 
		 $numusuarios2 = mysql_num_rows($result2);
		 
		 if($numusuarios2 != 0){
			 return $result2;
			 
		 } else return 2;
		 } else return 0;
	 }
	 
	 public function validarRegistro($usuario, $nombre, $apellido_paterno, $apellido_materno, $contrasena, $calle, $numero, $ciudad, $telefono, $edad, $foto, $email){
		 $sql = "select usuario from cliente where usuario = '" . $usuario . "'";
		 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		 
		 $existe_usuario = mysql_num_rows($result);
		 
		 if($existe_usuario>0){
			 return 0;
		 }else{
			 $sql2 = "insert into cliente (usuario, nombre, apellido_paterno, apellido_materno, contraseña, calle, numero, ciudad, telefono, edad, foto, email) values ('$usuario','$nombre','$apellido_paterno','$apellido_materno','$contrasena','$calle','$numero','$ciudad','$telefono','$edad','$foto','$email')";
			 $result2 = mysql_query($sql, $this->conexion) or die(mysql_error());
			 return $result2;
		 }
	 }


 }