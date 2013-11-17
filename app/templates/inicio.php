<?php ob_start() ?>
<h1>RECOMENDACIONES</h1>
<?php foreach ($params['datos'] as $dato) :?>
<div class="thumbnail">
<img src="img/<?php echo $dato['foto'] ?>" width="100" style="float:left;"> <p><?php echo $dato['titulo'] ?></p><br /><p>$<?php echo $dato['precio'] ?></p>
</div>
<?php endforeach; ?>

 <?php $contenido = ob_get_clean() ?>
	
 <?php include 'layout.php' ?>