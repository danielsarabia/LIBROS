<?php
    //Reanudamos la sesión
    @session_start();

    //Validamos si existe realmente una sesión activa o no
	if (isset($_SESSION["autentica"])){
    if($_SESSION["autentica"] != "SIP"){
    //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión)
    header("Location: index.php?ctl=login");
	exit();
    }
	}else{
	header("Location: index.php?ctl=login");
	exit();
	}
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
 <html>
     <head>
         <title>Buhardilla.com</title>
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />
         <link rel="stylesheet" type="text/css" media="screen" href="js/css/jquery.ketchup.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ketchup.all.min.js"></script>
</head>

<body>
<div id="global">
	<div id="encabezado">
    <div class="linkslinks"><?php echo $_SESSION['usuarioactual'] ?></div>
    <div class="linkslinks"><a href="index.php?ctl=salir">SALIR</a></div>
    <img src="img/logobuhardillaROJOPEQ.png"  style="float:left;"/>
     <form name="formbusqueda">
     <input type="text"  class="textoBusqueda" name="busqueda" />
     <input type="submit" name="buscar" class="botonBuscar" value="" />
     </form>
    </div>
    <div id="area">
        <div id="barra">
        	<ul> 
            <p>CATEGORÍAS</p>
            <li> <a>Novela</a> </li>
            <li> <a>Infantil</a> </li>
            <li> <a>Técnico</a> </li>
            <li> <a>Histórico</a> </li>
            <li> <a>Juvenil</a> </li>
            <li> <a>Todos</a> </li>
            </ul>
            
            <ul>
            <p>PERFIL</p>
            <li> <a>Configuración</a> </li>
            <li> <a>Historial de Compras</a> </li>
            <li> <a>Carrito Actual</a> </li>
            </ul>
            
            <ul>
            <p>Acciones</p>
            <li> <a href="index.php?ctl=listar">Ver libros</a> </li>
            </ul>
        </div>
        <div id="contenido">
        <?php echo $contenido ?>
        </div>
    </div>
    <div id="pie">
    </div>
</div>
</body>
</html>

