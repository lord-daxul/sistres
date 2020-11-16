<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Contacto</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="js/functionAddEvent.js"></script>
	<script type="text/javascript" src="js/contact.js"></script>
	<script type="text/javascript" src="js/xmlHttp.js"></script>
	<style type='text/css' media='screen,projection'>
	<!--
	body { margin:20px auto;width:600px;padding:20px;border:1px solid #ccc;background:#fff;font-family:georgia,times,serif; }
	fieldset { border:0;margin:0;padding:0; }
	label { display:block; }
	input.text,textarea { width:300px;font:12px/12px 'courier new',courier,monospace;color:#333;padding:3px;margin:1px 0;border:1px solid #ccc; }
	input.submit { padding:2px 5px;font:bold 12px/12px verdana,arial,sans-serif; }
	
	-->
	</style>
</head>
<body>
	<h2>Formulario de Contacto</h2>
	<p id="loadBar" style="display:none;">
		<strong>Enviando e-mail. Espere unos segundos&#8230;<br/>
		<img src="img/loading.gif" alt="Loading..." title="Sending Email" /></strong>
	</p>	
	<p id="emailSuccess" style="display:none;">
		<strong style="color:green;">Su e-mail ha sido enviado con éxito.</strong>
	</p>
	<div id="contactFormArea">
		<form action="scripts/contact.php" method="post" id="cForm">
			<fieldset>
				<label for="posName">Nombre:</label>
				<input class="text" type="text" size="25" name="posName" id="posName" />
				<label for="posEmail">e-mail:</label>
				<input class="text" type="text" size="25" name="posEmail" id="posEmail" />
				<label for="posRegard">Asunto:</label>
				<input class="text" type="text" size="25" name="posRegard" id="posRegard" />
				<label for="posText">Mensaje:</label>
				<textarea cols="50" rows="5" name="posText" id="posText"></textarea>
				<label>
					<input class="submit" type="submit" name="sendContactEmail" id="sendContactEmail" value=" Enviar " />
				</label>
			</fieldset>
		</form>
	</div>		
</body>
</html>