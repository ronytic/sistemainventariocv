<?php
function ObtenerStock($codarticulo){
include_once("../../class/compradetalle.php");
$compradetalle=new compradetalle;
$cd=$compradetalle->cantidadCompras($codarticulo);
$cd=array_shift($cd);

$CompraTotal=$cd['CompraTotal'];



include_once("../../class/ventadetalle.php");
$ventadetalle=new ventadetalle;
$vd=$ventadetalle->cantidadVentas($codarticulo);
$vd=array_shift($vd);

$CompraTotal=$cd['CompraTotal'];
$VentaTotal=$vd['VentaTotal'];

$stock=$CompraTotal-$VentaTotal;
    return $stock;
}
?>