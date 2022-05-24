<?php
   require "/Connection.php" ; 

    $sql_querie = "SELECT horo_id, horo_name, horo_img, horo_date FROM himg";
    
    $db_result = $conn->query($sql_querie);  

    foreach ($db_result as $row)
    {            
        $HoofdletterEerstString = ucfirst($row['horo_name']);
        
        echo '<div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">';
        echo '<a href="php/getData2.php?sb=' . $row['horo_name'] . '">' . '<img src="/codegorilla/horoscope/img/' . $row['horo_img'] . '" alt="horoscope" class="rounded-circle" style="width:150px; height:150px;">' . '</a>' .


        '<h2>' . $HoofdletterEerstString . '</h2>'; 

        echo "</div>";
    }       

    $conn = null;

?>
