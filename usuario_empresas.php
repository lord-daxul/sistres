<?
$accion=$_GET['accion'];
$id=$_GET['id'];
$idempresa=$_GET['idempresa'];
$borrar_pagina = 0;
include("include/config.php");
include("include/conv_fecha.php");


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
include("login/config.php"); 


$idfiliales = $_POST['idfiliales'];
$id = $_POST['id'];
$idempresausuario = $_POST['idempresausuario'];
 

//$valores = implode(', ', $idfiliales_aux);
//$sql_valores = "(" .$valores. ")";
 
//echo "<br> los valores son : ". implode(',',$idfiliales);



$link=mysql_connect($server,$dbuser,$dbpass);


if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "agregar")) {
echo '<link href="estilos.css" type="text/css" rel="stylesheet">';



/*$query = "INSERT INTO usuariosempresas (idusuario, idfilial) VALUES " . $sql_valores. ";";
echo $query;
*/
//$result=mysql_db_query($database,$query,$link);

if(mysql_affected_rows()){
	//echo "Usuario creado correctamente <br>";
	//echo $fechainicio." ".$fechatermino;
	$borrar_pagina = 1;
	} 
else {
		//echo "Error introduciendo el usuario. <br> <br> <a href='javascript: void(0)'>Volver</a>";
	} /* Cierre del else */

}
} 
//} 

if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "editar")) {
	mysql_query("DELETE FROM usuariosempresas WHERE idusuario='$id'",$link); 
	$i=0;
while ($i < count ($idfiliales) ) {
    //print $idfiliales[$i];
    //print '<br />';

	


	$query = "INSERT INTO usuariosempresas (idusuario, idempresa) VALUES (".$id.",". $idfiliales[$i].");";
	//echo $query;

	$result=mysql_db_query($database,$query,$link);

    $i++;


	if(mysql_affected_rows()){
		//echo "Datos actualizados <br>";
		$ok =1;
		//echo $fechainicio." ".$fechatermino;
		$borrar_pagina = 1;
	} 
else {
		//echo "Error introduciendo el usuario. <br> <br> <a href='javascript: void(0)'>Volver</a>";
	} /* Cierre del else */


	
	
	
}
echo '<link href="estilos.css" type="text/css" rel="stylesheet">';

echo "Datos actualizados.";
	//if (is_array($_POST['idfilial'])){ 
   //foreach($_POST['idfiliales'] as $were){ 
   //    echo $were; 
   //} 
//} else { 
//echo "no se seleccinó ninguno .."; 
//}  

//$query = "INSERT INTO usuariosempresas (idusuario, idfilial) VALUES " . $sql_valores. ";";
//echo $query;
/*
$idfiliales = $_POST['idfiliales'];
$idusuario=$_GET['id'];
foreach($idfiliales as $idfilial){
    $valor = "'".$idfilial."'";
	$query = "INSERT INTO usuariosempresas (idusuario, idfilial) VALUES ($idusuario , $idfilial);";
	echo $query;
    //$idfiliales_aux[] = $valor;
}*/


$result=mysql_db_query($database,$query,$link);

if(mysql_affected_rows()){
	//echo "Usuario creado correctamente <br>";
	//echo $fechainicio." ".$fechatermino;
	$borrar_pagina = 1;
	} 
else {
		echo "Error introduciendo el usuario. <br> <br> <a href='javascript: void(0)'>Volver</a>";
	} /* Cierre del else */

	//echo "Datos actualizados.<br>";
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



</head>


<body>

<? if ($accion == 'editar') 
	{ 
		$id=$_GET['id'];
		$consulta = mysql_query("SELECT a.*, b.nombreempresa FROM usuarios as a, empresas as b WHERE a.id='$id' AND a.idempresa = b.idempresa", $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);
		$idempresausuario = $fila['idempresa'];
        
        
		$consulta1 = mysql_query("SELECT * FROM usuariosempresas WHERE idusuario='$id'", $link) or die(mysql_error());
		$fila1 = mysql_fetch_assoc($consulta);


		$id=$_GET['id'];
		$consulta2 = mysql_query("SELECT * FROM usuarios WHERE usuarios.id='$id'", $link) or die(mysql_error());
		$fila2 = mysql_fetch_assoc($consulta2);
        $tipousuario = $fila2['tipousuario'];
        //echo "tipo: ". $tipousuario;

	}
?>
<br>

<form action="usuario_empresas.php" method="POST" id="form1">
<table width="46%" border="0" id="tabla" class="tabla" align="center">
<tbody>
  <tr>
    <td width="19%" align="left" style="vertical-align: top;">Empresas</td>
    <td width="81%" align="left">
   
   <? if ($tipousuario == 1 || $tipousuario == 2)
   {  ?>
    
     <select multiple="multiple" name="idfiliales[]"  >  
    
    
    <? } 
    
    else
    
    {  ?>
        <select name="idfiliales[]"  >  
    <? }    ?>
    
       
	<?php
			$result = mysql_query("
			SELECT idempresa, nombreempresa
			FROM empresas
			ORDER BY nombreempresa", $link); 
			$pos = 0;
			unset($datos);
			$datos = array(); 
	  		while ($row = mysql_fetch_array($result)){ 
				$datos[$pos] = $row['nombreempresa'];
				$ids[$pos] = $row['idempresa'];
				$selecc = mysql_query("
					SELECT idempresa, idusuario
					FROM usuariosempresas
					WHERE idusuario='$id' AND idempresa = '$ids[$pos]'
					", $link);
				$num_rows = mysql_num_rows($selecc);
				if ($num_rows > 0){
						$selec[$pos] = 'sel';
						}	
				$pos = $pos + 1;
			} 
			   include('include/combobox_multiple_mysql.php');
    ?>
	</select>
    
  </tr>
  </tbody>
  </table>

    <p>
      <input name="Crear" type="submit" value="Enviar">
    </p>
    <p>
      <input type="hidden" name="MM_insert" value="form1">
      <input type="hidden" name="accionform" value="<? echo $accion ?>">
      <input type="hidden" name="id" value="<? echo $id ?>">
      <input type="hidden" name="idempresausuario" value="<? echo $idempresausuario ?>">


  </p>
</form>
</div>
</body>
</html>
<? } ?>