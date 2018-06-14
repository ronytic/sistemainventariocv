<?php
include_once("../../login/check.php");
include_once("../../class/grupo.php");
$Cod=$_GET['Cod'];
$grupo=new grupo;
$grupo->eliminarRegistro("codgrupo=".$Cod);
?>