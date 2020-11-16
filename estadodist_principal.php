<?php 
ob_start();
$accion=$_GET['accion'];
$id=$_GET['id'];
$borrar_pagina = 0;
$nombretabla = 'estadodist';
include("include/config.php");
include("include/conv_fecha.php");


if ($accion == 'eliminar') 
	{ 
    	echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
		mysql_query("DELETE FROM estadosdist WHERE idestadodist='$id'",$link); 
		header('Location: '.$_GET['url']);
	}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
include("login/config.php"); 

$nombreestadodist = $_POST['nombreestadodist'];



$link=mysql_connect($server,$dbuser,$dbpass);


if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "agregar")) {
echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
$query  =   
"INSERT INTO estadosdist (
								    nombreestadodist
								  ) VALUES (
 								'$nombreestadodist' 
								)";

$result=mysql_db_query($database,$query,$link) or die("Error en consulta <br>MySQL dice: ".mysql_error());;

if(mysql_affected_rows()){
	echo "Estado de distribuci&oacute;n creado correctamente <br> <br> ";
	//echo $fechainicio." ".$fechatermino;
	$borrar_pagina = 1;
	} 
else {
		echo "Error al crear nuevo registro. <br> <br> <a href='javascript: void(0)'>Volver</a>";
	} /* Cierre del else */

}
} 
 
 
if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "editar")) {
	echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
	//echo "editando";
	$id=$_POST["id"];
	$borrar_pagina = 1;
	$update = 
	"UPDATE estadosdist
				SET 
					nombreestadodist= '$nombreestadodist'
				WHERE 
					idestadodist='$id'";
	$Result1 = mysql_query($update, $link) or die(mysql_error());
	echo "Datos actualizados.<br><br>";
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

<!--<script type="text/javascript" src="script/editor/nicEdit.js"></script> 
<script type="text/javascript"> 
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script> 
-->

<?php  include_once('include/js_editor.php'); ?> 


</head>


<body>


<?php  if ($accion == 'editar') 
	{ 
		$id=$_GET['id'];
		$consulta = mysql_query("SELECT * FROM estadosdist WHERE idestadodist='$id'", $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);
		//echo "la estadodist es ". $fila['tituloestadodist'];
	}
?>
<br>
<br>
<form action="estadodist_principal.php" method="POST" id="form1">
<table width="72%" border="0" id="tabla" class="tabla" align="center">
<tbody>
  <tr>
    <td width="21%" align="left">Estado de distribuc&oacute;n</td>
    <td width="79%" align="left"><input name="nombreestadodist" type="text" class="validate[required]" id="nombreestadodist" value="<?php  echo $fila['nombreestadodist']; ?>" size="100"></td>
    </tr>
  </tbody>
  </table>

    <p>
      <input name="Crear" type="submit" value="Enviar">
    </p>
    <p>
      <input type="hidden" name="MM_insert" value="form1">
      <input type="hidden" name="accionform" value="<?php  echo $accion ?>">
      <input type="hidden" name="id" value="<?php  echo $id ?>">


  </p>
</form>
</body>
</html>
<?php  } ?>