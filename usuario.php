<?
$accion=$_GET['accion'];
$id=$_GET['id'];
$idempresa=$_GET['idempresa'];
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
<li><a href="usuario_principal.php?accion=<? echo $accion; ?>&id=<? echo $id; ?>" rel="#iframe" class="selected">Usuario</a></li>
<? if ($accion == "editar")
{ ?>
<li><a href="usuario_empresas.php?accion=editar&id=<? echo $id ?>&idempresa=<? echo $idempresa ?>" rel="#iframe">Empresas</a></li>
<li><a href="usuario_cambio_password.php?accion=editar&id=<? echo $id ?>&idempresa=<? echo $idempresa ?>" rel="#iframe">Cambio password</a></li>
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