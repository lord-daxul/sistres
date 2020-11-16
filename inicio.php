<?php  session_start();
if (!isset($_SESSION["login"]))
{
    header("location:login.php");
} else
{
?>
<html><style type="text/css">
<!--
body {
	margin-left: 1px;
	margin-top: 1px;
	margin-right: 1px;
	margin-bottom: 1px;
}
-->
</style>
<body>
<table width="100%" border="0" class="sdiseno">
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="83%" align="center"><h3><strong>SISTEMA DE DOCUMENTOS</strong></h3>
    <p>Usuario: <strong><?php  echo $_SESSION["nombre"] . " " . $_SESSION["apaterno"] .
" " . $_SESSION["amaterno"] ;
?></strong></p></td>
<!--
    <td width="13%" align="right" valign="top"><a href='logout.php'>Cerrar sesi&oacute;n</a></td>
-->
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>





<p><br />
  <br />
<!--  <br>Ha ingresado con el usuario: <strong> <?php  echo $_SESSION["login"];
?>
--></strong> </p>
<p><br>


</p>
</body></html><?php  isset($_SESSION);
}
?>
