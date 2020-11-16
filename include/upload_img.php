<?php  
//tomo el valor de un elemento de tipo texto del formulario 
//$cadenatexto = $_POST["cadenatexto"]; 
//echo "Escribió en el campo de texto: " . $cadenatexto . "<br><br>"; 

//datos del arhivo 
$nombre_archivo = date("Ymd_His")."_".$_FILES['userfile']['name'];

$tipo_archivo = $_FILES['userfile']['type']; 
$ext_archivo = substr(strrchr($_FILES['userfile']['name'], '.'), 1); 
echo "la extension es: ".$ext_archivo;
$tamano_archivo = $_FILES['userfile']['size']; 
//echo 'archivo a subir: '.$nombre_archivo.'<br>';
//compruebo si las características del archivo son las que deseo 
if ((strpos($ext_archivo, "jpg")<> $ext_archivo)) { 
   	echo "
	La extensi&oacute;n del archivo no es correcta. <br><br><table><tr><td><li>Se permiten archivos .jpg y .gif.<br> </td></tr></table>"; 
	exit;
}

/*if ($tamano_archivo < 1000000000) { 
   	echo "
	Se permiten archivos de 10 MB máximo.</td></tr></table>"; 
}*/


else{ 
   	if (move_uploaded_file($_FILES['userfile']['tmp_name'], '../archivos/imagenes/'.$nombre_archivo)){ 
      	 echo "El archivo ".$nombre_archivo." ha sido cargado correctamente."; 
   	}else{ 
      	 echo "Ocurrió un error al subir el archivo. No pudo guardarse."; 
		 exit;
   	} 
} 
?>  