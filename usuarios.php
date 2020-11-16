<?php  
 include "include/paginacion.php"; 
 $consulta = "SELECT a.id,a.nombre,a.apaterno,a.login,a.fechainicio,a.fechatermino,a.tipousuario  FROM usuarios as a ORDER BY a.apaterno";
 include "include/genera_consulta.php"; 
 include "include/conv_fecha.php"; 
?>
 
<script language="JavaScript">
function confirmar(url){
if (!confirm("Esta seguro de que desea eliminar el registro?")) {
return false;
}
else {
document.location= url;
return true;
}
}
</script>

<table align="center" class="tabla" id="tabla">
	<thead>
		<tr>
		  <th><b>Nombres</b></td>
          <th><b>Apellidos</b></td>
          <th><b>Tipo de usuario</b></td>
          <th><b>Usuario</b></td>
<!--
          <th><b>Fecha Inicio</b></td>
          <th><b>Fecha T&eacute;rmino</b></td>
-->

			<th>Acciones</td>
		</tr>
	</thead>
	<tbody>
		<?php  while ($row = mysql_fetch_array($result)){
		  

          ?>
		<tr>
		  <td align="left"><?php  echo $row['nombre']; ?></td>
		  <td align="left"><?php  echo $row['apaterno']; ?></td>
          
<?php 

          if ($row['tipousuario'] == 0){$tipousuario = "Usuario";}
          if ($row['tipousuario'] == 1){$tipousuario = "Supervisor";}
          if ($row['tipousuario'] == 2){$tipousuario = "Administrador";}

?>
		  <td align="left"><?php  echo $tipousuario; ?></td>
		  <td align="left"><?php  echo $row['login']; ?></td>
<!--
		  <td align="center"><?php  echo fecha_normal($row['fechainicio']); ?></td>
		  <td align="center"><?php  echo fecha_normal($row['fechatermino']); ?></td>
-->
          <td align="center"><a href="usuario.php?accion=editar&id=<?php  echo $row['id']; ?>&idempresa=<?php  echo $row['idempresa']; ?>" rel="gb_page_fs[]">Editar</a> &nbsp;<a href="javascript:;" onclick="confirmar('usuario_principal.php?id=<?php  echo $row['id']; ?>&accion=eliminar&url=<?php  echo $_SERVER['REQUEST_URI'] ?>'); return false;">Eliminar</a></td>
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
<a href="usuario.php?accion=agregar" title="Agregar" rel="gb_page_fs[]"><br />
Agregar nuevo</a> </div>
