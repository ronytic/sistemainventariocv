<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registro de Proveedor";
?>
<?php require_once($folder."cabecerahtml.php")?>
  <script src="<?=$folder;?>js/core/dashboards_dashboard-1.js"></script>
<?php require_once($folder."cabecera.php")?>

                <form action="guardar.php" method="post">
                 
                 <table class="table table-bordered table-hover">
                     <tr>
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Nombre </label>
                            <input type="text" class="form-control" placeholder="" name="nombre">
                          </div>   
                         </td>

                     </tr>
                     <tr>
                         <td colspan="2">
                           <div class="form-group">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" placeholder="" name="direccion">
                          </div>
                         </td>
       
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Nit</label>
                            <input type="text" class="form-control" placeholder="" name="nit">
                          </div>
                         </td>
                         <td>
                         <div class="form-group">
                            <label class="form-label">Fax</label>
                            <input type="text" class="form-control" placeholder="" name="fax">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group" style="position: relative;">
                            <label class="form-label">Tipo Pedido</label>
                            <br>
                            <select name="tipopedido" id="" class="form-control">
                               
                                   <option value="CONTADO">Contado</option>
                                   <option value="CREDITO">Credito</option>
                               </select>
                          </div>
                         </td>
                         <td>
                         
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <div class="form-group">
                                <label class="form-label">Persona Contacto</label>
                                <input type="text" class="form-control" placeholder="" name="contacto">
                              </div>
                         </td>
                         <td>
                             <div class="form-group">
                                <label class="form-label">Teléfonos</label>
                                <input type="text" class="form-control" placeholder="" name="telefonos">
                              </div>
                        </td>
                     </tr>

                     
                     <tr class="table-success">
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Detalle(Memo) </label>
                            <textarea name="memo" class="form-control"></textarea>
                          </div>   
                         </td>
                         
                     </tr>
                    </table>
                  <input type="submit" class="btn btn-primary" value="Guardar">
                </form>
<?php require_once($folder."pie.php")?>