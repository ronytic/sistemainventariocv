<?php
include_once("../../login/check.php");
include_once("../../class/cliente.php");
$Cod=$_GET['Cod'];
$cliente=new cliente;
$cliente->eliminarRegistro("codcliente=".$Cod);
?>