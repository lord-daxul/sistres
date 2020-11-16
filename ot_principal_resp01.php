<?php 
$accion=$_GET['accion'];
$id=$_GET['id'];
$borrar_pagina = 0;
$nombretabla = 'ots';
include("include/config.php");
include("include/conv_fecha.php");
$idusuario=$_GET['us'];
$idtiempoenvio = $_POST['idtiempoenvio'];
if($idtiempoenvio == '')
{
    $idtiempoenvio = 999;
}

if ($accion == 'eliminar') 
	{ 
    	echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
		mysql_query("DELETE FROM ots WHERE idot='$id'",$link); 
		header('Location: '.$_GET['url']);
	}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
include("login/config.php"); 

$nombreot = htmlspecialchars(trim($_POST['nombreot']));
$antecot = addslashes($_POST['antecot']);
$procedot = addslashes($_POST['procedot']);
$descot = addslashes($_POST['descot']);
$plazovctoot = fecha_mysql($_POST['fecha1']);
$idetapasots = addslashes($_POST['idetapasots']);
$idempresa = addslashes($_POST['idempresa']);
$idusuario = addslashes($_POST['idusuario']);
$fechacreacionot = fecha_mysql(date("d") . "/" . date("m") . "/" . date("Y"));
//echo "la fecha". $fechacreacionot;

$link=mysql_connect($server,$dbuser,$dbpass);


if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "agregar")) {
echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
$query  =   
"INSERT INTO ots (
                                    idempresa,
                                    idusuario,
                                    idtiempoenvio,
                                    fechacreacionot,
                                    descot
								  ) VALUES (
                                '$idempresa',
                                '$idusuario',
                                '$idtiempoenvio',
                                '$fechacreacionot',
                                '$descot'
 							)";

//echo $query;
$result=mysql_db_query($database,$query,$link) or die("Error en consulta <br>MySQL dice: ".mysql_error());;

if(mysql_affected_rows()){
    
  		$query_max = mysql_query("SELECT MAX(idot) AS idot FROM ots", $link) or die(mysql_error());
		$fila_max = mysql_fetch_assoc($query_max);
        $max = $fila_max['idot'];
	echo "Ha sido creada la OT n&uacute;mero: ".$max."<br><br>"; ?>
    <a href="ot.php?id=<?php  echo $max; ?>&accion=editar&us=<?php  echo $idusuario; ?>" rel="gb_page_fs[]">Ingresar documentos</a>
    <?php 
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
	"UPDATE ots 
				SET 
					nombreot= '$nombreot', 
					idtiempoenvio = '$idtiempoenvio',
                    descot='$descot'
				WHERE 
					idot='$id'";
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
		$consulta = mysql_query("SELECT * FROM ots as a, empresas as b WHERE a.idot='$id' AND a.idempresa = b.idempresa", $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);
		//echo "la ot es ". $fila['tituloot'];
	}
?>
<br>
<form action="ot_principal.php" method="POST" id="form1">
<table width="72%" border="0" id="tabla" class="tabla" align="center">
<tbody>

<?php 
if ($accion == 'editar') 
	{ ?>
          <tr>
    <td width="21%" align="left">Nro. OT</td>
    <td width="79%" align="left"><input name="nombreot" type="text" class="validate[required]" id="1" value="<?php  echo $fila['idot']; ?>" size="100" disabled></td>
    </tr>
 
     <tr>
    <td width="21%" align="left">Empresa</td>
    <td width="79%" align="left"><input name="empresa" type="text" class="validate[required]" id="1" value="<?php  echo $fila['nombreempresa']; ?>" size="100" disabled></td>
    </tr>
 
      <tr>
    <td width="21%" align="left">Fecha creaci&oacute;n</td>
    <td width="79%" align="left"><input name="fehacreacionot" type="text" class="validate[required]" id="1" value="<?php  echo fecha_normal($fila['fechacreacionot']); ?>" size="20" disabled></td>
    </tr>
 
    <?php 	   
	}



if ($accion == 'agregar') 
	{ 
   		$consulta2 = mysql_query("SELECT * FROM usuariosempresas as a, empresas as b WHERE idusuario ='$idusuario' AND a.idempresa = b.idempresa", $link) or die(mysql_error());
		$fila2 = mysql_fetch_assoc($consulta2);

       
       ?>

    <tr>
    <td width="21%" align="left">Empresa</td>
    <td width="79%" align="left"><input name="empresa" type="text" class="validate[required]" id="1" value="<?php  echo $fila2['nombreempresa']; ?>" size="100" disabled>
    <input type="hidden" name="idempresa" value="<?php  echo $fila2['idempresa']; ?>"></td>
    
    </tr>



      <tr>
    <td width="21%" align="left">Fecha creaci&oacute;n</td>
    <td width="79%" align="left"><input name="fechacreacionot" type="text" class="validate[required]" id="fechacreacionot" value="<?php  echo date("d") . "/" . date("m") . "/" . date("Y"); ?>" size="20" disabled></td>
    </tr>



    <?php 	   
	}
    ?>

<?php 

		$consulta_usuario = mysql_query("SELECT * FROM usuarios WHERE id='$idusuario'", $link) or die(mysql_error());
		$fila_usuario = mysql_fetch_assoc($consulta_usuario);

//echo "SELECT * FROM usuarios WHERE id='$idusuario'";
if ($fila_usuario["tipousuario"] == 0)
{ 
$sw_desact_etapa = "disabled";

 }
 else
 {
    $sw_desact_etapa = "";
 }
 
  ?>

<?php 
if ($accion == 'editar' && $fila_usuario["tipousuario"] == 0)
{
    $sw_desact_rut = "disabled";
}
?>

      <tr>
    <td align="left">Tiempos de env&iacute;o</td>
    <td align="left"><select <?php  echo $sw_desact_rut; ?> name='idtiempoenvio'>
      <?php 
	
	   	       $datos = array("Express","Urgente","24 hrs.","48 hrs.","72 hrs.","4 a 5 d&iacute;as");
			   $seleccionado = $fila['idtiempoenvio'];
			   include('include/combobox.php');
    
    ?>
      </select> </td>
  </tr>




<!--
  <tr>
    <td align="left">Estado</td>
    <td align="left"><select name='idetapasots' class="validate[required]">
      <?php 
	  		
			$result = mysql_query("SELECT idestadoots, nombreestadoots FROM estadosot ORDER BY nombreestadoots", $link); 
			$pos = 0;
			unset($datos);
			$datos = array(); 
	  		while ($row = mysql_fetch_array($result)){ 
				$datos[$pos] = $row['nombreestadoots'];
				$ids[$pos] = $row['idestadoots'];
				$pos = $pos + 1;
				} 
			   $seleccionado = $fila['idestadoot'];
			   include('include/combobox_mysql.php');
    ?>
      </select> </td>
  </tr>
-->  
  <tr>
    <td align="left" style="vertical-align: top;">Descripci&oacute;n</td>
    <td align="left">
      
      <textarea name="descot" cols="45" rows="5"><?php  echo $fila['descot']; ?></textarea>
      </td>
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
    <input type="hidden" name="idusuario" value="<?php  echo $idusuario ?>">


  </p>
</form>
</body>
</html>
<?php  } ?>