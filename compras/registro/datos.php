<?php
$codarticulo=$_POST['codarticulo'];
include_once("../../class/articulo.php");
$articulo=new articulo;
$art=$articulo->mostrarRegistro($codarticulo);
$art=array_shift($art);
$datos=array("preciocompra"=>number_format($art['preciocompra'],2,".",""));
echo json_encode($datos);
?>