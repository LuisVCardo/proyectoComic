<form id="formcrear" enctype="multipart/form-data">
    
    <table>
        <tr>
            <td>Título: </td>
            <td><input type="text" id="ititulo"></td>
        </tr>
        <tr>
            <td rowspan="2">Editorial: </td>
            <td> <input type="radio" id="oexted" name="bedit" value="t" checked>
                 <select name="seditorial" id="sieditorial">
                    <?php  include "llenarEditorial.php" ?>
                 </select>
            </td>
        </tr>
        <tr>
           <td> <input type="radio" id="texted" name="bedit" value="t"> <input type="text" id="iseditorial" disabled></td>
            
        </tr>
        <tr>
            <td>Año: </td>
            <td><input type="number"  id="iyear" min="1900" max="2020"></td>
        </tr>
        <tr>
            <td>Guionista: </td>
            <td><input type="text" id="iguion"></td>
        </tr>
        <tr>
            <td>Dibujante: </td>
            <td><input type="text" id="idibu"></td>
        </tr>
        <tr>
            <td>Descripción: </td>
            <td><input type="textarea" rows="2" id="idesc"></td>
        </tr>
        <tr>
<!--            <td><input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
    <!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
            </td>
            <td>Enviar este fichero: <input name="ifichero" type="file" id="ifichero"></td>
        </tr>
    </table>
    <label class="btn btn-warning" id="guardarentrada">Guardar</label>
    <div id="mensajeGuardado"></div>
</form>