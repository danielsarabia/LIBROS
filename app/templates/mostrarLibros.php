<?php ob_start() ?>
<?php foreach ($params['libros'] as $dato) :?>
<div class="thumbnail">
<img src="img/<?php echo $dato['foto'] ?>" width="100" style="float:left;"> <a href="index.php?ctl=ver&id=<?php echo $dato['id']?>"><?php echo $dato['titulo'] ?></a><br /><p>$<?php echo $dato['precio'] ?></p>
</div>
<?php endforeach; ?>
 


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>