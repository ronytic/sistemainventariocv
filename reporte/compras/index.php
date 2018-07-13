<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Reporte de Compra de Articulos";
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$pro=$proveedor->mostrarTodoRegistro("",1,"nombre");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold"><label class="form-label">Proveedor </label>
                            <select name="codproveedor" class="form-control">
                               <option value="%">Todos</option>
                                <?php foreach($pro as $d){
                                ?>
                                <option value="<?php echo $d['codproveedor']?>"><?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select></td>
            <td class="text-center">Fecha de Compra Desde<input type="date" name="fechacompradesde" class="form-control input-xs" style="width: 160px" value="<?=date("Y-m-d")?>"></td>
            <td class="text-center">Fecha de Compra Hasta<input type="date" name="fechacomprahasta" class="form-control" style="width: 160px" value="<?=date("Y-m-d")?>"></td>
            <td class="text-center">Tipo de Compra<select name="tipocompra" id="" class="form-control">
                                  <option value="%">Todos</option>
                                   <option value="contado">Contado</option>
                                   <option value="credito">Credito</option>
                               </select></td>
            <td class="text-center">Fecha de Cancelación<input type="date" name="fechacancelacion" class="form-control" style="width: 160px" value=""></td>
            <td><br><input type="submit" value="Buscar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
    </div>
</div>
   
<div class="card mb-4">
  <h6 class="card-header">
    
  </h6>
        <div class="col-lg-12" id="respuestaformulario">
    
        </div>
<?php include_once("../../pie.php");?>