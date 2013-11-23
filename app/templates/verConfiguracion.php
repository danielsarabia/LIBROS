<?php ob_start() ?>
<div id="contenedorLogin">
 <h1>CONFIGURAR PERFIL</h1>				
<form name="registro" method="post" action="index.php?ctl=configurar" id="registro">
    <div id="contenedorInputsRegistro">
    <span>Usuario:</span><input type="text" class="textoLogin" name="usuario" data-validate="validate(required, username)" value="<?php echo $result[0]['usuario'] ?>" readonly/><br /><br />
    <span>Nombre:</span> <input type="text" class="textoLogin" name="nombre" data-validate="validate(required)" value="<?php echo $result[0]['nombre'] ?>"/><br /><br />
    <span>Apellido1:</span> <input type="text" class="textoLogin" name="apellido1" data-validate="validate(required)" value="<?php echo $result[0]['apellido_paterno'] ?>"/><br /><br />
    <span>Apellido2:</span> <input type="text" class="textoLogin" name="apellido2" data-validate="validate(required)" value="<?php echo $result[0]['apellido_materno'] ?>"/><br /><br />
    <span>Edad:</span> <input type="text" class="textoLogin" name="edad" data-validate="validate(required, number)" value="<?php echo $result[0]['edad'] ?>"/><br /><br />
    <span>Email:</span> <input type="text" class="textoLogin" name="email" data-validate="validate(required, email)" value="<?php echo $result[0]['email'] ?>"/><br /><br />
    <span>Telefono:</span> <input type="text" class="textoLogin" name="telefono" data-validate="validate(required, validartel)" value="<?php echo $result[0]['telefono'] ?>"/><br /><br />
    <span>Calle:</span> <input type="text" class="textoLogin" name="calle" data-validate="validate(required)" value="<?php echo $result[0]['calle'] ?>"/><br /><br />
    <span>Numero:</span> <input type="text" class="textoLogin" name="numero" data-validate="validate(required, number)" value="<?php echo $result[0]['numero'] ?>"/><br /><br />
    <span>Ciudad:</span> <input type="text" class="textoLogin" name="ciudad" data-validate="validate(required)" value="<?php echo $result[0]['ciudad'] ?>"/>
    <input type="submit" class="botonSubmit" value="GUARDAR" />
    </div>
    </form>
    </div>
 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>