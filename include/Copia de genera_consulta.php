<?

 $result = mysql_query($consulta, $link); 
 $total_registros = mysql_num_rows($result);
 $ver=$_GET['ver'];
 if ($ver!='todos')
 {
 $result = mysql_query("$consulta LIMIT $inicio, $registros", $link); 
 }
 $total_paginas = ceil($total_registros / $registros); 

?>

<? $cant_campos = mysql_num_fields($result);
//echo $cant_campos;
?>
<table id="tabla">
<thead>
<tr>
<?
$nom_campo = 0;
while ($nom_campo < $cant_campos)
{ ?>
<td class="spec"><b><? echo mysql_field_name($result, $nom_campo) ?></b></td>
<? 
$nom_campo = $nom_campo +1;
} ?>
</tr>
</thead>
<tbody>
<? while ($row = mysql_fetch_row($result)){ ?>
<tr>
<? 
$registro = 0;
while ($registro < $cant_campos)
{ ?>
<td><? echo $row[$registro]; ?> </td>
<?
$registro = $registro +1;
} ?>
</tr>
<? } ?>
</tbody>
</table>
