<?php
include_once("../../login/check.php");
include_once("../../class/compra.php");
$Cod=$_GET['Cod'];
$compra=new compra;
$compra->eliminarRegistro("codcompra=".$Cod);
?>