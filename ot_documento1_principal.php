<?php 
ob_start();
include ("include/config.php");
include ("include/conv_fecha.php");
$accion = $_GET['accion'];
$idusuario = $_GET['us'];
$id = $_GET['id'];
$idproyecto = $_GET['idproyecto'];
$urldocumentoeliminar = $_GET['urldocumentoeliminar'];
$iddocumentoot = $_GET['iddocumentoot'];
$idempresa = $_GET['idempresa'];
$eliminar = $_GET['eliminar'];
$nombreversion = $_POST['nombreversion'];
$fecha = $_POST['fecha1'];
$fecha = fecha_mysql($fecha);
$borrar_pagina = 0;
$idconsultapublica = $_GET['idconsultapublica'];
$idconsultapublica = $_POST['idconsultapublica'];
$idetapasots = addslashes($_POST['idetapasots']);
$descdocot = $_POST['descdocot'];
$rutdocot = $_POST['rutdocot'];
$rutdocot = str_replace(array('-','.'),"",$rutdocot);
$facturadocot = $_POST['facturadocot'];
$idtiempoenvio = $_POST['idtiempoenvio'];
$idestadodist = $_POST['idestadodist'];


if ($idetapasots == '')
{
    $idetapasots = 0;
}

if ($idestadodist == '')
{
    $idestadodist = 0;
}

//

$idot = $_POST['idot'];
$nombredocumentoot = $_POST['nombredocumentoot'];
$idfilial = $_POST['idfilial'];

$iddocumentoot = $_GET['iddocumentoot'];
if ($accion == 'eliminar') {
    
    if ($_GET['urldocumentoeliminar'] <> '')
    {
        if (file_exists('../archivos/' . $_GET['urldocumentoeliminar'])){ 
          unlink('../archivos/' . $_GET['urldocumentoeliminar']);

        }
        mysql_query("DELETE FROM otsdocumentos WHERE urldocumento='$urldocumentoeliminar'", $link);

    }
    header('Location: '.$_GET['url']);
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
    include ("login/config.php");
    $idfiliales = $_POST['idfiliales'];
    $id = $_POST['id'];
    $idempresanorma = $_POST['idempresanorma'];
    $link = mysql_connect($server, $dbuser, $dbpass);




    if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "agregar")) {
    $idproyecto = $_POST['idproyecto'];
    include 'include/upload.php';
    
    $query = "INSERT INTO otsdocumentos (
    idot,
    urldocumento,
    rutdocot,
    facturadocot,
    idestadodist,
    idestadoot
    ) 
    VALUES 
    (" . $idot . ",'".$nombre_archivo. "','".$rutdocot. "','".$facturadocot."','".$idestadodist."','".$idetapasots."');";
    //echo $query;
    $result = mysql_db_query($database, $query, $link);


    if (mysql_affected_rows()) {
        $ok = 1;
        $borrar_pagina = 1;
    }


    echo '<link href="estilos.css" type="text/css" rel="stylesheet">'; ?><br /><br />
    <a href="ot_documento1_principal.php?accion=agregar&idot=<?php  echo $idot ?>" title="Agregar" >Subir m&aacute;s documentos.</a><br /><br />
    
    <a href="ot_documentos1.php?accion=<?php  echo $accion; ?>&amp;id=<?php  echo $idot; ?>&us=<?php  echo $_POST['idusuario']; ?>" title="Agregar" >Volver.</a>
        
<?php 
    }
}
//}

