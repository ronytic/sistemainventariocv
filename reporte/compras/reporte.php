<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Reporte Detallado de Compra de Articulo";

$codcompra=$_GET['codcompra'];
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
include_once("../../class/compra.php");
$compra=new compra;
include_once("../../class/compradetalle.php");
$compradetalle=new compradetalle;
include_once("../../class/articulo.php");
$articulo=new articulo;
$pro=$proveedor->mostrarTodoRegistro("",1,"nombre");

$c=$compra->mostrarTodoRegistro("codcompra LIKE '$codcompra' ",1,"");
$c=array_shift($c);


$comd=$compradetalle->mostrarTodoRegistro("codcompra LIKE '$codcompra' ",1,"");



$p=$proveedor->mostrarRegistro($c['codproveedor']);
$p=array_shift($p);

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<a href="#" class="btn btn-success btn-xs exportarexcel">Exportar tabla a excel</a>
<table class="table table-bordered">
  <thead>
   <tr>
            <th colspan="6" class="text-center"><?=$titulo?></th>

   </tr>
   <tr>

            <th>Proveedor</th>
            <th>Fecha de Compra</th>
            <th>Total</th>
            <th>Tipo de Compra</th>
            <th>Fecha Cancelacion</th>
   </tr>
   </thead>
    <tr>
            <td><?=$p['nombre']?></td>
            <td><?=$c['fechacompra']?></td>
            <td><?=number_format($c['total'],2,".","")?></td>
            <td><?=$c['tipocompra']?></td>
            <td><?=$c['fechacancelacion']?></td>
    </tr>
    <tr height="50"><td colspan="5"></td></tr>
    <tr>
        <th>Nº</th>
       <th>Codigo</th>
       <th>Cantidad</th>
       <th>Precio</th>
       <th>SubTotal</th>
    </tr>
    <?php 
    $i=0;
    foreach($comd as $cd){$i++;
    $a=$articulo->mostrarRegistro($cd['codarticulo']);
    $a=array_shift($a);
    ?>
    <tr>
       <td><?=$i?></td>
       <td><?=$a['codigointerno']?>-<?=$a['nombre']?></td>
       <td><?=$cd['cantidad']?></td>
       <td><?=$cd['precio']?></td>
       <td><?=$cd['subtotal']?></td>
    </tr>
    <?php }?>
</table>

<?php include_once("../../pie.php");?>