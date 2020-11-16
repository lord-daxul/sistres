<?php 
$nombre_db = "sistema_normas"; 
$tablas = "SHOW TABLES"; 
$tablas = mysql_db_query($nombre_db,$tablas,$link); 
while ($tabla=mysql_fetch_array($tablas)) { 
    $optimizar = "OPTIMIZE TABLE ".$tabla[0]; 
    mysql_db_query($nombre_db,$optimizar,$db); 
    //echo $optimizar."<br>";
} 

echo "OK";
?>