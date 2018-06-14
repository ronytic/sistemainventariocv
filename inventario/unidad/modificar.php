<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Unidad de Articulo";
$Cod=$_GET['Cod'];
include_once("../../class/unidad.php");
$unidad=new unidad;
$uni=$unidad->mostrarRegistro($Cod);
$uni=array_shift($uni);
include_once("../../cabecerahtml.php");
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
                            <input type="text" class="form-control" placeholder="" name="nombre" value="<?=$uni['nombre']?>">
                          </div>   
                         </td>
                         <td>
                             <div class="form-group">
                                <label class="form-label">Abreviatura </label>
                                <input type="text" class="form-control" placeholder="" name="abreviatura" value="<?=$uni['abreviatura']?>">
                              </div>
                         </td>
                     </tr>
                    
                     <tr class="table-success">
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Detalle(Memo) </label>
                            <textarea name="detalle" class="form-control"><?=$uni['detalle']?></textarea>
                          </div>   
                         </td>
                         
                     </tr>
                    </table>
                    <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>
<?php include_once("../../pie.php");?>