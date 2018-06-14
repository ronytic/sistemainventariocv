<?php
include_once("../../login/check.php");
include_once("../../class/unidad.php");
$Cod=$_GET['Cod'];
$unidad=new unidad;
$unidad->eliminarRegistro("codunidad=".$Cod);
?>