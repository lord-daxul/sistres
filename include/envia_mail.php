<?php 
 $to = "hdomingueza@gmail.com";
 $subject = "Asunto";
 $body = "Hola,\n\nEsto es una prueba";
 if (mail($to, $subject, $body)) {
   echo("<p>Mensaje enviado!</p>");
  } else {
   echo("<p>Entrega del mensaje fallida...</p>");
  }
 ?>