<?php ob_start() ?>
 <h1>CARRITO ACTUAL</h1>	
 <?php $total = 0;?>			
 <table id="carrito">
 <th>TÍTULO</th>
 <th>PRECIO</th>
 <th>CANTIDAD</th>
 <th>TOTAL</th>
 <th class="nada"></th>
 <?php if ($result !=0) :?>
 	 <?php foreach ($result as $dato) :?>
		<tr>
        <td><?php echo $dato['titulo']?></td>
        <td>$<?php echo $dato['precio']?></td>
        <td><?php echo $dato['cantidad']?></td>
        <td>$<?php echo $dato['total']?></td>
        <td class="nada2"><form method="post" action="index.php?ctl=eliminar"><input type="hidden" name="id_carrito" value="<?php echo $dato['id_carrito']?>"><input type="hidden" name="id_libro" value="<?php echo $dato['id_libro']?>"> <input type="submit" class="botonEliminar" value=""></form></td>
        </tr>
		<?php $total = $total + $dato['total'];?>

	<?php endforeach; ?>
	<tr> <td class="nada"></td><td class="nada"></td>
<td class="total">TOTAL:</td> <td>$<?php echo $total?></td>
</tr>

<tr> <td class="nada"></td><td class="nada"></td><td class="nada"></td>
<td class="nada"><form method="post">
<input type="submit" value="Comprar" class="botonSubmit">
</form></td>
</tr>
<?php endif; ?>
</table>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>