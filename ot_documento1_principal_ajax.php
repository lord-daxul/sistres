<?php 
ob_start();
include ("include/config.php");
include ("include/conv_fecha.php");
$accion = $_GET['accion'];
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
    //include 'include/upload.php';
    include 'script/ajax_file_upload/processupload.php';
    $query = "INSERT INTO otsdocumentos (
    idot,
    nombredocumento, 
    urldocumento) 
    VALUES 
    (" . $idot . ",'".$nombredocumentoot."','".$nombre_archivo."');";
    //echo $query;
    $result = mysql_db_query($database, $query, $link);


    if (mysql_affected_rows()) {
        $ok = 1;
        $borrar_pagina = 1;
    }


    echo '<link href="estilos.css" type="text/css" rel="stylesheet">';


    }
}
//}

if ((isset($_POST["accionform"])) && ($_POST["accionform"] == "editar")) {
    //include 'include/upload.php';

    $query = "UPDATE otsdocumentos SET 
    
    nombredocumentoot = '".$nombredocumentoot."'
    WHERE
    iddocumentoot = $id
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
<!DOCTYPE HTML>
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


<?php  include_once('include/js_editor.php'); ?>







<!-- Inicio bloque de uploader -->

<script type="text/javascript" src="script/ajax_file_upload/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="script/ajax_file_upload/js/jquery.form.min.js"></script>

<script type="text/javascript">
$(document).ready(function() { 
	var options = { 
			target:   '#output',   // target element(s) to be updated with server response 
			beforeSubmit:  beforeSubmit,  // pre-submit callback 
			success:       afterSuccess,  // post-submit callback 
			uploadProgress: OnProgress, //upload progress callback 
			resetForm: true        // reset the form after successful submit 
		}; 
		
	 $('#form1').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// always return false to prevent standard browser submit and page navigation 
			return false; 
		}); 
		

//function after succesful file upload (when server response)
function afterSuccess()
{
	$('#submit-btn').show(); //hide submit button
	$('#loading-img').hide(); //hide submit button
	$('#progressbox').delay( 1000 ).fadeOut(); //hide progress bar

}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{
		
		if( !$('#FileInput').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#FileInput')[0].files[0].size; //get file size
		var ftype = $('#FileInput')[0].files[0].type; // get file type
		

		//allow file types 
		switch(ftype)
        {
            case 'image/png': 
			case 'image/gif': 
			case 'image/jpeg': 
			case 'image/pjpeg':
			case 'text/plain':
			case 'text/html':
			case 'application/x-zip-compressed':
			case 'application/pdf':
			case 'application/msword':
			case 'application/vnd.ms-excel':
			case 'video/mp4':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 5 MB (1048576)
		if(fsize>5242880) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big file! <br />File is too big, it should be less than 5 MB.");
			return false
		}
				
		$('#submit-btn').hide(); //hide submit button
		$('#loading-img').show(); //hide submit button
		$("#output").html("");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//progress bar function
function OnProgress(event, position, total, percentComplete)
{
    //Progress bar
	$('#progressbox').show();
    $('#progressbar').width(percentComplete + '%') //update progressbar percent complete
    $('#statustxt').html(percentComplete + '%'); //update status text
    if(percentComplete>50)
        {
            $('#statustxt').css('color','#000'); //change status text to white after 50%
        }
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 

</script>
<link href="script/ajax_file_upload/style/style.css" rel="stylesheet" type="text/css">

<!-- Fin bloque uploader -->

</head>


<body>


<br>

<?php  if ($accion == 'editar') 
	{ 
		$id=$_GET['id'];
		$consulta = mysql_query("SELECT * FROM otsdocumentos WHERE iddocumentoot='$id'", $link) or die(mysql_error());
		$fila = mysql_fetch_assoc($consulta);
		//echo "la articulo es ". $fila['tituloarticulo'];
	}
?>


<form action="ot_documento1_principal.php" method="POST" id="form1" enctype="multipart/form-data">
<table width="500" border="0" id="tabla" class="tabla" align="center">
<tbody>

    </tr>

    <tr>
    <td align="left">Nombre documento</td>
    <td align="left"><input type="text" name="nombredocumentoot" class="validate[required]" id="nombredocumentoot" value="<?php  echo $fila['nombredocumentoot']; ?>"     /></td>
    </tr>
    <tr>
    </tr>
    <?php  if ($accion <> 'editar') 
	{  ?>
    <td align="left">Archivo </td>
    <td align="left"><!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />-->
     
      <!--
<input name="userfile" type="file" class="validate[required]" />
-->

<input name="FileInput" id="FileInput" type="file" />
<img src="script/ajax_file_upload/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>

      <br />
      <!--<input type="submit" value="Enviar">-->
    
    <?php  }
    else
    {
     ?> 
     
     <td align="left">Archivo </td>
<td align="left">       <a href="../archivos/<?php  echo $fila['urldocumentoot']; ?>" target="_blank"> <?php  echo $fila['urldocumentoot']; ?> </a> </td>
  <?php   }
    
     ?>
     </tr>
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
<div id="progressbox" ><div id="progressbar"></div ><div id="statustxt">0%</div></div>
<div id="output"></div>
</div>
</body>
</html>
<?php  } ?>