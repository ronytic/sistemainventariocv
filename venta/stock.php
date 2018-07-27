<?php
include_once("../../class/compradetalle.php");
    $compradetalle=new compradetalle;

include_once("../../class/ventadetalle.php");
    $ventadetalle=new ventadetalle;

include_once("../../class/traspaso.php");
    
    $traspaso=new traspaso;

function ObtenerStock($codarticulo){
    global $compradetalle,$ventadetalle,$traspaso;
    $sstock=1;
    
    
    
    $cd=$compradetalle->cantidadCompras($codarticulo);
    $cd=array_shift($cd);

    $CompraTotal=$cd['CompraTotal'];



    
    
    $vd=$ventadetalle->cantidadVentas($codarticulo);
    $vd=array_shift($vd);

    $CompraTotal=$cd['CompraTotal'];
    $VentaTotal=$vd['VentaTotal'];



    
    
    $ts=$traspaso->cantidadSalida($codarticulo);
    $ts=array_shift($ts);   
    $te=$traspaso->cantidadEntrada($codarticulo);
    $te=array_shift($te);   

    $TrasSalida=$ts['CantidadSalida'];
    $TrasEntrada=$te['CantidadEntrada'];
    
    $sstock=$CompraTotal-$VentaTotal-$TrasSalida+$TrasEntrada;
    
    return $sstock;
}
?>