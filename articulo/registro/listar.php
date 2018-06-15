<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Articulos";
include_once("../../class/grupo.php");
$grupo=new grupo;
$gru=$grupo->mostrarTodoRegistro("",1,"nombre");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold"><label class="form-label">Grupo </label>
                            <select name="codgrupo" class="form-control">
                               <option value="%">Todos</option>
                                <?php foreach($gru as $d){
                                ?>
                                <option value="<?php echo $d['codgrupo']?>"><?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select></td>
            <td class="text-center">Nombre<input type="text" name="nombre" class="form-control"></td>
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