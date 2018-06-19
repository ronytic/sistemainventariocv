<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=$grupo->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/unidad.php");
$unidad=new unidad;
$uni=$unidad->mostrarTodoRegistro("",1,"nombre");
$titulo="Registro de Articulo";
?>
<?php require_once($folder."cabecerahtml.php")?>
<?php require_once($folder."cabecera.php")?>

                <form action="guardar.php" method="post">
                 
                 <table class="table table-bordered table-hover">
                    <tr>
                         <td >
                          <div class="form-group">
                            <label class="form-label">Grupo </label>
                            <select name="codgrupo" class="form-control">
                                <?php foreach($gru as $d){
                                ?>
                                <option value="<?php echo $d['codgrupo']?>"><?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select>
                          </div>   
                         </td>
                        <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Codigo Interno </label>
                            <input type="text" class="form-control" placeholder="" name="codigointerno">
                          </div>   
                         </td>
                     </tr>
                     <tr>
                         <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Nombre </label>
                            <input type="text" class="form-control" placeholder="" name="nombre">
                          </div>   
                         </td>

                    
                         <td >
                          <div class="form-group">
                            <label class="form-label">Unidad </label>
                            <select name="codunidad" class="form-control">
                                <?php foreach($uni as $d){
                                ?>
                                <option value="<?php echo $d['codunidad']?>"><?=$d['abreviatura']?> - <?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select>
                          </div>   
                         </td>
       
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Precio Compra</label>
                            <input type="number" class="form-control" placeholder="" name="preciocompra" min="0" step="0.1">
                          </div>
                         </td>
                         <td>
                         <div class="form-group">
                            <label class="form-label">Precio Venta</label>
                            <input type="text" class="form-control" placeholder="" name="precioventa" min="0" step="0.1">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <div class="form-group">
                                <label class="form-label">Stock Minimo</label>
                                <input type="number" class="form-control" placeholder="" name="stockminimo" min="0">
                              </div>
                         </td>
                         <td>
                             <div class="form-group">
                                <label class="form-label">Stock Máximo</label>
                                <input type="number" class="form-control" placeholder="" name="stockmaximo" min="0">
                              </div>
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