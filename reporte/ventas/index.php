<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Reporte de Venta de Articulos";
include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=$cliente->mostrarTodoRegistro("",1,"nombre");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold"><label class="form-label">Cliente </label>
                            <select name="codcliente" class="form-control">
                               <option value="%">Todos</option>
                                <?php foreach($cli as $d){
                                ?>
                                <option value="<?php echo $d['codcliente']?>"><?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select></td>
            <td class="text-center">Fecha de Venta Desde<input type="date" name="fechaventadesde" class="form-control input-xs" style="width: 160px" value="<?=date("Y-m-d")?>"></td>
            <td class="text-center">Fecha de Venta Hasta<input type="date" name="fechaventahasta" class="form-control" style="width: 160px" value="<?=date("Y-m-d")?>"></td>
            <td class="text-center">Tipo de Venta<select name="tipoventa" id="" class="form-control">
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