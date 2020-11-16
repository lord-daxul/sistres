      <?php 
	  
   			$accion=$_GET['accion'];

         	      	
         for($i=0; $i<count($datos); $i++)
         {
			if ($selec[$i] == 'sel')
			{

               echo "<option value='".$ids[$i]."' selected='selected'>".$datos[$i]."</option>";

			}
            else
            {
               echo "<option value='".$ids[$i]."'>".$datos[$i]."</option>";
            }
         }
      
      ?>
