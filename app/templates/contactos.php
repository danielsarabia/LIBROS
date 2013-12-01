 <?php ob_start() ?>
 <?php 
	if($_POST['enviar']){
	$coment=$_POST['comentarios'];
	$titulo="Comentario de ".$_POST['Nombre'];
        require("class.phpmailer.php");
        $mail             = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth   = true;
        //$mail->SMTPSecure = "ssl";
        $mail->Host       = "smtp.terra.com.mx";
        $mail->Port       = 587;
        $mail->Username   = 'buhardilla@terra.com.mx';
        $mail->Password   = "libros";
        //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
        //====== DE QUIEN ES ========
        $mail->From       = "buhardilla@terra.com.mx";
        $mail->FromName   = "Comentarios Buhardilla";
        //====== PARA QUIEN =========
        $mail->Subject    = $titulo;
        $mail->AddAddress("buhardilla@terra.com.mx",$titulo);        
        //Cuerpo del mensaje
        $mail->Body      = $coment;
        $mail->Send();		
	}
?>
<script src="funcion.js" type="text/javascript"></script>
		<script>
  		function Total(){
  				
  			var x=forma.Nombre.value;  
  				
  			var y=forma.Nombre1.value;
  			alert(y);
  			if(x==null || y==null){
  			
  			alert("Mensaje erroneo complete todos los campos");}
  			else{
  				alert("Mensaje enviado");
  			}
  			
  		}
  		
  		
  		
		</script>
 <h1>Contacto</h1>
<div id="Conta">
	<form name="forma" action="index.php?ctl=Correo" method="post" >
						<table id="tablon">
						<tr>
							<td>
								Destinatario:
							</td>
							<td>
								<TEXTAREA rows="1" readonly name="comentarios">buhardilla@terra.com.mx</TEXTAREA>
							</td>
						</tr>
						<tr>
							<td>
								Su nombre:
							</td>
							<td>
								<input type="text" name="Nombre" required>
							</td>
						</tr>
						<tr>
							<td>
								Mensaje:
							</td>
							<td>
								<input type="text" name="Nombre1" required>
							</td>
						</tr>
						<TR>
							<TD COLSPAN=2>
								<input type="submit" id="Boton_cont" name="enviar" value="Enviar correo" onclick="Total();"/>	
							</TD>
						</TR>
						</table>
					</form>
</div>
 
 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>