<?php ob_start() ?>
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
<script src="funcion.js" type="text/javascript"></script>
</head>

<body>
<div id="global">
	<div id="encabezado">
    <div class="linkslinks" style="width:20px;border:none;"><a href="index.php?ctl=salir"><img src="img/turnright32p.png"/></a></div>
    <div class="linkslinks" style="width:20px; border:none;"><a><img src="img/gear32p.png"/></a></div>
    <div class="linkslinks" style="width:20px; border:none;"><a href="index.php?ctl=verCarrito"><img src="img/shoppingcart32p.png"/></a></div>
    <div class="linkslinks" style="border:none;"><a href="index.php?ctl=inicio"><?php echo $_SESSION['usuarioactual'] ?></a></div>
    <a href="index.php?ctl=inicio"><img src="img/logobuhardillaROJOPEQ.png"  style="float:left;"/></a>
     <form name="formBusqueda" action="index.php?ctl=buscar" method="POST">
     <input type="text" class="textoBusqueda" name="titulo" value="" placeholder="BUSCAR POR TITULO">
    <input type="submit" name="buscar" class="botonBuscar" value="" onClick=" window.location.href='index.php?ctl=buscar' " />
     </form>
    </div>
    <div id="area">
        <div id="barra">
        	<ul> 
            <p>CATEGORÍAS</p>
            <li style="text-align:center;"> <a href="index.php?ctl=listar&id=1">Novela</a> </li>
            <li style="text-align:center;"> <a href="index.php?ctl=listar&id=2">Infantil</a> </li>
            <li style="text-align:center;"> <a href="index.php?ctl=listar&id=3">Técnico</a> </li>
            <li style="text-align:center;"> <a href="index.php?ctl=listar&id=4">Histórico</a> </li>
            <li style="text-align:center;"> <a href="index.php?ctl=listar&id=5">Juvenil</a> </li>
            <li style="text-align:center;"> <a href="index.php?ctl=listar&id=0">Todos</a> </li>
            </ul>
            
            <ul>
            <p>PERFIL</p>
            <li> <a><img src="img/gear32pp.png"/> Configuración</a> </li>
            <li> <a href="index.php?ctl=verHistorial"><img src="img/moneyreceipt32pp.png"/> Historial</a> </li>
            <li> <a href="index.php?ctl=verCarrito"> <img src="img/shoppingcart32pp.png"/> Carrito Actual</a> </li>
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

