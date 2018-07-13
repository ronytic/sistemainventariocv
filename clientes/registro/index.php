<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Registro de Cliente";
?>
<?php require_once($folder."cabecerahtml.php");
 $vendedores=$usuario2->mostrarTodoRegistro("nivel=4",1,"Paterno,Materno,Nombres");?>


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
                          <div class="form-group">
                            <label class="form-label">Apellido </label>
                            <input type="text" class="form-control" placeholder="" name="apellido">
                          </div>   
                         </td>
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" placeholder="" name="direccion">
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
                            <div class="form-group">
                                <label class="form-label">Persona Contacto</label>
                                <input type="text" class="form-control" placeholder="" name="contacto">
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
                            <input type="number" class="form-control" placeholder="" name="maximocredito" min="0">
                          </div>
                         </td>
                         <td>
                          <div class="form-group">
                            <label class="form-label">Días Credito</label>
                            <input type="number" class="form-control" placeholder="" name="diascredito" min="0">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                           <div class="form-group">
                            <label class="form-label">Teléfonos</label>
                            <input type="text" class="form-control" placeholder="" name="telefonos">
                          </div>
                         </td>
                         <td>
                         
                        </td>
                     </tr>
                     <tr class="table-danger">
                         <td>
                          <div class="form-group">
                            <label class="form-label">Total Deuda </label>
                            <input type="text" class="form-control" placeholder="" name="totaldeuda">
                          </div>   
                         </td>
                         <td>
                          <div class="form-group">
                            <label class="form-label">Fecha a Pagar </label>
                            <input type="date" class="form-control" placeholder="" name="fechapagar">
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