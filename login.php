<?

session_start();
if(isset($SESSION)){
header("location:index.php?p=usuario.php"); /* Si ha iniciado la sesion, vamos a user.php */
} else { 


/* Cerramos la parte de codigo PHP porque vamos a escribir bastante HTML y nos será mas cómodo así que metiendo echo's */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Identificaci&oacute;n </title>
<link href="estilos.css" type="text/css" rel="stylesheet">

</head>
<body>
<div align="center"><img  src="img/logo_mys.jpg" /></div>
<h2 align="center">Sistema de Documentos</h2>
<form action="login/comprueba.php" method="POST" class="miform">
  <table width="200" border="0" align="center">
    <tr>
      <td align="right">Usuario</td>
      <td><input type="text" name="login" /></td>
    </tr>
    <tr>
      <td align="right">Contrase&ntilde;a</td>
      <td><input type="password" name="pass" /></td>
    </tr>
  </table>
  <br />
<input type="submit" value="Entrar" class="boton" />
</form>
</body></html>
<?
} /* Y cerramos el else */ 
?>
