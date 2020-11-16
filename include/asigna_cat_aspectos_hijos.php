<? 
//include ("include/config.php");

$txt_aspectos = "
            SELECT * from aspectos 
            WHERE idaspectopadre = 0";
$cons_aspectos = mysql_query($txt_aspectos, $link);
//mysql_query("DELETE FROM aspectoshijoscategorias",$link);
while ($row_aspectos = mysql_fetch_array($cons_aspectos))
{
    //echo "<br>" . $row_aspectos['nombreaspecto'] . "<br>";


    $txt_hijos = "
            SELECT * from aspectos 
            WHERE idaspectopadre = " . $row_aspectos['idaspecto'];

    $cons_hijos = mysql_query($txt_hijos, $link);

    while ($row_hijos = mysql_fetch_array($cons_hijos))
    {
        //echo "Hijos: " . $row_hijos['nombreaspecto'] . "<br>";
        $txt_categorias = "
            SELECT * from categoriasaspectos 
            WHERE idaspecto = " . $row_aspectos['idaspecto'];

        $cons_categorias = mysql_query($txt_categorias, $link);
        while ($row_categorias = mysql_fetch_array($cons_categorias))
        {
            $query = //echo
                "INSERT INTO aspectoshijoscategorias (idaspecto, idcategoriaaspectos) 
            VALUES (" . $row_hijos['idaspecto'] . "," . $row_categorias['idcategoriaaspectos'] .
                ");";
            //echo $query;
            $result = mysql_db_query(sistema_normas, $query, $link);

            //echo " - Inserto " . $row_categorias['nombrecategoriasaspectos'] . " -> " . $row_hijos['nombreaspecto'] .
                "<br>";

        }


    }


}
echo "OK ";