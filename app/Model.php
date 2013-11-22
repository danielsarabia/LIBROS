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
	 
	 public function anadirAlCarrito($usuario, $id, $cantidad){
		 $resultVALIDACION = mysql_query("select cantidad from libro where id='$id'", $this->conexion) or die(mysql_error());
				 while ($row = mysql_fetch_assoc($resultVALIDACION))
				 {
					 $cantidad_total = $row['cantidad'];
					 if($row['cantidad']<$cantidad){
						 return -1;
					 }
				 }
		 
		 $sql = "select id from carrito where id_cliente = '" . $usuario . "' and estado = 1";
		 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		 $existe = mysql_num_rows($result);
		  if($existe>0){ ///////// SI YA EXISTE UN CARRITO ASOCIADO AL CLIENTE
			  $datos = array();
				 while ($row = mysql_fetch_assoc($result))
				 {
					 $datos[] = $row;
				 }
			 $result2 = mysql_query("select * from carrito_libro where id_carrito = '".$datos[0]['id']."' and id_libro='$id'", $this->conexion) or die(mysql_error());
			 $existe2 = mysql_num_rows($result2);
			 if($existe2>0){ ///////// SI EN ESE CARRITO YA SE AGREGO ESE LIBRO SE INCREMENTA CANTIDAD
				 $datos2 = array();
				 while ($row = mysql_fetch_assoc($result2))
				 {
					 $datos2[] = $row;
				 }
				 if($cantidad_total<($datos2[0]['cantidad']+$cantidad)){
					 return -1;
				 }
				 $result3 = mysql_query("update carrito_libro set cantidad ='".($datos2[0]['cantidad']+$cantidad)."' where id_carrito = '".$datos[0]['id']."' and id_libro='$id'", $this->conexion) or die(mysql_error());
			 }else{ ///////// SI AUN NO SE HA AGREGADO ESE LIBRO SE AGREGA
			  $sql = "insert into carrito_libro (id_carrito, id_libro, cantidad) values('".$datos[0]['id']."', '$id', $cantidad)";
			  $result = mysql_query($sql, $this->conexion) or die(mysql_error());
			 }
		  //////////////////////
			  
		  }else{ ///////// SI NO EXISTE UN CARRITO ASOCIADO AL CLIENTE SE AGREGA
			   $sql = "insert into carrito (id_cliente, fecha, estado) values('$usuario', NOW(), 1)";
			   $result = mysql_query($sql, $this->conexion) or die(mysql_error());
			   ///
			   //echo $result;
			   $sql = "select id from carrito where id_cliente = '" . $usuario . "' and estado = 1";
		       $result = mysql_query($sql, $this->conexion) or die(mysql_error());
			   $datos = array();
				 while ($row = mysql_fetch_assoc($result))
				 {
					 $datos[] = $row;
				 } ///////// SE AGREGA AL CARRITO EL LIBRO
			   $sql = "insert into carrito_libro (id_carrito, id_libro, cantidad) values('".$datos[0]['id']."', '$id', '$cantidad')";
			   $result = mysql_query($sql, $this->conexion) or die(mysql_error());
			  
		  }
		 
	 }
	 
	 public function dameCarrito($usuario){
		 $sql = "select id from carrito where id_cliente = '" . $usuario . "' and estado = 1";
		 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		 $existe = mysql_num_rows($result);
		  if($existe>0){ 
			  		$datos = array();
					 while ($row = mysql_fetch_assoc($result))
					 {
						 $datos[] = $row;
					 }
					 $idcarrito = $datos[0]['id'];
					 $sql = "select * from carrito_libro where id_carrito='".$idcarrito."'";
					 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
					 $existe = mysql_num_rows($result);
					 if($existe == 0){
						 return 0;
					 }
					 $datos = array();
					 while ($row = mysql_fetch_assoc($result))
					 {
						 $datos[] = $row;
					 }
			  		 foreach($datos as $dato){
				  	 $result = mysql_query("select * from libro where id='".$dato['id_libro']."'", $this->conexion) or die(mysql_error());
						  while ($row = mysql_fetch_assoc($result))
						  {
						   $datosss[] = $row;
						   $datos2[] = array(
						  'id_carrito'=> $idcarrito,
						  'id_libro'=> $row['id'],
						  'titulo' => $row['titulo'],
						  'cantidad'=> $dato['cantidad'],
						  'precio'=> $row['precio'],
						  'total'=> $dato['cantidad'] * $row['precio'],
						  );
						  }
				      }
			   		 return $datos2;
			  
		  }
	 }
	 
	 public function eliminarDelCarrito($id_carrito, $id_libro){
		  $sql = "delete from carrito_libro where id_carrito = '$id_carrito' and id_libro = '$id_libro'";
		  $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		 
	 }
	 
	 public function insertarNota($id_carrito, $total){
		  ////////// VALIDAR STOCK
		  $result2 = mysql_query("select * from carrito_libro where id_carrito = '$id_carrito'") or die(mysql_error());
		  while ($row2 = mysql_fetch_assoc($result2)){
		  $resultVALIDACION = mysql_query("select cantidad from libro where id='".$row2['id_libro']."'", $this->conexion) or die(mysql_error());
				 while ($row = mysql_fetch_assoc($resultVALIDACION))
				 {
					 if($row['cantidad']<$row2['cantidad']){
						 return -1;
					 }
				 }
		  }
		  ////////// DISMINUIR STOCK DE PRODUCTOS
		  $sql = "select * from carrito_libro where id_carrito='$id_carrito'";
		  $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		  //$datos = array();
		 while ($row = mysql_fetch_assoc($result))
		 {
			$sql = "update libro set cantidad=cantidad - '".$row['cantidad']."' where id='".$row['id_libro']."'";
			$result2 = mysql_query($sql, $this->conexion) or die(mysql_error());
			//$datos[] = $row;
		 }
		  
		  //////////////////////////////////////////////
		  $sql = "insert into nota (id_carrito, fecha, total) values('$id_carrito', NOW(), '$total')";
	      $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		  $sql="update carrito set estado ='0' where id = '$id_carrito'";
		  $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		}


 }