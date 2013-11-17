<?php ob_start() ?>

 <h1><?php echo $params['titulo'] ?></h1>
 <table border="1">

     <tr>
         <td>Año</td>
         <td><?php echo $libro['año'] ?></td>

     </tr>
     <tr>
         <td>ISBN</td>
         <td><?php echo $libro['isbn']?></td>

     </tr>
     <tr>
         <td>Cantidad</td>
         <td><?php echo $libro['precio']?></td>

     </tr>
     <tr>
         <td>Descripcion</td>
         <td><?php echo $libro['descripcion']?></td>

     </tr>
     <tr>
         <td>Id</td>
         <td><?php echo $libro['id']?></td>

     </tr>
	<tr>
         <td>Paginas</td>
         <td><?php echo $libro['paginas']?></td>

     </tr>
 </table>


 <?php $contenido = ob_get_clean() ?>

 <?php include 'layout.php' ?>