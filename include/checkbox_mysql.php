      <?php 
	  
   			$accion=$_GET['accion'];


         	      	
         for($i=0; $i<count($datos); $i++)
         {
			if ( $ids[$i]==$seleccionado)
			{
						//echo "<input type='checkbox' name='$datos[$i]' value='$ids[$i]' checked=\"checked\"/> ".$datos[$i]."<br>";
               			//echo "<option value='".$ids[$i]."' selected>".$datos[$i]."</option>";

			}
            else
            {
               echo "<input type='checkbox' name='".$nombre_checkbox."[]' value='$ids[$i]'/> ".$datos[$i]."<br>";
            }
         }
      
      ?>
