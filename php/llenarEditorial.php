<?php
    include 'conpdo.php';
    $html="<option id='elemento0' value='editorialnula' class='editorialElegida'>Elige una opción...</option>";
    $stm = $db->prepare("SELECT * FROM app_editorial");
    $stm->execute();

    $datos = $stm->fetchAll();
    echo $stm->fetchColumn();
    $cont=1;
    foreach($datos as $dato){
        $html.="<option id='elemento".$cont."' value=".$dato['desc_editorial']." class='editorialElegida'>".$dato['desc_editorial']."</option>";
        $cont++;
    }
    echo $html;
?>