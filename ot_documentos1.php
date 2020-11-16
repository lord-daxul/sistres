<?php 
include("include/config.php");
include("include/conv_fecha.php");
$accion=$_GET['accion'];
$id=$_GET['id'];
$idnorma=$_GET['idnorma'];
$idobligacion=$_GET['idobligacion'];
$idobligacionobligacion=$_GET['idobligacionobligacion'];
$idempresa=$_GET['idempresa'];
$eliminar=$_GET['eliminar'];
$idusuario=$_GET['us'];
$borrar_pagina = 0;


if ($eliminar == 'eliminar') 
	{ 
		
    	//echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
		//echo "DELETE FROM articulosobligaciones WHERE idobligacionobligacion='$idobligacionobligacion'";
	
		mysql_query("DELETE FROM articulosobligaciones WHERE idobligacionobligacion='$idobligacionobligacion'",$link); 
		//echo "listo";
		//header('Location: '.$PHP_SELF);
	}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
include("login/config.php"); 


$idfiliales = $_POST['idfiliales'];
$id = $_POST['id'];
$idempresaobligacion = $_POST['idempresaobligacion'];
 

//$valores = implode(', ', $idfiliales_aux);
//$sql_valores = "(" .$valores. ")";
 
//echo "<br> los valores son : ". implode(',',$idfiliales);



$link=mysql_connect($server,$dbuser,$dbpass);





if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "agregar")) {
echo '<link href="estilos.css" type="text/css" rel="stylesheet">';



if(mysql_affected_rows()){
	//echo "obligacion creado correctamente <br>";
	//echo $fechainicio." ".$fechatermino;
	$borrar_pagina = 1;
	} 
else {
		//echo "Error introduciendo el obligacion. <br> <br> <a href='javascript: void(0)'>Volver</a>";
	} /* Cierre del else */

}
} 
//} 

