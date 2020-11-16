<?php  
 include "include/paginacion.php"; 
 $consulta = "SELECT * FROM temasobligaciones as a  ORDER BY idtemaobligaciones";
 include "include/genera_consulta.php"; 
 include "include/conv_fecha.php"; 
?>
 
<script language="JavaScript">
function confirmar(url){
if (!confirm("�Est� seguro de que desea eliminar el registro?")) {
return false;
}
else {
document.location= url;
return true;
}
}
</script>

<table width="456" align="center" class="tabla" id="tabla">
	<thead>
		<tr>
		  <th width="151"><b>Tema Obligaci&oacute;n</b></td>
          <th width="150">Acciones</td>
		</tr>
	</thead>
	<tbody>
		<?php  while ($row = mysql_fetch_array($result)){ ?>
		<tr>
		  <td align="left"><?php  echo $row['temaobligacion']; ?></td>
		  <td align="center">
          <a href="temaobl.php?id=<?php  echo $row['idtemaobligaciones']; ?>&accion=editar" rel="gb_page_fs[]">Editar</a> &nbsp;
          <a href="javascript:;" onclick="confirmar('temaobl_principal.php?id=<?php  echo $row['idtemaobligaciones']; ?>&accion=eliminar&url=<?php  echo $_SERVER['REQUEST_URI'] ?>'); return false;">Eliminar</a>
          </td>
		</tr>
		<?php  } ?>

        
	</tbody>
</table>
<div align="center">
<?php  
include "include/muestra_paginacion.php"; 
 

$filtro_tabla = $_GET['filtro'];

if ($filtro_tabla == 1) {  
echo " <a href='" . $_SERVER['REQUEST_URI'] . "&filtro=0'> Ocultar filtro</a>"; ?>

<script>	
		$(document).ready(function() {
		$('table#tabla').columnFilters();
	});
</script>

<?php  } else {
	
	echo " <a href='" . $_SERVER['REQUEST_URI'] . "&filtro=1'> Mostrar filtro</a>";

}

?>
 
<br />

<a href="temaobl.php?accion=agregar" title="Agregar" rel="gb_page_fs[]"><br />
Agregar nuevo</a>

 </div> 
