<?php 
$registros = 50;
$p=$_GET['p'];
$pagina = $_GET["pagina"];

if (!$pagina) { 
$inicio = 0; 
$pagina = 1; 
} 
else { 
$inicio = ($pagina - 1) * $registros; 
} 
?>
