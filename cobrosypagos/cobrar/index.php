<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=$cliente->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/unidad.php");
$unidad=new unidad;
$uni=$unidad->mostrarTodoRegistro("",1,"nombre");
$titulo="Registro de Cuenta por Cobrar";
?>
<?php require_once($folder."cabecerahtml.php")?>
<script>
$(document).ready(function(){
   
    
     $(document).on("keyup change","[name=acuenta]",function(){
        var acuenta=parseInt($(this).val());
        var saldo=parseInt($("[name=total]").val())-acuenta;
        $("[name=saldo]").val(saldo.toFixed(2));
    });
});
</script>
<?php require_once($folder."cabecera.php")?>

                <form action="guardar.php" method="post">
                 
                 <table class="table table-bordered table-hover">
                    <tr>
                         <td >
                          <div class="form-group">
                            <label class="form-label">Cliente </label>
                            <select name="codcliente" class="form-control">
                                <?php foreach($cli as $d){
                                ?>
                                <option value="<?php echo $d['codcliente']?>"><?=$d['nombre']?> <?=$d['apellido']?></option>
                               <?php
                                }?>
                            </select>
                          </div>   
                         </td>
                        <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Tipo de Cotización </label>
                            <select name="tipo" class="form-control" >
                                <option value="Personalizado">Personalizado</option>   
                                <option value="Sistema">Sistema</option>   
                            </select>
                          </div>   
                         </td>
                     </tr>
                     <tr>
                         <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Fecha de la Deuda </label>
                            <input type="date" class="form-control" placeholder="" name="fechadeuda" value="<?=date("Y-m-d")?>">
                          </div>   
                         </td>

                    
                         <td >
                          <div class="form-group">
                            <label class="form-label">Nro de Boleta o Cotización </label>
                            <input type="text" class="form-control" placeholder="" name="nroboleta" >
                          </div>   
                         </td>
       
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Fecha de Cancelación</label>
                            <input type="date" class="form-control" placeholder="" name="fechacancelacion" >
                          </div>
                         </td>
                         <td class="bg-warning">
                         <div class="form-group">
                            <label class="form-label">Monto de la Deuda</label>
                            <input type="number" class="form-control text-right" placeholder="" name="total" min="0" step="0.1">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <div class="form-group">
                                <label class="form-label">Estado</label>
                                <select name="estado" id="" class="form-control ">
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                              </div>
                         </td>
                         <td class="bg-warning">
                             <div class="form-group">
                                <label class="form-label">Acuenta</label>
                                <input type="number" class="form-control text-right" placeholder="" name="acuenta" min="0">
                              </div>
                        </td>
                     </tr>
                    <tr>
                         <td>
                            
                         </td>
                         <td class="bg-warning">
                             <div class="form-group">
                                <label class="form-label">Saldo</label>
                                <input type="number" class="form-control text-right" placeholder="" name="saldo" min="0" readonly value="0">
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