<? 
 include "include/paginacion.php"; 
 $consulta = "SELECT * FROM estadosdist as a  ORDER BY nombreestadodist";
 include "include/genera_consulta.php"; 
 include "include/conv_fecha.php"; 
?>
 
<script language="JavaScript">
function confirmar(url){
if (!confirm("¿Está seguro de que desea eliminar el registro?")) {
return false;
}
else {
document.location= url;
return true;
}
}
</script>

<table width="500" align="center" class="tabla" id="tabla">
	<thead>
		<tr>
		  <th width="151"><b>Estados de distribución</b><th width="150">Acciones</td>
		</tr>
	</thead>
	<tbody>
		<? while ($row = mysql_fetch_array($result)){ ?>
		<tr>
		  <td align="left"><? echo $row['nombreestadodist']; ?></td>
		  <td align="center">
          <a href="estadodist.php?id=<? echo $row['idestadodist']; ?>&accion=editar" rel="gb_page_fs[]">Editar</a> &nbsp;
          <!--
<a href="javascript:;" onclick="confirmar('estadodist_principal.php?id=<? echo $row['idestadodist']; ?>&accion=eliminar&url=<? echo $_SERVER['REQUEST_URI'] ?>'); return false;">Eliminar</a>
-->
          </td>
		</tr>
		<? } ?>

        
	</tbody>
</table>
<div align="center">
<? 
include "include/muestra_paginacion.php"; 
 

$filtro_tabla = $_GET['filtro'];

if ($filtro_tabla == 1) {  
echo " <a href='" . $_SERVER['REQUEST_URI'] . "&filtro=0'> Ocultar filtro</a>"; ?>

<script>	
		$(document).ready(function() {
		$('table#tabla').columnFilters();
	});
</script>

<? } else {
	
	echo " <a href='" . $_SERVER['REQUEST_URI'] . "&filtro=1'> Mostrar filtro</a>";

}

?>
 
<br />

<a href="estadodist.php?accion=agregar" title="Agregar" rel="gb_page_fs[]"><br />
Agregar nuevo</a>

 </div> 
