<? 
//include ("include/config.php");

$txt_peligros = "
            SELECT * from peligros 
            WHERE idpeligropadre = 0";
$cons_peligros = mysql_query($txt_peligros, $link);
//mysql_query("DELETE FROM peligroshijoscategorias",$link);
while ($row_peligros = mysql_fetch_array($cons_peligros))
{
    //echo "<br>" . $row_peligros['nombrepeligro'] . "<br>";


    $txt_hijos = "
            SELECT * from peligros 
            WHERE idpeligropadre = " . $row_peligros['idpeligro'];

    $cons_hijos = mysql_query($txt_hijos, $link);

    while ($row_hijos = mysql_fetch_array($cons_hijos))
    {
        //echo "Hijos: " . $row_hijos['nombrepeligro'] . "<br>";
        $txt_categorias = "
            SELECT * from categoriaspeligros 
            WHERE idpeligro = " . $row_peligros['idpeligro'];

        $cons_categorias = mysql_query($txt_categorias, $link);
        while ($row_categorias = mysql_fetch_array($cons_categorias))
        {
            $query = //echo
                "INSERT INTO peligroshijoscategorias (idpeligro, idcategoriapeligros) 
            VALUES (" . $row_hijos['idpeligro'] . "," . $row_categorias['idcategoriapeligros'] .
                ");";
            //echo $query;
            $result = mysql_db_query(sistema_normas, $query, $link);

            //echo " - Inserto " . $row_categorias['nombrecategoriaspeligros'] . " -> " . $row_hijos['nombrepeligro'] .
                "<br>";

        }


    }


}
echo "OK ";