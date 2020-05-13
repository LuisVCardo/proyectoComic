<?php
    function filtrado($datos){
        $datos = trim($datos);
        $datos = stripcslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }

    include 'conpdo.php';
    $script = filtrado($_POST['script']);
    switch($script){
        case 1:
             if($_SERVER["REQUEST_METHOD"]=="POST"){
                $titulo = filtrado($_POST['titulo']);
                $editorial = filtrado($_POST['editorial']);
                $year = filtrado($_POST['year']);
                $guion = filtrado($_POST['guion']);
                $dibu = filtrado($_POST['dibu']);
                $desc = filtrado($_POST['desc']);
                $nueva_ed = $_POST['nueva_ed'];
                 
                 $imagen = $_FILES['fichero']['name'];
                 
                 
                 echo ("Nombre de la imagen: ".$imagen);
                 
                 if($titulo == "" && $editorial == "" && $year == "" && $guion == "" && $dibu == "" && $desc == ""){
                     echo "Campos vacíos";
                 }else{
                     $cod_nom = $cadena =str_replace(' ', '', $titulo);
                     $busq = $db->prepare("SELECT COUNT(*) FROM app_comic WHERE titulo = ?");
                     $busq->execute([$titulo]);
                     if($busq->fetchColumn()==0){
                         $stm = $db->prepare("INSERT INTO app_comic(editorial,titulo,cod_nom,year,guionista,dibujante,descripcion,nombre_img) VALUES (?,?,?,?,?,?,?,?)");
                         $stm->execute([$editorial,$titulo,$cod_nom,$year,$guion,$dibu,$desc,$imagen]);
                     }else{
                        $stm = $db->prepare("UPDATE app_comic SET editorial=?,cod_nom=?,year=?,guionista=?,dibujante=?,descripcion=?,nombre_img=?] WHERE titulo = ?");
                         $stm->execute([$editorial,$cod_nom,$year,$guion,$dibu,$desc,$imagen,$titulo]);   
                     }
                     echo "Datos guardados correctamente";
                     //Damos de alta en app_editorial si es una nueva editorial
                     if($nueva_ed == false){
                         $stm = $db->prepare("INSERT INTO app_editorial(desc_editorial) VALUES (?)");
                         $stm->execute([$editorial]);
                     }
                 }
            }else{
                 echo "Error en el método";
             }
            move_uploaded_file($_FILES["fichero"]["tmp_name"], "img/".$_FILES['fichero']['name']);
            break;
        case 2:
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $editorial = filtrado($_POST['editorial']);
                $busq = $db->prepare("SELECT * FROM app_comic WHERE editorial = ?");
                $busq->execute([$editorial]);
                $datos = $busq->fetchAll();
                $cont = 1;
                $html = "";
                $html.="<option id='telemento0' value='valornulo' class='tituloElegido'>Elige una opción...</option>";
                foreach($datos as $dato){
                    $html.="<option id='telemento".$cont."' value=".str_replace(' ', '', $dato['titulo'])." class='tituloElegido'>".$dato['titulo']."</option>";
                    $cont++;
                }
                echo $html;
            }
            break;
            
        case 3:
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $codigo = filtrado($_POST['codigo']);
                $busq = $db->prepare("SELECT * FROM app_comic WHERE cod_nom = ?");
                $busq->execute([$codigo]);
                $row = $busq->rowCount();
                if($row!=0){
                    $datos = $busq->fetchAll(PDO::FETCH_ASSOC);

                    $html = "<table id='idtabladatos'>";//"<h2>".$titulo."</h2>

                    foreach($datos as $dato){
                        $html.="<tr><td>Año</td><td>".$dato['year']."</td></tr><tr><td>Guionista</td><td>".$dato['guionista']."</td></tr>
                        <tr><td>Dibujante</td><td>".$dato['dibujante']."</td><tr></tr><td>Descripción</td><td>".$dato['descripcion']."</td></tr>
                        <tr class='hidden'><td id='tdnombreimg'>".$dato['nombre_img']."</td></tr>";
                }
                $html.="</table>";
                echo $html;    
                }

            }
            break;
        case 4:
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $editorial = filtrado($_POST['editorial']);
                $busq = $db->prepare("SELECT * FROM app_comic WHERE editorial = ?");
                $busq->execute([$editorial]);
                $cuenta = $busq->rowCount();
                $datos = $busq->fetchAll();
                $cont = 1;
                $html = "";
                
                foreach($datos as $dato){
                    $html.="  <div class='mySlides'";
                    if($cont==1){   //En la primera iteración mostramos la imagen
                        $html.=" style='display:block'";
                    }else{
                         $html.=" style='display:none'";
                    }
                    $html.="><div class='numbertext'>".$cont." / ".$cuenta."</div><img src=img/".$dato['nombre_img']." style='width:50%'><div class='text'>".$dato['titulo']."</div> </div>";
                    $cont++;
                }
                echo $html;
            }
            break;
    }       

?>