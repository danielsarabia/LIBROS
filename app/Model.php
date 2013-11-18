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
	 public function obtenerDatos(){
		 $sql = "select * from libro";
		 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		 $datos = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $datos[] = $row;
         }

         return $datos;
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
	 public function dameCategoria($id)
     {
     	$id = htmlspecialchars($id);

         $sql = "select * from categoria where id=".$id;

         $result = mysql_query($sql, $this->conexion);

         
         $row = mysql_fetch_assoc($result);

         return $row;

     }
	  public function buscarAlimentosPorNombre($titulo)
     {
         $titulo = htmlspecialchars($titulo);

         $sql = "select * from libro where titulo like '" . $titulo . "' order by titulo desc";

         $result = mysql_query($sql, $this->conexion);

         $libros = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $libros[] = $row;
         }

         return $libros;
     }
	  public function dameLibros($id)
     {
     	if($id==0){
     		$id = htmlspecialchars($id);
     		$sql = "SELECT * FROM libro ORDER BY id DESC";

         $result = mysql_query($sql, $this->conexion) or die(mysql_error());

         $libros = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $libros[] = $row;
         }

         return $libros;
     	}
		else{
     	$id = htmlspecialchars($id);
		
         $sql = "SELECT * FROM libro where id_categoria=".$id;

         $result = mysql_query($sql, $this->conexion) or die(mysql_error());

         $libros = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $libros[] = $row;
         }

         return $libros;}
     }
	 public function dameEditorial($id)
     {
     	$id = htmlspecialchars($id);
		$sql = "SELECT id_editorial FROM libro where id=".$id;
		$result = mysql_query($sql, $this->conexion);
         $row = mysql_fetch_assoc($result);
		$id = htmlspecialchars($row['id_editorial']);
		$sql = "SELECT * FROM editorial where id=".$id;
		$result = mysql_query($sql, $this->conexion);
		$row = mysql_fetch_assoc($result);
         return $row;
     }
	 public function dameAutor($id)
     {
     	$id = htmlspecialchars($id);
		$sql = "SELECT id_autor FROM libro_autor where id_libro=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
		$id_libros=array();
		while ($row = mysql_fetch_assoc($result))
         {
             $id_libros[] = $row;
         }
         $autor=array();
         foreach ($id_libros as $dato) {
             $id = htmlspecialchars($dato['id_autor']);
			 $sql = "SELECT * FROM autor where id=".$id;
			 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
			 $row = mysql_fetch_assoc($result);
			 $autor[]=$row;
         }
		 return $autor;
	 }
	 public function dameLibro($id)
     {
         $id = htmlspecialchars($id);

         $sql = "select * from libro where id=".$id;

         $result = mysql_query($sql, $this->conexion);

         
         $row = mysql_fetch_assoc($result);

         return $row;

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