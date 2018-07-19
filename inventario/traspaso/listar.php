<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Traspaso de Articulos";

include_once("../../class/articulo.php");
$articulo=new articulo;
$art=$articulo->mostrarTodoRegistro("",1,"nombre");



include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center">Fecha de Traspaso<input type="date" name="fechatraspaso" class="form-control"></td>
            <td class="text-center">Artículo de Salida<select name="codarticuloorigen" class="form-control codarticulo" rel="origen">
                               <option value="%">Todos</option>
                                <?php foreach($art as $d){
                                ?>
                                <option value="<?php echo $d['codarticulo']?>"><?=$d['codigointerno']?> - <?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select></td>
            <td class="text-center">Artículo de Entrada<select name="codarticulodestino" class="form-control codarticulo" rel="origen">
                               <option value="%">Todos</option>
                                <?php foreach($art as $d){
                                ?>
                                <option value="<?php echo $d['codarticulo']?>"><?=$d['codigointerno']?> - <?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select></td>
            <td><br><input type="submit" value="Buscar" class="btn btn-info"></td>
        </tr>
    </table>
        </div>
    </form>
    </div>
</div>
   
<div class="card mb-4">
  <h6 class="card-header">
    
  </h6>
        <div class="col-lg-12" id="respuestaformulario">
    
        </div>
<?php include_once("../../pie.php");?>