<?php 
ob_start();
$accion=$_GET['accion'];
$id=$_GET['id'];
$borrar_pagina = 0;
$nombretabla = 'empresas';
include("include/config.php");
include("include/conv_fecha.php");


if ($accion == 'eliminar') 
	{ 
    	echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
		mysql_query("DELETE FROM empresas WHERE idempresa='$id'",$link); 
		header('Location: '.$_GET['url']);
	}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
include("login/config.php"); 

$nombreempresa = htmlspecialchars(trim($_POST['nombreempresa']));
$rutempresa = htmlspecialchars(trim($_POST['rutempresa']));
$contratoempresa = htmlspecialchars(trim($_POST['contratoempresa']));
$fechainicio = fecha_mysql($_POST['fecha1']);
$fechatermino = fecha_mysql($_POST['fecha2']);
$fechatablaproceso = fecha_mysql($_POST['fecha3']);
$idpais = $_POST['idpais'];
$vecumplimientos = $_POST['vecumplimientos'];
//echo $vecumplimientos;

$link=mysql_connect($server,$dbuser,$dbpass);


if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "agregar")) {
echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
//$query = sprintf("SELECT login FROM usuarios WHERE usuarios.login='%s'",  // Ahora
//	   mysql_real_escape_string($login)); 
//$result=mysql_db_query($database,$query,$link);

//if(mysql_num_rows($result)){
//  		echo "El usuario ya existe. <br> <br> <a href='javascript:history.back()'>Volver</a>";
//	} 
//else {
//mysql_free_result($result);
//$pass1=sha1(md5($pass1)); // Ahora
$query  =  "INSERT INTO empresas (
								  nombreempresa, 
								  rutempresa
								  ) VALUES (
 								'$nombreempresa', 
								'$rutempresa')";

$result=mysql_db_query($database,$query,$link) or die("Error en consulta <br>MySQL dice: ".mysql_error());;

if(mysql_affected_rows()){
	echo "Empresa creada correctamente <br>";
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
	$update = "UPDATE empresas SET nombreempresa='$nombreempresa', rutempresa='$rutempresa' WHERE idempresa='$id'";
	$Result1 = mysql_query($update, $link) or die(mysql_error());
	echo "Datos actualizados.<br>";
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

		$("#fecha3").datepicker({changeYear: true});
		$("#fecha3").change(function() { $('#fecha3').datepicker('option', {dateFormat: 'dd/mm/yy'}); });

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

</head>


<body>


<?php  if ($accion == 'editar') 
	{ 
		$id=$_GET['id'];
		$consulta = mysql_query("SELECT * FROM empresas WHERE idempresa='$id'", $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);
	}
?>
<br>
<form action="empresa_principal.php" method="POST" id="form1">
<table width="60%" border="0" id="tabla" class="tabla" align="center">
<tbody>
  <tr>
    <td width="36%" align="left">Nombre Empresa</td>
    <td width="64%" align="left"><input type="text" name="nombreempresa" class="validate[required]" value="<?php  echo $fila['nombreempresa']; ?>" id="1"></td>
  </tr>
  <tr>
    <td align="left">Rut</td>
    <td align="left"><input type="text" name="rutempresa" class="validate[required]" value="<?php  echo $fila['rutempresa']; ?>" ></td>
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