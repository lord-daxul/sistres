<?php 
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
<li><a href="empresa_principal.php?accion=<?php  echo $accion; ?>&id=<?php  echo $id; ?>" rel="#iframe" class="selected">Empresa</a></li>

<?php  if ($accion == "editar")
{ ?>
<!--<li><a href="empresa_sectores.php?accion=<?php  echo $accion; ?>&id=<?php  echo $id; ?>" rel="#iframe" class="selected">Sectores</a></li>
<li><a href="empresa_logo.php?accion=<?php  echo $accion; ?>&id=<?php  echo $id; ?>" rel="#iframe" class="selected">Logo</a></li>
<li><a href="empresa_encabezados.php?accion=<?php  echo $accion; ?>&id=<?php  echo $id; ?>" rel="#iframe" class="selected">Im&aacute;genes Encabezado</a></li>

<li><a href="empresa_contratistas.php?accion=<?php  echo $accion; ?>&id=<?php  echo $id; ?>" rel="#iframe" class="selected">Contratistas</a></li>
-->

<?php  } ?>
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