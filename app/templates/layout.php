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
<script type="text/javascript">
$(document).ready(function(){
					
					
				$.ketchup.message('required', 'Este es un campo obligatorio.');
				$.ketchup.validation('validartel', 'Introduzca un número de 10 dígitos sin espacios.', function(form, el, value) {
					  if(value.match(/^\d{10}$/)) {
						return true;
					  } else {
						return false;
					  }
					});
				
				$.ketchup.validation('validarnom', 'Introduzca nombre y apellido', function(form, el, value) {
					aux = [];
					var aux = value.split(' ');
					//alert(aux.length);
					  if(value.match(/[a-z]/)&& aux.length>=2 && aux[1]!=null && aux[1]!='' && aux[1]!=' ') {
						return true;
					  } else {
						return false;
					  }
					});
					$.ketchup.validation('validarcant', 'Introdujo un valor incorrecto.', function(form, el, value) {
					aux = [];
					var aux = value.split(' ');
					  if(value.match(/[a-zA-Z0-9]/) && aux[0].match(/[0123456789]/) && aux.length>=1 ) {
						return true;
					  } else if(aux.length>=2 && aux[0].match(/[0123456789]/) && aux[1]!=null && aux[1]!='' && aux[1]!=' '){
						  return true;
					  }
					  else {
						return false;
					  }
					});
				
				  $('#formBusqueda').ketchup();
				
				 $('#registro').ketchup();
				});

</script>
</head>

<body>
<div id="global">
	<div id="encabezado">
    <div class="linkslinks" style="width:20px;border:none;"><a href="index.php?ctl=salir"><img src="img/turnright32p.png"/></a></div>
    <div class="linkslinks" style="width:20px; border:none;"><a href="index.php?ctl=verConfiguracion"><img src="img/gear32p.png"/></a></div>
    <div class="linkslinks" style="width:20px; border:none;"><a href="index.php?ctl=verCarrito"><img src="img/shoppingcart32p.png"/></a></div>
    <div class="linkslinks" style="border:none;"><a href="index.php?ctl=inicio"><?php echo $_SESSION['usuarioactual'] ?></a></div>
    <a href="index.php?ctl=inicio"><img src="img/logobuhardillaROJOPEQ.png"  style="float:left;"/></a>
     <form name="formBusqueda" id="formBusqueda" action="index.php?ctl=buscar" method="POST">
     <input type="text" class="textoBusqueda" name="titulo" value="" placeholder="BUSCAR POR TITULO" data-validate="validate(required)">
    <input type="submit" name="buscar" class="botonBuscar" value=""/>
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
            <li> <a href="index.php?ctl=verConfiguracion"><img src="img/gear32pp.png"/> Configuración</a> </li>
            <li> <a href="index.php?ctl=verHistorial"><img src="img/moneyreceipt32pp.png"/> Historial</a> </li>
            <li> <a href="index.php?ctl=verCarrito"> <img src="img/shoppingcart32pp.png"/> Carrito Actual</a> </li>
            </ul>
            
      
        </div>
        <div id="contenido">
        <?php echo $contenido ?>
        </div>
    </div>
    <div id="pie">
    <div class="linkspie"><a>Novela |</a> <a>Infantil |</a> <a>Técnico |</a> <a>Histórico |</a> <a>Juvenil |</a> <a>Todos</a></div>
    <div class="linkspie"><a>Configuracón ---</a> <a>Historial ---</a> <a>Carrito Actual ---</a><a href="index.php?ctl=Correo">Contacto</a></div>
    <div class="linkspie"><a style="font-family:'OpenSans-ExtraBold'">~ C O N T A C T O ~</a></div>
    </div>
</div>
</body>
</html>

