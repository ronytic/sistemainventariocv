<?php
include_once("../../login/check.php");
include_once("../../class/cobrar.php");
$Cod=$_GET['Cod'];
$cobrar=new cobrar;
$cobrar->eliminarRegistro("codcobrar=".$Cod);
?>