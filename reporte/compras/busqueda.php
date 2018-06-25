<?php
include_once("../../login/check.php");
$folder="../../";
$a=array();
foreach($_POST as $k=>$v){
    array_push($a,"$k=$v");
}
$url="reporte.php?".implode("&",$a);


$titulo="Reporte de Compra";
?>

<a href="<?=$url?>" target="_blank" class="btn btn-success btn-xs">Abrir en una nueva Ventana</a>
<iframe src="<?=$url?>" frameborder="0" width="100%" height="600"></iframe>
