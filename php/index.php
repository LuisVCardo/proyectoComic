<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="2848571496.apps.googleusercontent.com">
    
    <title>Mi Colección de Comics</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="../js/scriptcomic.js"></script>
    <script src="../js/scriptcarrusel.js"></script>
    <link rel="stylesheet" href="../css/estiloscomic.css">
    <link rel="stylesheet" href="../css/estilocarrusel.css">
</head>

<body>
    <div class="container fondoestrellas">
       <!--Botón Login Google-->
        <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div> 
        <header>
            <h1>MI COLECCIÓN DE CÓMICS</h1>
        </header>
        <div class="container fondoblanco">
            <nav>
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="white tablinks"><a href="javascript:void(0);" onClick="mostrarVentana('selectVentana')">Select</a></li>
                    <li class="white tablinks"><a href="javascript:void(0);" onClick="mostrarVentana('carruselVentana')">Carrusel</a></li>
                    <li class="white tablinks"><a href="javascript:void(0);" onClick="mostrarVentana('crearNuevo')">Crear Entrada</a></li>
                </ul>
            </nav>
            <section class="tabcontent">
                <div id="selectVentana" class="divelemento">
                  <?php include "selectPanel.php"; ?>
                </div>

                <div id="carruselVentana" class="divelemento">
                  <?php include "carruselPanel.php" ?> 
                </div>
                
                <div id="crearNuevo" class="divelemento">
                  <?php include "crearPanel.php" ?> 
                </div>
                
            </section>
        </div>
    </div>
</body>

</html>
