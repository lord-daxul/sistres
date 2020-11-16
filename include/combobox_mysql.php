<?php 
	$accion=$_GET['accion'];

	if ($multiple != 1)
	{
		?>
            <option value="">-- Seleccione --</option>
		<?php 
		}
         	      	
      for($i=0; $i<count($datos); $i++)
      {
		   	if ( $accion != 'agregar' && $ids[$i]==$seleccionado)
			   {

            	echo "<option value='".$ids[$i]."' selected>".$datos[$i]."</option>";

			      }
            else
            {
               echo "<option value='".$ids[$i]."'>".$datos[$i]."</option>";
            }
      }

?>