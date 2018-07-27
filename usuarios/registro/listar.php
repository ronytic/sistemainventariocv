<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Usuarios";

$nivel=array("2"=>"Gerente","3"=>"Administrador","4"=>"Ventas","5"=>"Almacen");
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold"><label class="form-label">Nivel de Usuario </label>
                            <select name="nivel" class="form-control">
                               <option value="%">Todos</option>
                                <?php foreach($nivel as $k=>$d){
                                ?>
                                <option value="<?php echo $k?>"><?=$d?></option>
                               <?php
                                }?>
                            </select></td>
            <td class="text-center">Nombres<input type="text" name="nombres" class="form-control"></td>
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