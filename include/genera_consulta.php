<?php 

 $result = mysql_query($consulta, $link); 
 $total_registros = mysql_num_rows($result);
 $ver=$_GET['ver'];
 if ($ver!='todos')
 {
 $result = mysql_query("$consulta LIMIT $inicio, $registros", $link); 
 }
 $total_paginas = ceil($total_registros / $registros); 

?>
