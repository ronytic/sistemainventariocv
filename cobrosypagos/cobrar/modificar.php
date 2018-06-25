<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Cuenta por Cobrar";
$Cod=$_GET['Cod'];
include_once("../../class/cobrar.php");
$cobrar=new cobrar;
$c=$cobrar->mostrarRegistro($Cod);
$c=array_shift($c);


include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=$cliente->mostrarTodoRegistro("",1,"nombre");


include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
                <table class="table table-bordered table-hover">
                    <tr>
                         <td >
                          <div class="form-group">
                            <label class="form-label">Cliente </label>
                            <select name="codcliente" class="form-control">
                                <?php foreach($cli as $d){
                                ?>
                                <option value="<?php echo $d['codcliente']?>" <?=$d['codcliente']==$c['codcliente']?'selected="selected"':''?>><?=$d['nombre']?> <?=$d['apellido']?></option>
                               <?php
                                }?>
                            </select>
                          </div>   
                         </td>
                        <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Tipo de Cotización </label>
                            <select name="tipo" class="form-control" >
                                <option value="Personalizado" <?="Personalizado"==$c['tipo']?'selected="selected"':''?>>Personalizado</option>   
                                <option value="Sistema" <?="Sistema"==$c['tipo']?'selected="selected"':''?>>Sistema</option>   
                            </select>
                          </div>   
                         </td>
                     </tr>
                     <tr>
                         <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Fecha de la Deuda </label>
                            <input type="date" class="form-control" placeholder="" name="fechadeuda" value="<?=$c['fechadeuda']?>">
                          </div>   
                         </td>

                    
                         <td >
                          <div class="form-group">
                            <label class="form-label">Nro de Boleta o Cotización </label>
                            <input type="text" class="form-control" placeholder="" name="nroboleta"  value="<?=$c['nroboleta']?>">
                          </div>   
                         </td>
       
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Fecha de Cancelación</label>
                            <input type="date" class="form-control" placeholder="" name="fechacancelacion" value="<?=$c['fechacancelacion']?>">
                          </div>
                         </td>
                         <td class="bg-warning">
                         <div class="form-group">
                            <label class="form-label">Monto de la Deuda</label>
                            <input type="number" class="form-control text-right" placeholder="" name="total" min="0" step="0.1" value="<?=$c['total']?>">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <div class="form-group">
                                <label class="form-label">Estado</label>
                                <select name="estado" id="" class="form-control ">
                                    <option value="Pendiente" <?="Pendiente"==$c['estado']?'selected="selected"':''?>>Pendiente</option>
                                    <option value="Cancelado" <?="Cancelado"==$c['estado']?'selected="selected"':''?>>Cancelado</option>
                                </select>
                              </div>
                         </td>
                         <td class="bg-warning">
                             <div class="form-group">
                                <label class="form-label">Acuenta</label>
                                <input type="number" class="form-control text-right" placeholder="" name="acuenta" min="0" value="<?=$c['acuenta']?>">
                              </div>
                        </td>
                     </tr>
                    <tr>
                         <td>
                            
                         </td>
                         <td class="bg-warning">
                             <div class="form-group">
                                <label class="form-label">Saldo</label>
                                <input type="number" class="form-control text-right" placeholder="" name="saldo" min="0" readonly value="<?=$c['saldo']?>">
                              </div>
                        </td>
                     </tr>
                     
                     <tr class="table-success">
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Detalle(Memo) </label>
                            <textarea name="detalle" class="form-control"><?=$c['detalle']?></textarea>
                          </div>   
                         </td>
                         
                     </tr>
                    </table>
                    <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>
<?php include_once("../../pie.php");?>