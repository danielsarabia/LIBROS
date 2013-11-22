<?php ob_start() ?>
 <h1>NOTA DE VENTA</h1>	
 <?php $total = 0;?>			
 <table id="carrito">
 <th>TÍTULO</th>
 <th>PRECIO</th>
 <th>CANTIDAD</th>
 <th>TOTAL</th>
 <?php if ($result !=0) :?>
 	 <?php foreach ($result as $dato) :?>
		<tr>
        <td><?php echo $dato['titulo']?></td>
        <td>$<?php echo $dato['precio']?></td>
        <td><?php echo $dato['cantidad']?></td>
        <td>$<?php echo $dato['total']?></td>
        </tr>
		<?php $total = $total + $dato['total'];?>

	<?php endforeach; ?>
	<tr> <td class="nada"></td><td class="nada"></td>
<td class="total">TOTAL:</td> <td>$<?php echo $total?></td>
</tr>

<?php endif; ?>
</table>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>