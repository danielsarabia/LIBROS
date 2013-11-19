<?php ob_start() ?>
 <h1>CARRITO ACTUAL</h1>				
 <table>
 	 <?php foreach ($result as $dato) :?>
		<tr>
        <td><?php echo $dato['titulo']?></td>
        <td><?php echo $dato['precio']?></td>
        <td><?php echo $dato['cantidad']?></td>
        <td><?php echo $dato['total']?></td>
        </tr>
		

	<?php endforeach; ?>
	</table>


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>