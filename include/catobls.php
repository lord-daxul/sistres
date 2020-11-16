<?php  
 include "include/paginacion.php"; 
 $consulta = "SELECT * FROM categoriasobl as a  ORDER BY idcategoriasobl";
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
		  <th width="151"><b>T&iacute;tulo categoriasobl</b></td>
          <th width="139">N&uacute;mero</th>          
          <th width="150">Acciones</td>
		</tr>
	</thead>
	<tbody>
		<?php  while ($row = mysql_fetch_array($result)){ ?>
		<tr>
		  <td align="left"><?php  echo $row['titulo_categoriasobl']; ?></td>
		  <td align="left"><?php  echo $row['ncategoriasobl']; ?></td>
		  <td align="center">
          <a href="categoriasobl.php?id=<?php  echo $row['idcategoriasobl']; ?>&accion=editar" rel="gb_page_fs[]">Editar</a> &nbsp;
          <a href="javascript:;" onclick="confirmar('categoriasobl_principal.php?id=<?php  echo $row['idcategoriasobl']; ?>&accion=eliminar&url=<?php  echo $_SERVER['REQUEST_URI'] ?>'); return false;">Eliminar</a>
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

<a href="categoriasobl.php?accion=agregar" title="Agregar" rel="gb_page_fs[]"><br />
Agregar nuevo</a>

 </div> 
