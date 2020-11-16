<? 
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
if (!confirm("¿Está seguro de que desea eliminar el registro?")) {
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
<?
if ($_SESSION["tipousuario"] == 0)
{ ?>

<br />

<a href="ot.php?accion=agregar&us=<? echo $idusuario; ?>" title="Agregar" rel="gb_page_fs[]">Agregar nuevo</a>

<br />
<br />


<?
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
		<? while ($row = mysql_fetch_array($result)){ ?>
		<tr>
		  <td align="center"><a href="ot.php?id=<? echo $row['idot']; ?>&accion=editar&us=<? echo $idusuario; ?>" rel="gb_page_fs[]" title="Órden de Trabajo Nro. <? echo $row['idot']; ?>"><? echo $row['idot']; ?></a></td>
          <td align="center"><? echo $row['nombreempresa']; ?></td>
		  <td align="center"><? echo $row['login']; ?></td>
          <td align="center"><? echo fecha_normal($row['fechacreacionot']); ?></td>
          <td align="center">
          <a href="ot.php?id=<? echo $row['idot']; ?>&accion=editar&us=<? echo $idusuario; ?>" rel="gb_page_fs[]" title="Órden de Trabajo Nro. <? echo $row['idot']; ?>">Editar</a> &nbsp;
<!--
          <a href="javascript:;" onclick="confirmar('ot_principal.php?id=<? echo $row['idot']; ?>&accion=eliminar&url=<? echo $_SERVER['REQUEST_URI'] ?>'); return false;">Eliminar</a>
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
 


 </div> 
