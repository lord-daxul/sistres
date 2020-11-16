<?
//$server="localhost"; /* Nuestro server mysql */
//$database="marketan_sisdoc"; /* Nuestra base de datos */
//$dbpass="Jesucristo2013"; /*Nuestro password mysql */
//$dbuser="marketan_sisdoc"; /* Nuestro user mysql */
//
//$link = mysql_connect("localhost", "nobody&ost", "nobody");
//
//mysql_select_db("mydb", $link);



function Conectarse()
{
   if (!($link=mysql_connect("localhost","root","")))
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("marketan_sisdoc",$link))
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   return $link;
}

$link=Conectarse();
//echo "Conexi�n con la base de datos conseguida.<br>";

//mysql_close($link); //cierra la conexion

$Por_pagina=10;
?>

