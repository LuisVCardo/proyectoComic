<div>
<!-- Hay que crear la base de datos antes de implementar esta parte, ya que se crearán los elementos del select dinámicamente    -->
    <form id="iformselect">
        <select name="seditorial" id="ieditorial">
            <?php  include "llenarEditorial.php" ?>
        </select>
        <select name="stituloscomic" id="itituloscomic"></select>
        
        
    </form>
    <div class="container selectpanel">
    <div id="selectimagen"> <img id="imgcomic" src="" alt="imagen_comic"> </div>
    <div id="panelMostrar"></div>
    </div>
    
    
    
</div>