<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Cliente";
$Cod=$_GET['Cod'];
include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=$cliente->mostrarRegistro($Cod);
$cli=array_shift($cli);


include_once("../../cabecerahtml.php");
$vendedores=$usuario2->mostrarTodoRegistro("nivel=4",1,"Paterno,Materno,Nombres");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
    <table class="table table-bordered table-hover">
                     <tr>
                         <td>
                          <div class="form-group">
                            <label class="form-label">Nombre </label>
                            <input type="text" class="form-control" placeholder="" name="nombre" value="<?=$cli['nombre']?>">
                          </div>   
                         </td>
                         <td>
                          <div class="form-group">
                            <label class="form-label">Apellido </label>
                            <input type="text" class="form-control" placeholder="" name="apellido" value="<?=$cli['apellido']?>">
                          </div>   
                         </td>
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" placeholder="" name="direccion" value="<?=$cli['direccion']?>">
                          </div>
                         </td>
                         <td>
                         <div class="form-group">
                            <label class="form-label">Fax</label>
                            <input type="text" class="form-control" placeholder="" name="fax" value="<?=$cli['fax']?>">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <div class="form-group">
                                <label class="form-label">Persona Contacto</label>
                                <input type="text" class="form-control" placeholder="" name="contacto" value="<?=$cli['contacto']?>">
                              </div>
                         </td>
                         <td>
                         <div class="form-group">
                            <label class="form-label">Vendedor</label>
                            <select name="codvendedor" class="form-control">
                                <?php foreach($vendedores as $v){?>
                                <option value="<?=$v['CodUsuario']?>" <?=$v['CodUsuario']==$cli['codvendedor']?'selected="selected"':''?>><?=$v['Paterno']?> <?=$v['Materno']?> <?=$v['Nombres']?></option>
                                <?php }?>
                            </select>
                            
                            
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Máximo Credito</label>
                            <input type="number" class="form-control" placeholder="" name="maximocredito" min="0" value="<?=$cli['maximocredito']?>">
                          </div>
                         </td>
                         <td>
                          <div class="form-group">
                            <label class="form-label">Días Credito</label>
                            <input type="number" class="form-control" placeholder="" name="diascredito" min="0" value="<?=$cli['diascredito']?>">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Teléfonos</label>
                            <input type="text" class="form-control" placeholder="" name="telefonos" value="<?=$cli['telefonos']?>">
                          </div>
                         </td>
                         <td>
                         
                        </td>
                     </tr>
                     <tr class="table-danger">
                         <td>
                          <div class="form-group">
                            <label class="form-label">Total Deuda </label>
                            <input type="text" class="form-control" placeholder="" name="totaldeuda" value="<?=$cli['totaldeuda']?>">
                          </div>   
                         </td>
                         <td>
                          <div class="form-group">
                            <label class="form-label">Fecha a Pagar </label>
                            <input type="date" class="form-control" placeholder="" name="fechapagar" value="<?=$cli['fechapagar']?>">
                          </div>   
                         </td>
                     </tr>
                     <tr class="table-success">
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Detalle(Memo) </label>
                            <textarea name="memo" class="form-control"><?=$cli['memo']?></textarea>
                          </div>   
                         </td>
                         
                     </tr>
                    </table>
                    <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>
<?php include_once("../../pie.php");?>