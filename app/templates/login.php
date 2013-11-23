
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
 <html>
     <head>
         <title>Buhardilla.com</title>
         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
         <link rel="stylesheet" type="text/css" href="<?php echo 'css/'.Config::$mvc_vis_css ?>" />
         <link rel="stylesheet" type="text/css" media="screen" href="js/css/jquery.ketchup.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.ketchup.all.min.js"></script>
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
				
				  $('#login').ketchup();
				});

</script>
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
    
    <form name="login" method="post" action="index.php?ctl=logear" id="login">
    <div id="contenedorInputsLogin">
    <span>Usuario:</span><input type="text" class="textoLogin" name="usuario" data-validate="validate(required)" /><br /><br />
    <span>Contraseña:</span> <input type="password" class="textoLogin" name="contrasena" data-validate="validate(required)" />
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