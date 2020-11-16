<?php 
ob_start();
$accion=$_GET['accion'];
$id=$_GET['id'];
$borrar_pagina = 0;
include("include/config.php");
include("include/conv_fecha.php");



if ($accion == 'eliminar') 
	{ 
    	echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
		mysql_query("DELETE FROM usuarios WHERE id='$id'",$link); 
		header('Location: '.$_GET['url']);
	}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
include("login/config.php"); 

$login = htmlspecialchars(trim($_POST['login']));
$pass1 = trim($_POST['pass1']);
$pass2 = trim($_POST['pass2']);
$nombre = htmlspecialchars(trim($_POST['nombre']));
$apaterno = htmlspecialchars(trim($_POST['apaterno']));
$contrato = htmlspecialchars(trim($_POST['contrato']));
$email = htmlspecialchars(trim($_POST['email']));
$fechainicio = fecha_mysql($_POST['fecha1']);
$fechatermino = fecha_mysql($_POST['fecha2']);
$tipousuario = htmlspecialchars(trim($_POST['tipousuario']));
$visibilidad = htmlspecialchars(trim($_POST['visibilidad']));
$idempresa = htmlspecialchars(trim($_POST['idempresa']));
$vecumplimientos = $_POST['vecumplimientos'];


$link=mysql_connect($server,$dbuser,$dbpass);


if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "agregar")) {
echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
$query = sprintf("SELECT login FROM usuarios WHERE usuarios.login='%s'",  // Ahora
	   mysql_real_escape_string($login)); 
$result=mysql_db_query($database,$query,$link);

if(mysql_num_rows($result)){
  		echo "El usuario ya existe. <br> <br> <a href='javascript:history.back()'>Volver</a>";
	} 
else {
mysql_free_result($result);
$pass1=sha1(md5($pass1)); // Ahora
$query  =  "INSERT INTO usuarios (
								  login, 
								  nombre, 
								  apaterno, 
								  contrato, 
								  password, 
								  email, 
								  tipousuario 
								  ) VALUES (
 								'$login', 
								'$nombre',	
								'$apaterno',
								'$contrato',
								'$pass1',
								'$email',
								'$tipousuario')";

$result=mysql_db_query($database,$query,$link);

if(mysql_affected_rows()){
	echo "Usuario creado correctamente <br>";
    //echo $query;
	//echo $fechainicio." ".$fechatermino;
	$borrar_pagina = 1;
	} 
else {
		echo "Error introduciendo el usuario. <br> <br> <a href='javascript: void(0)'>Volver</a>";
	} /* Cierre del else */

}
} 
} 

if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "editar")) {
	echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
	//echo "editando";
	$id=$_POST["id"];
	$pass1=sha1(md5($pass1)); // Ahora
	$borrar_pagina = 1;
	$update = "UPDATE usuarios SET login='$login', nombre='$nombre', apaterno='$apaterno', contrato='$contrato', email='$email', tipousuario='$tipousuario' WHERE id='$id'";
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
		$consulta = mysql_query("SELECT * FROM usuarios WHERE usuarios.id='$id'", $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);
	}
?>
<br>
<form action="usuario_principal.php" method="POST" id="form1">
<table width="33%" border="0" id="tabla" class="tabla" align="center">
<tbody>
  <tr>
    <td width="36%" align="left">Usuario</td>
    <td width="64%" align="left"><input type="text" name="login" class="validate[required]" value="<?php  echo $fila['login']; ?>" id="1"></td>
  </tr>
  
  <?php  
  if ($accion == 'agregar') 
	{ 
  ?>
  <tr>
    <td align="left">Password</td>
    <td align="left"><input type="password" name="pass1" id="pass1" class="validate[required]"></td>
  </tr>
  <tr>
    <td align="left">Confirmar password</td>
    <td align="left"><input type="password" name="pass2" class="confirm[pass1]" ></td>
  </tr>
  <?php  
  }
  ?>
  <tr>
    <td align="left">Nombres</td>
    <td align="left"><input type="text" name="nombre" class="validate[required]" value="<?php  echo $fila['nombre']; ?>" ></td>
  </tr>
  <tr>
    <td align="left">Apellidos</td>
    <td align="left"><input type="text" name="apaterno" class="validate[required]"  value="<?php  echo $fila['apaterno']; ?>"></td>
  </tr>
  <tr>
    <td align="left">E-mail</td>
    <td align="left"><input type="text" name="email" class="validate[required,email]" value="<?php  echo $fila['email']; ?>"></td>
  </tr>
<!--   <tr>
    <td align="left">Contrato</td>
    <td align="left"><input type="text" name="contrato" value="<?php  echo $fila['contrato']; ?>"></td>
  </tr>
  <tr>
    <td align="left">Fecha inicio</td>
    <td align="left"><input type="text" name="fecha1" id="fecha1" class="validate[required]" value="<?php  echo fecha_normal($fila['fechainicio']); ?>" ></td>
  </tr>
  <tr>
    <td align="left">Fecha t&eacute;rmino</td>
    <td align="left"><input type="text" name="fecha2" id="fecha2" class="validate[required]" value="<?php  echo fecha_normal($fila['fechatermino']); ?>" ></td>
  </tr>
  
  -->
  <tr>
    <td align="left">Tipo usuario</td>
    <td align="left">
      <select name='tipousuario' class="validate[required]">
	  <?php 
	   	       $datos = array("Usuario","Supervisor","Administrador");
			   $seleccionado = $fila['tipousuario'];
			   include('include/combobox.php');
    ?>
    </select>
       </td>
  </tr>
<!--  <tr>
    <td align="left">Visibilidad</td>
    <td align="left"><select name='visibilidad' class="validate[required]">
      <?php 
	   	       $datos = array("Filial","Empresa","Todo");
			   $seleccionado = $fila['visibilidad'];
			   include('include/combobox.php');
    ?>
    </select></td>
    -->
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
</div>
</body>
</html>
<?php  } ?>