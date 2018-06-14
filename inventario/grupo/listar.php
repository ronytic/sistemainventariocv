<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Listado de Grupos de Inventario";

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
    <form action="busqueda.php" method="post" class="formulariobusqueda" data-respuesta="respuestaformulario">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-center text-bold">Nombre<br><input type="text" name="nombre" class="form-control" autofocus></td>
            
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