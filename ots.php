<?php  
 include "include/paginacion.php"; 

 $idusuario = $_SESSION["idusuario"];
 if ($_SESSION["tipousuario"] == 0 || $_SESSION["tipousuario"] == 1)
{
    $consulta = "SELECT * FROM ots as a, empresas as b, usuarios as c, usuariosempresas as d WHERE b.idempresa = d.idempresa AND c.id = d.idusuario AND a.idempresa = b.idempresa AND a.idusuario = c.id AND d.idempresa IN (SELECT idempresa FROM usuariosempresas WHERE idusuario = $idusuario) ORDER BY a.idot DESC";
    //echo $consulta;
}
else
{
 $consulta = "SELECT * FROM ots as a, empresas as b, usuarios as c WHERE a.idempresa = b.idempresa AND a.idusuario = c.id ORDER BY a.idot DESC";   
}
 
 //echo $consulta;
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
<!--
<div align="right"><a href='logout.php'>Cerrar sesi&oacute;n</a>&nbsp;&nbsp;&nbsp;</div>
-->
<?php 
if ($_SESSION["tipousuario"] == 0)
{ ?>

<br />

<a href="ot.php?accion=agregar&us=<?php  echo $idusuario; ?>" title="Agregar" rel="gb_page_fs[]">Agregar nuevo</a>

<br />
<br />


<?php 
} ?>


<table width="800" align="center" class="tabla" id="tabla">
	<thead>
		<tr>
		  <th ><b>Nro. OT</b></td>
          <th ><b>Empresa</b></td>
          <th ><b>Usuario</b></td>
          <th ><b>Fecha creaci&oacute;n</b></td>
          <th width="150">Acciones</td>
		</tr>
	</thead>
	<tbody>
		<?php  while ($row = mysql_fetch_array($result)){ ?>
		<tr>
		  <td align="center"><a href="ot.php?id=<?php  echo $row['idot']; ?>&accion=editar&us=<?php  echo $idusuario; ?>" rel="gb_page_fs[]" title="Orden de Trabajo Nro<?php  echo $row['idot']; ?><?php echo $row['idot']; ?></a></td>
          <td align="center"><?php  echo $row['nombreempresa']; ?></td>
		  <td align="center"><?php  echo $row['login']; ?></td>
          <td align="center"><?php  echo fecha_normal($row['fechacreacionot']); ?></td>
          <td align="center">
          <a href="ot.php?id=<?php  echo $row['idot']; ?>&accion=editar&us=<?php  echo $idusuario; ?>" rel="gb_page_fs[]" title="Orden de Trabajo Nro<?php  echo $row['idot']; ?>">Editar</a> &nbsp;
<!--
          <a href="javascript:;" onclick="confirmar('ot_principal.php?id=<?php  echo $row['idot']; ?>&accion=eliminar&url=<?php  echo $_SERVER['REQUEST_URI'] ?>'); return false;">Eliminar</a>
-->
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
 


 </div> 
