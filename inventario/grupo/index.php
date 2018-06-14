<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registro de Nuevo Grupo de Inventario";
?>
<?php require_once($folder."cabecerahtml.php")?>
  <script src="<?=$folder;?>js/core/dashboards_dashboard-1.js"></script>
<?php require_once($folder."cabecera.php")?>

                <form action="guardar.php" method="post">
                 
                 <table class="table table-bordered table-hover">
                     <tr>
                         <td>
                          <div class="form-group">
                            <label class="form-label">Nombre </label>
                            <input type="text" class="form-control" placeholder="" name="nombre">
                          </div>   
                         </td>
                         <td>
                             
                         </td>
                     </tr>
                    
                     <tr class="table-success">
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Detalle(Memo) </label>
                            <textarea name="detalle" class="form-control"></textarea>
                          </div>   
                         </td>
                         
                     </tr>
                    </table>
                  <input type="submit" class="btn btn-primary" value="Guardar">
                </form>
<?php require_once($folder."pie.php")?>