if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "editar")) {
    //include 'include/upload.php';

    $query = "UPDATE otsdocumentos SET 
    
    idestadoot = '".$idetapasots."',
    idestadodist = '".$idestadodist."',
    rutdocot = '".$rutdocot."',
    facturadocot = '".$facturadocot."',
    idestadodist = '".$idestadodist."',
    descdocot = '".$descdocot."'
    WHERE
    iddocot = $id
    ;";
    //echo $query;
    $result = mysql_db_query($database, $query, $link);


    if (mysql_affected_rows()) {
        $ok = 1;
        $borrar_pagina = 1;
    }


    echo '<link href="estilos.css" type="text/css" rel="stylesheet">Datos Actualizados';

    //if (is_array($_POST['idfilial'])){
    //foreach($_POST['idfiliales'] as $were){
    //    echo $were;
    //}
    //} else {
    //echo "no se seleccinó ninguno ..";
    //}

    //$query = "INSERT INTO filialesnormas (idnorma, idfilial) VALUES " . $sql_valores. ";";
    //echo $query;
    /*
    $idfiliales = $_POST['idfiliales'];
    $idnorma=$_GET['id'];
    foreach($idfiliales as $idfilial){
    $valor = "'".$idfilial."'";
    $query = "INSERT INTO filialesnormas (idnorma, idfilial) VALUES ($idnorma , $idfilial);";
    echo $query;
    //$idfiliales_aux[] = $valor;
    }*/


    //$result=mysql_db_query($database,$query,$link);

    if (mysql_affected_rows()) {
        //echo "norma creado correctamente <br>";
        //echo $fechainicio." ".$fechatermino;
        $borrar_pagina = 1;
    } else {
        echo "Error introduciendo el norma. <br> <br> <a href='javascript: void(0)'>Volver</a>";
    }
    /* Cierre del else */

    //echo "Datos actualizados.<br>";
}
if ($borrar_pagina == 0) { ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<!--
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
-->
<title>Documento sin título</title>
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
<script src="script/valida_rut/jquery.Rut.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
// Demo 1
$('#rut_demo_1').Rut();
// Demo 2
$('#rutdocot').Rut({
  on_error: function(){ alert('EL RUT INGRESADO ES INCORRECTO.'); }
});
// Demo 3
$('#rut_demo_3, #rut_demo_4').Rut({
  on_error: function(){ alert('Rut incorrecto'); },
  on_success: function(){ alert('Rut correcto') }
});
// Demo 5
$('#rut_demo_5').Rut({
  on_error: function(){ alert('Rut incorrecto'); },
  format_on: 'keyup'
});
// Demo 6
$('#rut_demo_6').Rut({
  validation: false,
  format_on: 'keyup',
  digito_verificador: '#digito_verificador_demo_6'
});

$('#rut_demo_7').Rut({
  digito_verificador: '#digito_verificador_demo_7',
  on_error: function(){ alert('Rut incorrecto'); }
});

$("#content > ul").tabs();
});
</script>


<script src="script/wow-alert/js/wow-alert.js" type="text/javascript"></script>
<link rel="stylesheet" href="script/wow-alert/css/wow-alert.css" type="text/css" media="screen" charset="utf-8" />


<?php  include_once('include/js_editor.php'); 

