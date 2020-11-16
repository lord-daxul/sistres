<? 
//tomo el valor de un elemento de tipo texto del formulario 
//$cadenatexto = $_POST["cadenatexto"]; 
//echo "Escribió en el campo de texto: " . $cadenatexto . "<br><br>"; 

//datos del arhivo 

$nom_archivo = $_FILES['userfile']['name']; 
$trozos = explode(".", $nom_archivo); 
$extension = end($trozos); 



$nombre_archivo = $idot."_".date("Ymd_His").".".$extension;

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


$upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/sisdoc/archivos/";
//echo $upload_dir."<br>";    
if (file_exists($upload_dir)) {
    //echo 'Existe <br>.';
}

if (is_writable($upload_dir)) {
    //echo 'Se puede escribir<br>';
}


else {
    //echo 'Upload directory is not writable, or does not exist.';
}

//Echo "pasó por la limpieza";

//$nombre_archivo = limpiar_caracteres_especiales($nombre_archivo);



$tipo_archivo = $_FILES['userfile']['type']; 
$tamano_archivo = $_FILES['userfile']['size']; 
//echo 'archivo a subir: '.$nombre_archivo.'<br>';
//compruebo si las características del archivo son las que deseo 
if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "sheet") || strpos($tipo_archivo, "excel") ))) { 
   	echo "
	La extensi&oacute;n del archivo no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf.<br> </td></tr></table>"; 
	exit;
}

//if ($tamano_archivo < 10000000000000) { 
//   	echo "
//	Se permiten archivos de 10 MB máximo.</td></tr></table>"; 
//}


else{ 
   	if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'archivos/'.$nombre_archivo)){ 
      	 echo "El archivo ".$nombre_archivo." ha sido cargado correctamente."; 
   	}else{ 
      	 echo "Ocurrió un error al subir el archivo. No pudo guardarse. ".$nombre_archivo; 
		 exit;
   	} 
} 
?>  