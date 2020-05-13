function mostrarVentana(elemento) {
  var i, tabcontent, tablinks;
    document.getElementsByClassName("tabcontent")[0].style.display = "block";
//Poner la etiqueta ckickada activa
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
//Ocultar los elementos y mostrar el elemento activo
  
    var arrayElementos = document.getElementsByClassName("divelemento");
    for(i=0;i<arrayElementos.length;i++){
       arrayElementos[i].style.display = "none";
    }
    document.getElementById(elemento).style.display = "block";
}

function onSignIn(googleUser) { //Login con Google
    // Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    console.log("ID: " + profile.getId()); // Don't send this directly to your server!
    console.log('Full Name: ' + profile.getName());
    console.log('Given Name: ' + profile.getGivenName());
    console.log('Family Name: ' + profile.getFamilyName());
    console.log("Image URL: " + profile.getImageUrl());
    console.log("Email: " + profile.getEmail());

    // The ID token you need to pass to your backend:
    var id_token = googleUser.getAuthResponse().id_token;
    console.log("ID Token: " + id_token);
}

//jQuery
$(document).ready(function(){
    $('#texted').on('click',function(){
       $('#iseditorial').prop("disabled", false);
       $('#sieditorial').prop("disabled", true);
    });
    
    $('#oexted').on('click',function(){
       $('#iseditorial').prop("disabled", true);
       $('#sieditorial').prop("disabled", false);
       $('#iseditorial').val(""); 
    });
    
    
  $('#guardarentrada').on('click',function(){
      var titulo = $("#ititulo").val();
      if ($("#iseditorial").val()==""){
        var editorial = $("#sieditorial").val();
        var nueva_ed = false;   
      }else{
        var editorial = $("#iseditorial").val().toUpperCase();
        var nueva_ed = true;
      }
      
      var year = $("#iyear").val();
      var guion = $("#iguion").val();
      var dibu = $("#idibu").val();
      var desc = $("#idesc").val();
      var fichero = $('#ifichero')[0].files[0];

      var script = 1;
      
      var formData = new FormData();
      formData.append('titulo',titulo);
      formData.append('editorial',editorial);
      formData.append('year',year);
      formData.append('guion',guion);
      formData.append('dibu',dibu);
      formData.append('desc',desc);
      formData.append('fichero',fichero);
      formData.append('script',script);
      formData.append('nueva_ed',nueva_ed);
      $.ajax({
          method:"POST",
          type:"POST",
          url: "scriptservidor.php",
          //data: {titulo:titulo,editorial:editorial,year:year,guion:guion,dibu:dibu,desc:desc,fichero:fichero,script:script},
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(html){
              //Mostramos mensaje de éxito
              $("#mensajeGuardado").show();
              $("#mensajeGuardado").html(html);
              //Borramos los datos de los campos
              $("#ititulo").val("");
              $("#ieditorial").val("")
              $("#iyear").val("");
              $("#iguion").val("");
              $("#idibu").val("");
              $("#idesc").val("");
          },
          error: function(){
              //Mostramos mensaje de error
              $("mensajeGuardado").show();
              $("mensajeGuardado").html("Error al guardar.");
              $("mensajeGuardado").style.color = "red";
          }
      });
  });
    
  $("#ieditorial").on('change',function(){
     $("#itituloscomic").show();
      if($("#ieditorial option:selected").val()=="editorialnula"){
          $(".selectpanel").hide();
          $("#itituloscomic").hide();
      }else{
      var editorial = $("#ieditorial option:selected").text();
      var script = 2;
      
     $.ajax({
         type:"POST",
          url: "scriptservidor.php",
          data:{editorial:editorial,script:script},
          success:function(html){
              $("#itituloscomic").html(html);
          },
         error: function(){
            alert("error en ajax");   
         }
     });
    $("#itituloscomic").change(function(){
        if ($("#itituloscomic").val()=='valornulo'){
            $(".selectpanel").hide();
        }else{
            var codigo = $("#itituloscomic").val();
            var script = 3;
            $.ajax({
                type:"POST",
                url: "scriptservidor.php",
                data:{codigo:codigo,script:script},
                success:function(html){
                    $(".selectpanel").show();
                    $("#panelMostrar").html(html);
                    //Le pasamos el nombre de la imagen a la etiqueta img
                    $("#selectimagen").show();
                    var nombreimg = $("#tdnombreimg").html();
                    $("#imgcomic").attr("src","img/"+nombreimg);
                },
                error: function(){
                    alert("error en ajax");   
                }
            });
        }
    });    
          
          
      }
  });
    
  $("#icarrueditorial").on('change',function(){
     $("#divcarrusel").show();
      if($("#icarrueditorial option:selected").val()=="editorialnula"){
          $("#divcarrusel").hide();
      }else{
          var editorial = $("#icarrueditorial option:selected").text();
          var script = 4;

         $.ajax({
             type:"POST",
              url: "scriptservidor.php",
              data:{editorial:editorial,script:script},
              success:function(html){
                  $("#divcarrusel").html(html);
                  /*Poner tantos puntos como comics encuentre*/
                  var numerotext =html.indexOf("numbertext");   //Cogemos el número de comics encontrados    
                  var letranum = html.substring(numerotext+16,numerotext+17);
                  var dothtml="";
                  for(var i=1;i<=letranum;i++){
                    dothtml+="<span class='dot' onclick='currentSlide("+i+")'></span>";
                  }   
                  
                  $("#iddots").html(dothtml);

              },
             error: function(){
                alert("error en ajax");   
            }
         });    
      }
  });
});