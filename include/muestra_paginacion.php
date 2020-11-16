<? 
 if ($ver!='todos')
 {

if(($pagina - 1) > 0) { 
echo "<a href='index.php?p=".$p."&pagina=1'>&lt;&lt;</a>&nbsp;&nbsp;"; 
}

if(($pagina - 1) > 0) { 
echo "<a href='index.php?p=".$p."&pagina=".($pagina-1)."'>&lt;</a>&nbsp;&nbsp;"; 
}

for ($i=1; $i<=$total_paginas; $i++){ 
if ($pagina == $i) { 
echo "<b>".$pagina."&nbsp;&nbsp;</b> "; 
} else { 
echo "<a href='index.php?p=".$p."&pagina=$i'>$i</a>&nbsp;&nbsp;"; 
} }


if(($pagina + 1)<=$total_paginas) { 
echo " <a href='index.php?p=".$p."&pagina=".($pagina+1)."'>&gt;</a>&nbsp;&nbsp;"; 
}

if(($pagina + 1)<=$total_paginas) { 
echo " <a href='index.php?p=".$p."&pagina=".($total_paginas)."'>&gt;&gt;</a>&nbsp;&nbsp;"; 
}
echo "&nbsp;";
echo "<br><br> <a href='index.php?p=".$p."&ver=todos'>Mostrar todos</a>&nbsp;&nbsp;&nbsp;&nbsp;";
 }
 
 ?>