<?php
include_once("../../login/check.php");
include_once("../../class/articulo.php");
$Cod=$_GET['Cod'];
$articulo=new articulo;
$articulo->eliminarRegistro("codarticulo=".$Cod);
?>