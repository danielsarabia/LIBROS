
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
    <img src="img/logobuhardillaROJOPEQ.png"  style="float:left;"/>
    <div class="linkslinks" style="border-right:none;"><a href="index.php?ctl=registro">Inscríbete</a></div>
     <div class="linkslinks"><a href="index.php?ctl=login">Ingresa</a></div>
    </div>
    <div id="area">
    
    <div id="contenedorLogin">
    <h1> LOGIN </h1>
    
    <form name="login" method="post" action="index.php?ctl=logear">
    <div id="contenedorInputsLogin">
    <span>Usuario:</span><input type="text" class="textoLogin" name="usuario" /><br /><br />
    <span>Contraseña:</span> <input type="password" class="textoLogin" name="contrasena" />
    </div>
    <input type="submit" class="botonSubmit" value="INGRESAR" />
    </form>
       
       </div>
    </div>
    <div id="pie">
    </div>
</div>
</body>
</html>