if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "editar")) {
	include 'include/upload.php';
	$query = "INSERT INTO articulosobligaciones (idnorma, nombrearticuloobligacion) VALUES (".$id.",'". $nombre_articulo."');";

	$result=mysql_db_query($database,$query,$link);

    


	if(mysql_affected_rows()){
		$ok =1;
		$borrar_pagina = 1;
}



	
	
	

echo '<link href="estilos.css" type="text/css" rel="stylesheet">';

if(mysql_affected_rows()){
	$borrar_pagina = 1;
	} 
else {
		echo "Error introduciendo el obligacion. <br> <br> <a href='javascript: void(0)'>Volver</a>";
	} /* Cierre del else */

}
if ($borrar_pagina == 0)
 {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
--><title>Documento sin título</title>
<link href="estilos.css" type="text/css" rel="stylesheet">
<script type='text/javascript' src='script/menu/src/assets/jquery.js'></script>
<link type="text/css" href="script/calendar/css/redmond/jquery-ui-1.7.2.custom.css" rel="Stylesheet" />	
<script type="text/javascript" src="script/calendar/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="script/calendar/js/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript"> 
	$(function() {
		$("#fecha1").datepicker({changeYear: true});
		$("#fecha1").change(function() { $('#fecha1').datepicker('option', {dateFormat: 'dd/mm/yy'}); });

		$("#fecha2").datepicker({changeYear: true});
		$("#fecha2").change(function() { $('#fecha2').datepicker('option', {dateFormat: 'dd/mm/yy'}); });


	});
	</script> 
<link rel="stylesheet" href="script/validation/css/validationEngine.jquery.css" type="text/css" media="screen" charset="utf-8" />
<script src="script/validation/js/jquery.js" type="text/javascript"></script>
<script src="script/validation/js/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="script/validation/js/jquery.validationEngine.js" type="text/javascript"></script>
<script type="text/javascript"> 

$(document).ready(function() {
 $("#form1").validationEngine()
})
</script> 

<link rel="stylesheet" type="text/css" href="script/asmselect/jquery.asmselect.css"/>
<script src="script/asmselect/jquery.asmselect.js" type="text/javascript"></script>
<script type="text/javascript" src="script/asmselect/jquery.ui.js"></script>
	<script type="text/javascript">

		$(document).ready(function() {
			$("select[multiple]").asmSelect({
				addItemTarget: 'bottom',
				animate: true,
				highlight: true,
				sortable: true
			});
			
		}); 

	</script>

<script language="JavaScript" src="script/columnfilters/jquery.columnfilters.js"></script> 

</head>


<body>


<br>


  <?php  //include "articulo_principal.php" ?>
    <p>
      <input type="hidden" name="MM_insert" value="form1">
      <input type="hidden" name="accionform" value="<?php  echo $accion ?>">
      <input type="hidden" name="id" value="<?php  echo $id ?>">
      <input type="hidden" name="idempresaobligacion" value="<?php  echo $idempresaobligacion ?>">


  </p>
    <p>
      <?php  
 //include "include/paginacion.php"; 
 $consulta = "SELECT * FROM otsdocumentos AS a, estadosot AS b, estadosdist as c WHERE a.idestadodist =c.idestadodist AND a.idestadoot = b.idestadoots AND idot = $id";
 //echo $consulta;
$result = mysql_query($consulta,$link);

function formato_rut( $rut ) {
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}

//echo $consulta;
// include "include/genera_consulta.php"; 
?>
      <script language="JavaScript" type="text/javascript">
function confirmar(url){
if (!confirm("Seguro de eliminar el archivo? NO SE PODRA VOLVER A RECUPERAR !!!")) {
return false;
}
else {
document.location= url;
return true;
}
}
      </script>
    </p>
    
    <?php 

		$consulta_usuario = mysql_query("SELECT * FROM usuarios WHERE id='$idusuario'", $link) or die(mysql_error());
		$fila_usuario = mysql_fetch_assoc($consulta_usuario);

//echo "SELECT * FROM usuarios WHERE id='$idusuario'";
if ($fila_usuario["tipousuario"] == 0)
{ 


?>
    
    <a href="ot_documento1_principal.php?accion=agregar&idot=<?php  echo $id ?>&us=<?php  echo $idusuario; ?>" title="Agregar" rel="gb_page_fs[]">Agregar nuevo</a><br /><br />
 
<?php  } ?>
    
    <table align="center" class="tabla" id="tabla2">
      <thead>
        <tr>
          <th>Estado Gesti&oacute;n</th>
          <th>Estado Distribuci&oacute;n</th>
          <th>Rut</th>
          <th>Documento</th>
          <th>Archivo</th>
          <th>Acciones
            </td>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php  while ($row = mysql_fetch_array($result)){ ?>
        <tr>
          <td align="center"><?php  echo $row['nombreestadoots']; ?></td>
          <td align="center"><?php  echo $row['nombreestadodist']; ?></td>
          <td align="center"><?php  if ($row['rutdocot'] == 0) {} else {echo formato_rut($row['rutdocot']);} ?></td>
          <td align="center"><?php  echo $row['facturadocot']; ?></td>
          <td align="center">
           <a href="archivos/<?php  echo $row['urldocumento']; ?>" target="_blank"> <?php  echo $row['urldocumento']; ?> </a>
          </td>
          <td align="center">
          
<a href="ot_documento1_principal.php?id=<?php  echo $row['iddocot']; ?>&accion=editar&us=<?php  echo $idusuario; ?>" rel="gb_page_fs[]">Editar</a>
<!--
<a href="javascript:;" onclick="confirmar('ot_documento1_principal.php?id=<?php  echo $row['idot']; ?>&urldocumentoeliminar=<?php  echo $row['urldocumento']; ?>&id=<?php  echo $id; ?>&accion=eliminar&url=<?php  echo $_SERVER['REQUEST_URI'] ?>'); return false;">Eliminar</a>
-->          
          
          
          </td>
        </tr>
        <?php  } ?>
      </tbody>
    </table>
<script>	
		$(document).ready(function() {
		$('table#tabla2').columnFilters();
	});
</script>
</div>
</body>
</html>
<?php  } ?>
