<? 

$idfilial = $_GET['idfilial'];

if ($idfilial <> "")
{

$consultafilial = "WHERE EXISTS 
(SELECT * 
FROM actividadesfiliales 
WHERE procesos.idactividad = actividadesfiliales.idactividad 
AND actividadesfiliales.idfilial = $idfilial)";
}



// include "include/paginacion.php"; 
 //$consulta = "SELECT a.* FROM procesos as a ORDER BY posicion_proc";
$consulta = "
SELECT * 
FROM procesos 
$consultafilial
ORDER BY procesos.idactpadre_proc, procesos.nivel_proc
";

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


 Mostrar procesos correspondientes a la filial:   <select name="idfilial" onChange="top.location.href = 'index.php?p=procesos&idfilial='+this.value;" >
   

       
	<?php
			$resultado = mysql_query("
			SELECT a.idfilial, a.nombrefilial, b.nombreempresa
			FROM filiales as a, empresas as b
			WHERE a.idempresa = b.idempresa
			ORDER BY nombreempresa, nombrefilial", $link); 
			$pos = 0;
			unset($datos);
			$datos = array(); 
	  		while ($row = mysql_fetch_array($resultado)){ 
				$datos[$pos] = $row['nombreempresa']." / ".$row['nombrefilial'];
				$ids[$pos] = $row['idfilial'];

				$pos = $pos + 1;
			} 
			$seleccionado = $_GET['idfilial'];
			   include('include/combobox_mysql.php');
    ?>
	</select>

<br>
<br>
<table align="center" class="tabla" id="tabla">
	<thead>
		<tr>
		  <th><b>Proceso</b></td>
          <th>Nombre largo          
          <th><b>Proceso Padre</b></td>
          <th><b>Posición</b></td>
          <th><b>Nivel</b></td>
          <th>Acciones</td>
		</tr>
	</thead>
	<tbody>
		<? while ($row = mysql_fetch_array($result)){ ?>
		<tr>
		  <td align="left">
		  <a href="proceso.php?id=<? echo $row['idactividad']; ?>&accion=editar" rel="gb_page_fs[]">
		  <? if($row['nivel_proc'] == 1 ) { echo "<strong>";} else { echo "&nbsp;&nbsp;&nbsp;&nbsp;"; }  
		  echo $row['nombre_proc'];
          if($row['nivel_proc'] == 1 ) { echo "<strong>";}
		  ?>
		  </a>
          </td>
		  <td align="left"><? if($row['nivel_proc'] == 1 ) { echo "<strong>";} else { echo "&nbsp;&nbsp;&nbsp;&nbsp;"; }
		  echo $row['nombre_largo_proc']; if($row['nivel_proc'] == 1 ) { echo "<strong>";}?></td>
		  <td align="left"><?
		$idprocpadre = $row['idactpadre_proc'];
		 if( $row['nivel_proc'] == 1)
				  {
					  $idprocpadre = "";
				  }
  		$consulta = mysql_query("SELECT * FROM procesos WHERE idactividad='$idprocpadre'", $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);

		  echo $fila['nombre_proc']; ?></td>
		  <td align="center"><? echo $row['posicion_proc']; ?></td>
		  <td align="center"><? echo $row['nivel_proc']; ?></td>
		  <td align="center"><a href="proceso.php?id=<? echo $row['idactividad']; ?>&accion=editar" rel="gb_page_fs[]">Editar</a> &nbsp;<a href="javascript:;" onclick="confirmar('proceso_principal.php?id=<? echo $row['idactividad']; ?>&accion=eliminar&url=<? echo $_SERVER['REQUEST_URI'] ?>'); return false;">Eliminar</a></td>
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
<? if ($_SESSION["tipousuario"] == 1)
{ ?>
<a href="proceso.php?accion=agregar" title="Agregar" rel="gb_page_fs[]"><br />
Agregar nuevo</a>
<? } ?>
 </div>
