<?php
include_once("../../login/check.php");
include_once("../../class/proveedor.php");
$Cod=$_GET['Cod'];
$proveedor=new proveedor;
$proveedor->eliminarRegistro("codproveedor=".$Cod);
?>