<?php 
ini_set('mysql.trace_mode', 0); 
session_start();
if(!isset($_SESSION["login"])){
header("location:login.php");
} else { 
    
if ($_SESSION["tipousuario"] == 4)
{
   header("Location:index_empresa.php?p=inicio");
}

if ($_SESSION["tipousuario"] == 0 || $_SESSION["tipousuario"] == 1 || $_SESSION["tipousuario"] == 2 || $_SESSION["tipousuario"] == 3)
{
include("include/config.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<!--<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=ISO-8859-1">-->
<title>Sistema de Documentos</title>
<link href="estilos.css" type="text/css" rel="stylesheet">

<script type="text/javascript">
    var GB_ROOT_DIR = "http://localhost/sistres/script/greybox/";
</script>
<script type="text/javascript" src="script/greybox/AJS.js"></script>
<script type="text/javascript" src="script/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="script/greybox/gb_scripts.js"></script>
<link href="script/greybox/gb_styles.css" rel="stylesheet" type="text/css" />


	  <script type='text/javascript' src='script/menu/src/assets/jquery.js'></script>
<!--    <link rel="stylesheet" href="....script/menu/src/assets/project-page.css" type="text/css" />
-->    
    <!-- per Project stuff -->
<!--      

<script type='text/javascript' src='script/menu/src/javascripts/jquery.droppy.js'></script>
<link rel="stylesheet" href="script/menu/src/stylesheets/droppy.css" type="text/css" />
-->    

<!-- END per project stuff -->



<link rel="stylesheet" type="text/css" href="script/menu2/jqueryslidemenu.css" />

<!--[if lte IE 7]>
<style type="text/css">
html .jqueryslidemenu{height: 1%;} /*Holly Hack for IE7 and below*/
</style>
<![endif]-->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<script type="text/javascript" src="script/menu2/jqueryslidemenu.js"></script>




<!--<link rel="stylesheet" type="text/css" href="script/flexigrid/css/flexigrid/flexigrid.css">
<script type="text/javascript" src="lib/jquery/jquery.js"></script>
<script type="text/javascript" src="script/flexigrid/flexigrid.js"></script>
-->

<!--<script language="JavaScript" src="script/columnfilters/jquery-1.3.2.min.js"></script> 
--><script language="JavaScript" src="script/columnfilters/jquery.columnfilters.js"></script> 

<!--<link href="css/tablecloth/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="css/tablecloth/tablecloth.js"></script>
-->
<!--<script language="JavaScript" src="script/tablesort/tablesort.js"></script>
-->



<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><style type="text/css"> -->
<!--
body {
	margin-left: 1px;
	margin-top: 1px;
	margin-right: 1px;
	margin-bottom: 1px;
}
-->
</style></head>

<body>
<?php 


//session_start();
if(!isset($_SESSION["login"])){
echo 'P';
} else { ?>

<div id="myslidemenu" class="jqueryslidemenu">
<ul id='nav'>

  <li><a href='index.php?p=inicio'>Inicio</a></li>
<?php if ($_SESSION["tipousuario"] == 2)
      { ?>
  <li><a href='#'>Administraci&oacute;n</a>
    <ul>
      <li><a href='index.php?p=usuarios'>Usuarios</a> </li>
      <li><a href='index.php?p=empresas'>Empresas</a></li>
      <li><a href='index.php?p=estadosots'>Estados de Gestión</a></li>
      <li><a href='index.php?p=estadosdists'>Estados de Distribución</a></li>
    </ul>
    </li>

<?php  } ?>

  <li><a href='index.php?p=ots'>Ordenes de Trabajo</a>

    </li>

<li><a href="logout.php">Cerrar Sesi&oacute;n</a></li>


</ul> 


<br style="clear: left" />
</div>


<?php  } ?><br />
<?php  
  $pagina=$_GET['p'];	
	if (!$pagina) { $pagina="login"; }
	$archivo=$pagina.".php";
	if (file_exists($archivo)==TRUE) { include($archivo); }
	else { ?>
   
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center">La p&aacute;gina solicitada no est&aacute; disponible</p>
<p>
<?php  
       }
   }
  
  }

mysql_close($link); 
?>
</body>
</html>