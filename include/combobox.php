      <?php
	  
   			$accion=$_GET['accion'];

		?>
            <option value='' selected>-- Seleccione --</option>
			<?
         	      	
         for($i=0; $i<count($datos); $i++)
         {
			if ( $accion != 'agregar' && $i==$seleccionado)
			{

               			echo "<option value='".$i."' selected>".$datos[$i]."</option>";

			}
            else
            {
               echo "<option value='".$i."'>".$datos[$i]."</option>";
            }
         }
      
      ?>
