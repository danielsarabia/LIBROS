<?php ob_start() ?>
<h1>RESULTADOS DE LA BUSQUEDA</h1>
      <?php if (count($params['resultado'])>0): ?>
      <?php foreach ($params['resultado'] as $dato) :?>
<div class="thumbnail">
<img src="img/<?php echo $dato['foto'] ?>" width="100" style="float:left;"> <a href="index.php?ctl=ver&id=<?php echo $dato['id']?>"><?php echo $dato['titulo'] ?></p><br /><p>$<?php echo $dato['precio'] ?></p>
</div>
<?php endforeach; ?>
      

 
      <?php endif; ?>

      <?php $contenido = ob_get_clean() ?>

      <?php include 'layout.php' ?>