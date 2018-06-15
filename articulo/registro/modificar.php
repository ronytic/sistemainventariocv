<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Articulo";
$Cod=$_GET['Cod'];
include_once("../../class/articulo.php");
$articulo=new articulo;
$a=$articulo->mostrarRegistro($Cod);
$a=array_shift($a);


include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=$grupo->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/unidad.php");
$unidad=new unidad;
$uni=$unidad->mostrarTodoRegistro("",1,"nombre");


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
                            <label class="form-label">Grupo </label>
                            <select name="codgrupo" class="form-control">
                                <?php foreach($gru as $d){
                                ?>
                                <option value="<?php echo $d['codgrupo']?>" <?=$d['codgrupo']==$a['codgrupo']?'selected="selected"':''?>><?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select>
                          </div>   
                         </td>
                        <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Codigo Interno </label>
                            <input type="text" class="form-control" placeholder="" name="codigointerno" value="<?=$a['codigointerno']?>">
                          </div>   
                         </td>
                     </tr>
                     <tr>
                         <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Nombre </label>
                            <input type="text" class="form-control" placeholder="" name="nombre" value="<?=$a['nombre']?>">
                          </div>   
                         </td>

                    
                         <td >
                          <div class="form-group">
                            <label class="form-label">Unidad </label>
                            <select name="codunidad" class="form-control">
                                <?php foreach($uni as $d){
                                ?>
                                <option value="<?php echo $d['codunidad']?>" <?=$d['codunidad']==$a['codunidad']?'selected="selected"':''?>><?=$d['abreviatura']?> - <?=$d['nombre']?></option>
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
                            <input type="number" class="form-control" placeholder="" name="preciominimo" min="0" step="0.1" value="<?=$a['preciominimo']?>">
                          </div>
                         </td>
                         <td>
                         <div class="form-group">
                            <label class="form-label">Precio Venta</label>
                            <input type="text" class="form-control" placeholder="" name="precioventa" min="0" step="0.1" value="<?=$a['precioventa']?>">
                          </div>
                        </td>
                     </tr>
                     <tr>
                         <td>
                            <div class="form-group">
                                <label class="form-label">Stock Minimo</label>
                                <input type="number" class="form-control" placeholder="" name="stockminimo" min="0" value="<?=$a['stockminimo']?>">
                              </div>
                         </td>
                         <td>
                             <div class="form-group">
                                <label class="form-label">Stock Máximo</label>
                                <input type="number" class="form-control" placeholder="" name="stockmaximo" min="0" value="<?=$a['stockmaximo']?>">
                              </div>
                        </td>
                     </tr>

                     
                     <tr class="table-success">
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Detalle(Memo) </label>
                            <textarea name="detalle" class="form-control"><?=$a['detalle']?></textarea>
                          </div>   
                         </td>
                         
                     </tr>

                    </table>
                    <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>
<?php include_once("../../pie.php");?>