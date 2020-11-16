<?php 
include ("config.php");

$txt_procesos = "SELECT * from procesos WHERE idactpadre_proc = 0 AND esprocpadre = 1";
$cons_procesos = mysql_query($txt_procesos, $link);


while ($row_procesos = mysql_fetch_array($cons_procesos)) {
    $txt_filial = "
            SELECT * from actividadesfiliales 
            WHERE idactividad = " . $row_procesos['idactividad'];

    $cons_filial = mysql_query($txt_filial, $link);
    while ($row_filial = mysql_fetch_array($cons_filial)) {
        $filial = $row_filial['idfilial'];
    }

    echo "<br>" . $row_procesos['nombre_proc'] . "$filial<br>";

    $txt_hijo1 = "
            SELECT * from procesos 
            WHERE idactpadre_proc = " . $row_procesos['idactividad'];

    $cons_hijo1 = mysql_query($txt_hijo1, $link);

    while ($row_hijo1 = mysql_fetch_array($cons_hijo1)) {
        echo "Hijo 1: " . $row_hijo1['nombre_proc'] . "";

        $txt_actividadesfiliales = "
            SELECT * from actividadesfiliales 
            WHERE idactividad = " . $row_hijo1['idactividad'];

        $cons_actividadesfiliales = mysql_query($txt_actividadesfiliales, $link);


        $row_actividadesfiliales = mysql_fetch_assoc($cons_actividadesfiliales);

        if ($row_actividadesfiliales{'idactividad'} <> '') {

            $update = "UPDATE actividadesfiliales
				SET 
					idfilial = '$filial'
				WHERE 
					idactividad='" . $row_hijo1['idactividad'] . "'";
            $Result1 = mysql_query($update, $link) or die(mysql_error());

        } else {
            //echo "insert<br>";
            $query = "INSERT INTO actividadesfiliales (idactividad, idfilial) 
            VALUES (" . $row_hijo1['idactividad'] . "," . $filial . ");";
            //echo $query;
            $result = mysql_db_query(sistema_normas, $query, $link);
        }

        $txt_hijo2 = "
            SELECT * from procesos 
            WHERE idactpadre_proc = " . $row_hijo1['idactividad'];
        //echo $txt_hijo2;
        $cons_hijo2 = mysql_query($txt_hijo2, $link);

        while ($row_hijo2 = mysql_fetch_array($cons_hijo2)) {
            echo "Hijo 2: " . $row_hijo2['nombre_proc'] . "";

            $txt_actividadesfiliales = "
            SELECT * from actividadesfiliales 
            WHERE idactividad = " . $row_hijo2['idactividad'];

            $cons_actividadesfiliales = mysql_query($txt_actividadesfiliales, $link);


            $row_actividadesfiliales = mysql_fetch_assoc($cons_actividadesfiliales);

            if ($row_actividadesfiliales{'idactividad'} <> '') {

                $update = "UPDATE actividadesfiliales
				SET 
					idfilial = '$filial'
				WHERE 
					idactividad='" . $row_hijo2['idactividad'] . "'";
                $Result1 = mysql_query($update, $link) or die(mysql_error());

            } else {
                //echo "insert<br>";
                $query = "INSERT INTO actividadesfiliales (idactividad, idfilial) 
            VALUES (" . $row_hijo2['idactividad'] . "," . $filial . ");";
                //echo $query;
                $result = mysql_db_query(sistema_normas, $query, $link);
            }

            $txt_hijo3 = "
            SELECT * from procesos 
            WHERE idactpadre_proc = " . $row_hijo2['idactividad'];
            //echo $txt_hijo3;
            $cons_hijo3 = mysql_query($txt_hijo3, $link);

            while ($row_hijo3 = mysql_fetch_array($cons_hijo3)) {
                echo "Hijo 3: " . $row_hijo3['nombre_proc'] . "";

                $txt_actividadesfiliales = "
            SELECT * from actividadesfiliales 
            WHERE idactividad = " . $row_hijo3['idactividad'];

                $cons_actividadesfiliales = mysql_query($txt_actividadesfiliales, $link);


                $row_actividadesfiliales = mysql_fetch_assoc($cons_actividadesfiliales);

                if ($row_actividadesfiliales{'idactividad'} <> '') {

                    $update = "UPDATE actividadesfiliales
				SET 
					idfilial = '$filial'
				WHERE 
					idactividad='" . $row_hijo3['idactividad'] . "'";
                    $Result1 = mysql_query($update, $link) or die(mysql_error());

                } else {
                    //echo "insert<br>";
                    $query = "INSERT INTO actividadesfiliales (idactividad, idfilial) 
            VALUES (" . $row_hijo3['idactividad'] . "," . $filial . ");";
                    //echo $query;
                    $result = mysql_db_query(sistema_normas, $query, $link);
                }


                $txt_hijo4 = "
            SELECT * from procesos 
            WHERE idactpadre_proc = " . $row_hijo3['idactividad'];
                //echo $txt_hijo4;
                $cons_hijo4 = mysql_query($txt_hijo4, $link);

                while ($row_hijo4 = mysql_fetch_array($cons_hijo4)) {
                    echo "Hijo 4: " . $row_hijo4['nombre_proc'] . "";

                    $txt_actividadesfiliales = "
            SELECT * from actividadesfiliales 
            WHERE idactividad = " . $row_hijo4['idactividad'];

                    $cons_actividadesfiliales = mysql_query($txt_actividadesfiliales, $link);


                    $row_actividadesfiliales = mysql_fetch_assoc($cons_actividadesfiliales);

                    if ($row_actividadesfiliales{'idactividad'} <> '') {

                        $update = "UPDATE actividadesfiliales
				SET 
					idfilial = '$filial'
				WHERE 
					idactividad='" . $row_hijo4['idactividad'] . "'";
                        $Result1 = mysql_query($update, $link) or die(mysql_error());

                    } else {
                        //echo "insert<br>";
                        $query = "INSERT INTO actividadesfiliales (idactividad, idfilial) 
            VALUES (" . $row_hijo4['idactividad'] . "," . $filial . ");";
                        //echo $query;
                        $result = mysql_db_query(sistema_normas, $query, $link);
                    }
                }


            }


        }


    }

}
echo "OK "; ?>