<?php require_once('../../Connections/fotolog_felipefbs.php'); ?>
<?php 
require_once("../../lang/linguagens.php");
require_once('../../biblioteca/felipefbs.fotolog.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "naologado.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Contacto</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="../../../default.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="js/functionAddEvent.js"></script>
	<script type="text/javascript" src="js/contact.js"></script>
	<script type="text/javascript" src="js/xmlHttp.js"></script>
	<style type='text/css' media='screen,projection'>
	<!--
/*	body { margin:20px auto;padding:20px;background:#fff; }
*/	fieldset { border:0;margin:0;padding:0; }
	label { display:block; }
/*	input.text,textarea { width:300px;font:12px/12px 'courier new',courier,monospace;color:#333;padding:3px;margin:1px 0;border:1px solid #ccc; }*/
	input.submit { padding:2px 5px;font:bold 12px/12px verdana,arial,sans-serif; }
body {
	margin-left: 10px;
	margin-right: 10px;
}
	
	-->
	</style>
</head>
<body>
	<h2 align="center">Formulario de Contacto</h2>
Puedes escribirnos en caso de que tengas un problema o quieras enviarnos sugerencias o comentarios.<br />
	  <br />
	
<table width="339" border="0" align="center">
      <tr>
        <td width="376"><p id="loadBar" style="display:none;">
		<strong>Enviando e-mail. Espere unos segundos&#8230;<br/>
		<img src="img/loading.gif" alt="Loading..." title="Sending Email" /></strong>
	</p>	
	<p id="emailSuccess" style="display:none;">
		<strong style="color:green;">Su e-mail ha sido enviado con éxito.</strong>
	</p>
	<div id="contactFormArea">
		<form action="scripts/contact.php" method="post" id="cForm">
			<fieldset>
				<label for="posName">Nombre:</label>
				<input type="text" size="25" name="posName" id="posName" />
			<br />
		    <br />
<label for="posEmail">E-mail:</label>
				<input type="text" size="25" name="posEmail" id="posEmail" />
			<br />
		    <br />
<label for="posRegard">Fotolog:</label>
				<input type="text" size="25" name="posRegard" id="posRegard" value="<? echo $_SESSION['MM_Username'] ?>" disabled="disabled" />
			<br />
		    <br />
<label for="posText">Mensaje:</label>
				<textarea cols="50" rows="5" name="posText" id="posText"></textarea>
				<label>
				<br />
				<br />
					<div align="center">
					  <input type="submit" name="sendContactEmail" id="sendContactEmail" value=" Enviar " />
			        </div>
				</label>
			</fieldset>
		</form>
	</div>		</td>
      </tr>
    </table>
	</body>
</html>