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

    
    
include_once("../../class/traspaso.php");
$traspaso=new traspaso;
$ts=$traspaso->cantidadSalida($codarticulo);
$ts=array_shift($ts);   
$te=$traspaso->cantidadEntrada($codarticulo);
$te=array_shift($te);   
    
$TrasSalida=$ts['CantidadSalida'];
    $TrasEntrada=$te['CantidadEntrada'];
    
    $stock=$CompraTotal-$VentaTotal-$TrasSalida+$TrasEntrada;
    return $stock;
}
?>