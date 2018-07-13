<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Proveedor";
$Cod=$_GET['Cod'];
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$pro=$proveedor->mostrarRegistro($Cod);
$pro=array_shift($pro);
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
    <table class="table table-bordered table-hover">
                     <tr>
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Nombre </label>
                            <input type="text" class="form-control" placeholder="" name="nombre" value="<?=$pro['nombre']?>">
                          </div>   
                         </td>

                     </tr>
                     <tr>
                         <td colspan="2">
                           <div class="form-group">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" placeholder="" name="direccion" value="<?=$pro['direccion']?>">
                          </div>
                         </td>
       
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Nit</label>
                            <input type="text" class="form-control" placeholder="" name="nit" value="<?=$pro['nit']?>">
                          </div>
                         </td>
                         <td>
                         <div class="form-group">
                            <label class="form-label">Fax</label>
                            <input type="text" class="form-control" placeholder="" name="fax" value="<?=$pro['fax']?>">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Tipo Pedido</label>
                            <select name="tipopedido" id="" class="form-control">
                               
                                   <option value="CONTADO" <?=$pro['tipopedido']=='CONTADO'?'selected="selected"':''?> >Contado</option>
                                   <option value="CREDITO" <?=$pro['tipopedido']=='CREDITO'?'selected="selected"':''?>>Credito</option>
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
                                <input type="text" class="form-control" placeholder="" name="contacto" value="<?=$pro['contacto']?>">
                              </div>
                         </td>
                         <td>
                             <div class="form-group">
                                <label class="form-label">Teléfonos</label>
                                <input type="text" class="form-control" placeholder="" name="telefonos" value="<?=$pro['telefonos']?>">
                              </div>
                        </td>
                     </tr>

                     
                     <tr class="table-success">
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Detalle(Memo) </label>
                            <textarea name="memo" class="form-control"><?=$pro['memo']?></textarea>
                          </div>   
                         </td>
                         
                     </tr>
                    </table>
                    <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>
<?php include_once("../../pie.php");?>