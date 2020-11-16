<?php
function fecha_normal($dtm_fechainicial){

# ================================================== ========
# ==== Recibe una fecha con formato dd-mm-aa ====
# ==== Devuelve una fecha con formato aaaa-mm-dd hh:mm:ss ====
# ================================================== ========

// Fecha en Nuestro Formato
//$dtm_fechainicial = "01/11/2007";
 
// Creamos una lista de variables a la cual le asignamos los valores parciales de $dtm_fechainicial, divididos por el signo "/"
list( $dia, $mes, $anio) = split( '[-__]', $dtm_fechainicial );
 
// reasignamos la fecha a $dtm_fechainicial con su nuevo formato
$dtm_fechainicial = "$anio-$mes-$dia";
return ($dtm_fechainicial);
}
//}

//////////////////////////////////////////////////// 
//Convierte fecha de normal a mysql
////////////////////////////////////////////////////

function fecha_mysql($date){
# ================================================== ========
# ==== Recibe una fecha con formato dd-mm-aa ====
# ==== Devuelve una fecha con formato aaaa-mm-dd hh:mm:ss ====
# ================================================== ========

 
$year = substr($date,6,4); // 01-12-2007
$month = substr($date,3,2); $day = substr($date,0,2); 
$date = $year."-".$month."-".$day; 
return ($date); 
}

//}
?>