<?php  
 include "include/paginacion.php"; 
 
 $consulta = "SELECT Nombre,apaterno as 'Apellidos', login as 'Usuario' FROM usuarios";
 
 include "include/genera_consulta.php";
?> 
 <table id="tabla">
<thead>
<tr>
<td><b>Nombre</b></td>
</tr>
</thead>
<tbody>
<tr>
<td> <?php  echo $row[0]; ?> </td>
</tr>
</tbody>
</table>

<?php  
 include "include/muestra_paginacion.php"; 
 
 echo " <a href='" . $_SERVER['REQUEST_URI'] . "&filtro=1'> Mostrar filtro</a>";


$filtro_tabla = $_GET['filtro'];

if ($filtro_tabla == 1) {  ?>

<script>	
		$(document).ready(function() {
		$('table#tabla').columnFilters();
	});
</script>

<?php  } ?>
 
