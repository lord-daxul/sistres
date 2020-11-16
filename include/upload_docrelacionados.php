<?php  
//tomo el valor de un elemento de tipo texto del formulario 
//$cadenatexto = $_POST["cadenatexto"]; 
//echo "Escribió en el campo de texto: " . $cadenatexto . "<br><br>"; 

//datos del arhivo 
$nombre_archivo = date("Ymd_His")."_".$_FILES['userfile']['name'];
//echo $nombre_archivo;
$nombre_archivo = utf8_encode($nombre_archivo);

$nombre_archivo = str_replace(array('á','à','â','ã','ª'),"a",$nombre_archivo);
$nombre_archivo = str_replace(array('Á','À','Â','Ã'),"A",$nombre_archivo);
$nombre_archivo = str_replace(array('Í','Ì','Î'),"I",$nombre_archivo);
$nombre_archivo = str_replace(array('í','ì','î'),"i",$nombre_archivo);
$nombre_archivo = str_replace(array('é','è','ê'),"e",$nombre_archivo);
$nombre_archivo = str_replace(array('É','È','Ê'),"E",$nombre_archivo);
$nombre_archivo = str_replace(array('ó','ò','ô','õ','º'),"o",$nombre_archivo);
$nombre_archivo = str_replace(array('Ó','Ò','Ô','Õ'),"O",$nombre_archivo);
$nombre_archivo = str_replace(array('ú','ù','û'),"u",$nombre_archivo);
$nombre_archivo = str_replace(array('Ú','Ù','Û'),"U",$nombre_archivo);
$nombre_archivo = str_replace("ç","c",$nombre_archivo);
$nombre_archivo = str_replace("Ç","C",$nombre_archivo);
$nombre_archivo = str_replace("ñ","n",$nombre_archivo);
$nombre_archivo = str_replace("Ñ","N",$nombre_archivo);
$nombre_archivo = str_replace(" ","_",$nombre_archivo);


//Echo "pasó por la limpieza";

//$nombre_archivo = limpiar_caracteres_especiales($nombre_archivo);



$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 
//echo 'archivo a subir: '.$nombre_archivo.'<br>';
//compruebo si las características del archivo son las que deseo 
//if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "jpeg")))) { 
//   	echo "
//	La extensi&oacute;n del archivo no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf.<br> </td></tr></table>"; 
//	exit;
//}
//
/*if ($tamano_archivo < 1000000000) { 
   	echo "
	Se permiten archivos de 10 MB máximo.</td></tr></table>"; 
}*/


//else{ 
   	if (move_uploaded_file($_FILES['userfile']['tmp_name'], '../docrelacionados/'.$nombre_archivo)){ 
      	 echo "El archivo ".$nombre_archivo." ha sido cargado correctamente.<br><br>"; 
   	}else{ 
      	 echo "Ocurrió un error al subir el archivo ".$nombre_archivo.". No pudo guardarse.<br><br>"; 
		 exit;
   	} 
//} 



//Sube imagen
//tomo el valor de un elemento de tipo texto del formulario 
//$cadenatexto = $_POST["cadenatexto"]; 
//echo "Escribió en el campo de texto: " . $cadenatexto . "<br><br>"; 

//datos del arhivo 
$nombre_imagen = date("Ymd_His")."_".$_FILES['userfile_imagen']['name'];
//echo $nombre_imagen;
$nombre_imagen = utf8_encode($nombre_imagen);

$nombre_imagen = str_replace(array('á','à','â','ã','ª'),"a",$nombre_imagen);
$nombre_imagen = str_replace(array('Á','À','Â','Ã'),"A",$nombre_imagen);
$nombre_imagen = str_replace(array('Í','Ì','Î'),"I",$nombre_imagen);
$nombre_imagen = str_replace(array('í','ì','î'),"i",$nombre_imagen);
$nombre_imagen = str_replace(array('é','è','ê'),"e",$nombre_imagen);
$nombre_imagen = str_replace(array('É','È','Ê'),"E",$nombre_imagen);
$nombre_imagen = str_replace(array('ó','ò','ô','õ','º'),"o",$nombre_imagen);
$nombre_imagen = str_replace(array('Ó','Ò','Ô','Õ'),"O",$nombre_imagen);
$nombre_imagen = str_replace(array('ú','ù','û'),"u",$nombre_imagen);
$nombre_imagen = str_replace(array('Ú','Ù','Û'),"U",$nombre_imagen);
$nombre_imagen = str_replace("ç","c",$nombre_imagen);
$nombre_imagen = str_replace("Ç","C",$nombre_imagen);
$nombre_imagen = str_replace("ñ","n",$nombre_imagen);
$nombre_imagen = str_replace("Ñ","N",$nombre_imagen);
$nombre_imagen = str_replace(" ","_",$nombre_imagen);


//Echo "pasó por la limpieza";

//$nombre_imagen = limpiar_caracteres_especiales($nombre_imagen);



$tipo_archivo = $_FILES['userfile_imagen']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 
//echo 'archivo a subir: '.$nombre_imagen.'<br>';
//compruebo si las características del archivo son las que deseo 
if (!((strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "jpeg")))) { 
   	echo "
	La extensi&oacute;n del archivo no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf.<br> </td></tr></table>"; 
	exit;
}

/*if ($tamano_archivo < 1000000000) { 
   	echo "
	Se permiten archivos de 10 MB máximo.</td></tr></table>"; 
}*/


//else{ 
   	if (move_uploaded_file($_FILES['userfile_imagen']['tmp_name'], '../docrelacionados/img/'.$nombre_imagen)){ 
      	 echo "El archivo ".$nombre_imagen." ha sido cargado correctamente.<br><br>"; 
   	}else{ 
      	 echo "Ocurrió un error al subir el archivo ".$nombre_imagen.". No pudo guardarse.<br><br>"; 
		 exit;
   	} 
//} 



?>  