<?php 
include ("include/config.php");
include ("include/conv_fecha.php");
$login = $_GET['login_portal'];
if($idnoticia == '')
{
    $login = $_POST['login_portal'];
}


$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
//serialize($_POST['correos']);
//$arr_correos = $_POST['correos'];
//print_r($arr_correos);
//echo $arr_correos;

//$arr_correos = unserialize(stripslashes($_POST['correos']));



if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1"))
{
    echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
     $idusuario = $_POST['idusuario'];
     $pass1 = trim($_POST['pass1']);
     $pass1=sha1(md5($pass1));
    $update = "UPDATE usuarios SET password='$pass1' WHERE id='$idusuario'";
    //echo $update;
	$Result1 = mysql_query($update, $link) or die(mysql_error());
	echo "<strong><br><br>La password fue cambiada exitosamente.<br><br>
    </strong>";

$visibilidad = no;

}



if($visibilidad == '')
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
--><title>Cambio de clave</title>
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
			})
			.after($("<a href='#'>Seleccionar todos</a>").click(function() {
				$("select[multiple]").children().attr("selected", "selected").end().change();
				return false;
			})); 
		}); 

	</script>

<?php  include_once('include/js_editor.php'); ?>
<script> 
 
function seleccionar_todo(){
	for (i=0;i<document.form1.elements.length;i++)
		if(document.form1.elements[i].type == "checkbox")	
			document.form1.elements[i].checked=1
}
function deseleccionar_todo(){
	for (i=0;i<document.form1.elements.length;i++)
		if(document.form1.elements[i].type == "checkbox")	
			document.form1.elements[i].checked=0
}
</script>
<script language="JavaScript" src="script/columnfilters/jquery.columnfilters.js"></script> 
</head>













<body>
<?php 
        $idusuario = $_GET['id'];
        //$idusuario = substr($idusuario,10,4);
        //echo $idusuario;
        $txt_consulta ="SELECT * FROM usuarios WHERE id='".$idusuario."'";
        //echo $txt_consulta;
      	$consulta = mysql_query($txt_consulta, $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);
        $email = $fila['email'];
        $nombre_completo = $fila['nombre']. " ". $fila['apellido'];
        $login = $fila['login'];
        $idusuariofull = str_pad($idusuario, 4, "0", STR_PAD_LEFT);
        //echo $idusuariofull;
        
        $row_cnt = mysql_num_rows($consulta);
        //echo "cantidad: ".$row_cnt;


        if($row_cnt<>"")
        {
            



?>


<form action="usuario_cambio_password.php" method="POST" class="miform" id="form1">
  <table width="600" border="0" align="center">
    <tr>
      <td align="right">Usuario</td>
      <td align="left"><input type="text" name="login_portal" value="<?php  echo $login = $fila['login']; ?>" disabled  />
      <input type="hidden" name="hidlog" value="<?php  echo $login = $fila['login']; ?>"></td>
    </tr>
      <tr>
    <td align="right">Nueva password</td>
    <td align="left"><input type="password" name="pass1" id="pass1" class="validate[required]"></td>
  </tr>
  <tr>
    <td align="right">Confirmar password</td>
    <td align="left"><input type="password" name="pass2" class="validate[confirm[pass1]]" ></td>
  </tr>
  </table>
  <br />
<input type="submit" value="Enviar" class="boton" />
<input type="hidden" name="MM_insert" value="form1">
<input type="hidden" name="idusuario" value="<?php  echo $idusuario ?>">
</form>

<?php 
}
?>

</body>
<?php  } ?>