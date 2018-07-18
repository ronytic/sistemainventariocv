<?php
$codarticulo=$_POST['codarticulo'];
include_once("../../class/articulo.php");
$articulo=new articulo;
$art=$articulo->mostrarRegistro($codarticulo);
$art=array_shift($art);

include_once("../../class/unidad.php");
$unidad=new unidad;
$uni=$unidad->mostrarRegistro($art['codunidad']);
$uni=array_shift($uni);

include_once("../../venta/stock.php");
$stock=ObtenerStock($codarticulo);
$datos=array("preciocompra"=>number_format($art['preciocompra'],2,".",""),
            "stock"=>$stock,
            "unidad"=>$uni['nombre']);
echo json_encode($datos);
?>