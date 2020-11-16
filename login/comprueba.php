<?php 
ob_start();
session_start();
echo '<link href="estilos.css" type="text/css" rel="stylesheet">';
echo "algo";
// modificacion de codigo Xombra (www.xombra.com) 21/03/2009 para sectorweb.net
    //include("config.php");
    
$server="localhost"; /* Nuestro server mysql */
$database="marketan_sistres"; /* Nuestra base de datos */
$dbpass=""; /*Nuestro password mysql */
$dbuser="root"; /* Nuestro user mysql */
    
    $login = htmlspecialchars(trim($_POST['login']));
    $pass = sha1(md5(trim($_POST['pass']))); // encriptamos en MD5 para despues comprar (Modificado)
    // $query="SELECT * FROM usuarios WHERE login='$login'"; Antes
    echo $login . ":" . $pass . PHP_EOL;
	$link=mysql_connect($server,$dbuser,$dbpass);
 
    $query = sprintf("SELECT usuarios.login,
	                         usuarios.nombre,
	 					     usuarios.apaterno, 
							 usuarios.amaterno,
							 usuarios.email,
							 usuarios.tipousuario,
                             usuarios.id
	                   FROM usuarios WHERE usuarios.login='%s' && usuarios.password = '%s'",  // Ahora
               mysql_real_escape_string($login),mysql_real_escape_string($pass)); 	  
      $result=mysql_db_query($database,$query,$link);
      // if(mysql_num_rows($result)==0){ // antes
      if(mysql_num_rows($result)){ // nos devuelve 1 si encontro el usuario y el password
	  
		$array=mysql_fetch_array($result);
     	//  if($array["password"]==crypt($pass,"semilla") ){ // Antes
     	 /* Comprobamos que el password encriptado en la BD coincide con el password que nos han dado al encriptarlo. Recuerda usar semilla para encriptar los dos passwords. */
         $_SESSION["login"]=$array["login"];
         $_SESSION["nombre"]=$array["nombre"];
         $_SESSION["apaterno"]=$array["apaterno"];
         $_SESSION["amaterno"]=$array["amaterno"];
		     $_SESSION["email"]=$array["email"]; // Agrgado Nuevo
		     $_SESSION["tipousuario"]=$array["tipousuario"]; // Agrgado Nuevo
         $_SESSION["idusuario"]=$array["id"]; // Agrgado Nuevo
        
         header("Location:../index.php?p=inicio");
       }  else {
		  // header("Location:../error.php");
		 echo "Usuario o password incorrectos.";  // Ahora
      }
