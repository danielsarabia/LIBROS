<?php ob_start() ?>
 <h1><?php echo $params['titulo'] ?></h1>
 <img src="img/<?php echo $libro['foto'] ?>" id="imag_libro" >
 <fieldset id="field">
<legend>DETALLES</legend>								
 <table border="0" id="tabla_ver">
 	 <?php foreach ($params2['autor'] as $dato) :?>
		<tr >
			<td colspan="2" width="200" height="50"><p3>Autor: </p3><b><?php echo $dato['nombre'] ?> <?php echo $dato['apellido_paterno'] ?></b></td>
		 </tr>
		

	<?php endforeach; ?>
	<tr>
		<td width="200" height="50"><p3>Año: </p3><?php echo $libro['año'] ?></td>
         <td width="200" height="50"><p3>Editorial: </p3><?php echo $params3['nombre'] ?></td>
     </tr>
     
     <tr>
     	<td width="200" height="50"><p3>Pais: </p3><?php echo $params3['pais']?></td>
     	<td width="200" height="50"><p3>ISBN: </p3><?php echo $libro['isbn']?></td>
     </tr>
     <tr>
         <td width="200" height="50"><p3>Paginas: </p3><?php echo $libro['paginas']?></td>
     </tr>
     <tr>
         <td colspan="2" width="200" height="50"><p3>Descripcion: </p3><?php echo $libro['descripcion']?></td>
       

     </tr>
     
	<tr>
         <td colspan="2" width="200" height="50"><p3>Cantidad de ejemplares disponibles: </p3><?php echo $libro['cantidad']?></td>
     </tr>
    <tr>
         <td colspan="2" width="200" height="50"><p3>Precio: </p3><b><i><u>$<?php echo $libro['precio']?></u></i></b></td>
     </tr>     
 </table>
 <form id="spin">
        <label for="cantidad">
            <p3>Cantidad de ejemplares</p3>
            <input type="number" name="ejemplares" id="ejemplares"
                min="1" max="20" step="1" value="1">
        </label>
        <input type="button" value="Añadir al carrito" >
    </form>
 
 </fieldset>
 


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>