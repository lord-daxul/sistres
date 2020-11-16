<?php 
$server="localhost"; /* Nuestro server mysql */
$database="marketan_sistres"; /* Nuestra base de datos */
$dbpass=""; /*Nuestro password mysql */
$dbuser="root"; /* Nuestro user mysql */
echo $server . "-" .$dbuser."-".$dbpass .PHP_EOL;
$link  =mysql_connect($server,$dbuser,$dbpass);
$db_selected = mysql_select_db($database, $link);
$idusuario ="362";
$pass1 = "852741";
$pass1=sha1(md5($pass1));
echo $pass1;
$update = "UPDATE usuarios SET password='$pass1' WHERE id='$idusuario'";
    //echo $update;
$Result1 = mysql_query($update, $link) or die(mysql_error());  
print_r($Result1);
?>    