<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Grupo de Inventario";
$Cod=$_GET['Cod'];
include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=$grupo->mostrarRegistro($Cod);
$gru=array_shift($gru);
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
                            <input type="text" class="form-control" placeholder="" name="nombre" value="<?=$gru['nombre']?>">
                          </div>   
                         </td>
                         
                     </tr>
                    
                     <tr class="table-success">
                         <td colspan="2">
                          <div class="form-group">
                            <label class="form-label">Detalle(Memo) </label>
                            <textarea name="detalle" class="form-control"><?=$gru['detalle']?></textarea>
                          </div>   
                         </td>
                         
                     </tr>
                    </table>
                    <input type="submit" class="btn btn-primary" value="Guardar">
    </form>
</div>
<?php include_once("../../pie.php");?>