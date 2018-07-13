<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Reporte Detallado de Venta de Articulo";

$codventa=$_GET['codventa'];
include_once("../../class/cliente.php");
$cliente=new cliente;
include_once("../../class/venta.php");
$venta=new venta;
include_once("../../class/ventadetalle.php");
$ventadetalle=new ventadetalle;
include_once("../../class/articulo.php");
$articulo=new articulo;



$v=$venta->mostrarTodoRegistro("codventa LIKE '$codventa' ",1,"");
$v=array_shift($v);


$vend=$ventadetalle->mostrarTodoRegistro("codventa LIKE '$codventa' ",1,"");



$c=$cliente->mostrarRegistro($v['codcliente']);
$c=array_shift($c);

include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<a href="#" class="btn btn-success btn-xs exportarexcel">Exportar tabla a excel</a>
<table class="table table-bordered">
  <thead>
   <tr>
            <th colspan="5" class="text-center"><?=$titulo?></th>

   </tr>
   <tr>

            <th>Cliente</th>
            <th>Fecha de Venta</th>
            <th>Total</th>
            <th>Tipo de Compra</th>
            <th>Fecha Cancelacion</th>
   </tr>
   </thead>
    <tr>
            <td><?=$c['nombre']?> <?=$c['apellido']?></td>
            <td><?=$v['fechaventa']?></td>
            <td><?=number_format($v['total'],2,".","")?></td>
            <td><?=$v['tipoventa']?></td>
            <td><?=$v['fechacancelacion']?></td>
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
    foreach($vend as $vd){$i++;
    $a=$articulo->mostrarRegistro($vd['codarticulo']);
    $a=array_shift($a);
    ?>
    <tr>
       <td><?=$i?></td>
       <td><?=$a['codigointerno']?>-<?=$a['nombre']?></td>
       <td><?=$vd['cantidad']?></td>
       <td><?=$vd['precio']?></td>
       <td><?=$vd['subtotal']?></td>
    </tr>
    <?php }?>
    <tr>
       <td></td>
       <td></td>
       <td></td>
       <td>Total</td>
       <td><?=$vd['subtotal']?></td>
    </tr>
    <tr>
       <td></td>
       <td></td>
       <td></td>
       <td>Cancelado</td>
       <td><?=$v['cancelado']?></td>
    </tr>
    <tr>
       <td></td>
       <td></td>
       <td></td>
       <td>Cambio</td>
       <td><?=$v['cambio']?></td>
    </tr>
</table>

<?php include_once("../../pie.php");?>