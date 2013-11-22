<?php ob_start() ?>
 <h1>HISTORIAL DE COMPRA</h1>			
 <table id="carrito">
 <th>FECHA</th>
 <th>TOTAL</th>
 <th class="nada"></th>
 <?php if ($result !=0) :?>
 	 <?php foreach ($result as $dato) :?>
		<tr>
        <td><?php echo $dato['fecha']?></td>
        <td>$<?php echo $dato['total']?></td>
        <td class="nada2"><form method="post" action="index.php?ctl=verNota"><input type="hidden" name="id_carrito" value="<?php echo $dato['id_carrito']?>"><input type="hidden" name="id" value="<?php echo $dato['id']?>"> <input type="submit" class="botonMas" value=""></form></td>
        </tr>

	<?php endforeach; ?>

<?php endif; ?>
</table>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>