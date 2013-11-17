<?php ob_start() ?>

 <table>
     <tr>
         <th>Titulo</th>
     </tr>
     <?php foreach ($params['libros'] as $libro) :?>
     <tr>
         <td><a href="index.php?ctl=ver&id=<?php echo $libro['id']?>">
                 <?php echo $libro['titulo'] ?></a></td>
     </tr>
     <?php endforeach; ?>

 </table>


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>