<?php 
$accion=$_GET['accion'];
$id=$_GET['id'];
$idempresa=$_GET['idempresa'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="script/validation/js/jquery.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="script/ajaxtabscontent/ajaxtabs/ajaxtabs.css" />
<script type="text/javascript" src="script/ajaxtabscontent/ajaxtabs/ajaxtabs.js">
</script>
</head>

<body>
<ul id="countrytabs" class="shadetabs">
<li><a href="estadodist_principal.php?accion=<?php  echo $accion; ?>&id=<?php  echo $id; ?>" rel="#iframe" class="selected">Estado de Distribución</a></li>
<?php  if ($accion == "editar")
{ ?>

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