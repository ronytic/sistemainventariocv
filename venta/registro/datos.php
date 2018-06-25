<?php
$codarticulo=$_POST['codarticulo'];
include_once("../../class/articulo.php");
$articulo=new articulo;
$art=$articulo->mostrarRegistro($codarticulo);
$art=array_shift($art);


include_once("../../class/compradetalle.php");
$compradetalle=new compradetalle;
$cd=$compradetalle->cantidadCompras($codarticulo);
//print_r($cd);
$cd=array_shift($cd);

$CompraTotal=$cd['CompraTotal'];



include_once("../../class/ventadetalle.php");
$ventadetalle=new ventadetalle;
$vd=$ventadetalle->cantidadVentas($codarticulo);
//print_r($cd);
$vd=array_shift($vd);

$CompraTotal=$cd['CompraTotal'];
$VentaTotal=$vd['VentaTotal'];

$stock=$CompraTotal-$VentaTotal;

$datos=array("precioventa"=>number_format($art['precioventa'],2,".",""),
            "stock"=>$stock);
echo json_encode($datos);
?>