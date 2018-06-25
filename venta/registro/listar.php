<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Venta de Articulos";
include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=$cliente->mostrarTodoRegistro("",1,"nombre");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold"><label class="form-label">Grupo </label>
                            <select name="codcliente" class="form-control">
                               <option value="%">Todos</option>
                                <?php foreach($cli as $d){
                                ?>
                                <option value="<?php echo $d['codproveedor']?>"><?=$d['nombre']?> <?=$d['apellido']?></option>
                               <?php
                                }?>
                            </select></td>
            <td class="text-center">Fecha de Venta<input type="date" name="fechaventa" class="form-control"></td>
            <td class="text-center">Tipo de Venta<select name="tipoventa" id="" class="form-control">
                                   <option value="contado">Contado</option>
                                   <option value="credito">Credito</option>
                               </select></td>
            <td class="text-center">Fecha de Cancelación<input type="date" name="fechacancelacion" class="form-control"></td>
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