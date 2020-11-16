      <?php 
	  
	  function opciones_combobox($datos,$seleccionado)
	  {
      	
		$accion2=$_GET['accion'];
	    if ($accion2 == 'agregar')
			{
				$seleccionado = "";
			}
			
		$dato = array($datos);
         
         for($i=0; $i<count($dato); $i++)
         {
            if($i==$seleccionado)
            {
               echo "<option value='".$i."' selected>".$dato[$i]."</option>";
            }
            else
            {
               echo "<option value='".$i."'>".$dato[$i]."</option>";
            }
         }
              // return "<option value='pepe'>pepelota</option>";
      
	  }
      ?>