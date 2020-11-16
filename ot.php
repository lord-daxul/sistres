<?
$accion=$_GET['accion'];
$id=$_GET['id'];
$idempresa=$_GET['idempresa'];
$us=$_GET['us'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>
<script src="script/validation/js/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="script/ajaxtabscontent/ajaxtabs/ajaxtabs.css" />
<script type="text/javascript" src="script/ajaxtabscontent/ajaxtabs/ajaxtabs.js">
</script>
</head>

<body>
<ul id="countrytabs" class="shadetabs">
<li><a href="ot_principal.php?accion=<? echo $accion; ?>&id=<? echo $id; ?>&us=<? echo $us; ?>" rel="#iframe" class="selected">Órden de Trabajo</a></li>
<? if ($accion == "editar")
{ ?>

<li><a href="ot_documentos1.php?accion=<? echo $accion; ?>&amp;id=<? echo $id; ?>&us=<? echo $us; ?>" rel="#iframe" class="selected">Documentos</a></li>
<!--
<li><a href="permiso_respuestas.php?accion=<? echo $accion; ?>&amp;id=<? echo $id; ?>" rel="#iframe" class="selected">Respuestas</a></li>
-->
<? } ?>
</ul>

<div id="countrydivcontainer" style="border:1px solid gray; width:600; height:600; margin-bottom: 1em; padding: 10px">

<script type="text/javascript">
var countries=new ddajaxtabs("countrytabs", "countrydivcontainer")
countries.setpersist(false)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()
</script>


</body>
</html>