function formato_rut( $rut ) {
    return number_format( substr ( $rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut, strlen($rut) -1 , 1 );
}

?>
</head>


<body>


<br>

<?php  if ($accion == 'editar') 
	{ 
		$id=$_GET['id'];
		$consulta = mysql_query("SELECT * FROM otsdocumentos WHERE iddocot='$id'", $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);
		//echo "la articulo es ". $fila['tituloarticulo'];
	}
?>

<br />

<form action="ot_documento1_principal.php" method="POST" id="form1" enctype="multipart/form-data">
<table width="500" border="0" id="tabla" class="tabla" align="center">
<tbody>

    </tr>

<!--
    <tr>
    <td align="left">Nombre documento</td>
    <td align="left"><input type="text" name="nombredocumentoot" class="validate[required]" id="nombredocumentoot" value="<?php  echo $fila['nombredocumentoot']; ?>"     /></td>
    </tr>
    <tr>
-->    

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
    <td width="200" align="left">Rut</td>
    <td width="79%" align="left"><input name="rutdocot" type="text"  class="" id="rutdocot" value="<?php  if ($fila['rutdocot'] == 0) {} else {echo formato_rut($fila['rutdocot']);} ?>" size="10" <?php  echo $sw_desact_rut ?>></td>
    </tr>

    <tr>
    <td width="21%" align="left">Documento</td>
    <td width="79%" align="left"><input name="facturadocot" type="text" class="" id="1" value="<?php  echo $fila['facturadocot']; ?>" size="10" <?php  echo $sw_desact_rut ?>></td>
    </tr>

      <tr>
    <td align="left">Estado Gesti&oacute;n</td>
    <td align="left"><select <?php  echo $sw_desact_etapa; ?> name='idetapasots'>
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

    


      <tr>
    <td align="left">Estado Distribuci&oacute;n</td>
    <td align="left"><select <?php  echo $sw_desact_etapa; ?> name='idestadodist'>
      <?php 
	  		
			$result = mysql_query("SELECT idestadodist, nombreestadodist FROM estadosdist ORDER BY nombreestadodist", $link); 
			$pos = 0;
			unset($datos);
			$datos = array(); 
	  		while ($row = mysql_fetch_array($result)){ 
				$datos[$pos] = $row['nombreestadodist'];
				$ids[$pos] = $row['idestadodist'];
				$pos = $pos + 1;
				} 
			   $seleccionado = $fila['idestadodist'];
			   include('include/combobox_mysql.php');
    ?>
      </select> </td>
  </tr>



    
    
    
    </tr>
    <?php  if ($accion <> 'editar') 
	{  ?>
    <td align="left">Archivo </td>
    <td align="left"><!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />-->
     
      <input name="userfile" type="file" class="validate[required]" />
      <br />
      <!--<input type="submit" value="Enviar">-->
    
    <?php  }
    else
    {
     ?> 
     
     <td align="left">Archivo </td>
<td align="left">       <a href="archivos/<?php  echo $fila['urldocumento']; ?>" target="_blank"> <?php  echo $fila['urldocumento']; ?> </a> </td>
  <?php   }
    
     ?>
     </tr>

<?php 

if ($fila_usuario["tipousuario"] == 0)
{   
    
    ?>
     
       <tr>
    <td align="left" style="vertical-align: top;"><br>Descripci&oacute;n</td>
    <td align="left">
      
      <?php  echo $fila['descdocot']; ?>
      </td>
  </tr>  
     
     
     <?php 
     }
     
     else
     {
     ?>
     
  <tr>
    <td align="left" style="vertical-align: top;">Descripci&oacute;n</td>
    <td align="left">
      
      <textarea name="descdocot" cols="45" rows="5" ><?php  echo $fila['descdocot']; ?></textarea>
      </td>
  </tr>  
     
     <?php 
     }
     ?>
     
     
     
  <tr>
    <td width="19%" align="left">&nbsp;</td>
    <td width="81%" align="left"><input name="Crear" type="submit" value="Ingresar" />    </tr>
  </tbody>
  </table>

  <p>&nbsp;</p>
    <p>
      <input type="hidden" name="MM_insert" value="form1">
      <input type="hidden" name="accionform" value="<?php  echo $accion ?>">
              <?php  $idot = $_GET['idot']; 
              //echo "topico". $idot?>
      <input type="hidden" name="idot" value="<?php  echo $idot ?>">
      <input type="hidden" name="idusuario" value="<?php  echo $idusuario ?>">
      <input type="hidden" name="id" value="<?php  echo $id ?>">


      <input type="hidden" name="idempresanorma" value="<?php  echo $idempresanorma ?>">


  </p>
    <p>
      <?php 
    include "include/paginacion.php";
    $consulta = "SELECT * FROM versionesproyectos WHERE idproyecto = $id ORDER BY fecha";
    //include "include/genera_consulta.php"; ?>
      <script language="JavaScript" type="text/javascript">
function confirmar(url){
if (!confirm("Seguro de que desea eliminar el archivo? NO SE PODRA RECUPERAR !!!")) {
return false;
}
else {
document.location= url;
return true;
}
}
      </script>
    </p>
</form>
</div>
</body>
</html>
<?php  } ?>