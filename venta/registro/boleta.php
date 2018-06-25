<?php
include_once("../../login/check.php");
$folder="../../";
$codventa=$_GET['Cod'];
$url="reporte.php?Cod=".$codventa;

$titulo="Reporte de Venta";
?>
<?php require_once($folder."cabecerahtml.php")?>

<?php require_once($folder."cabecera.php")?>
<a href="<?=$url?>" target="_blank" class="btn btn-success btn-xs">Abrir en una nueva Ventana</a>
<iframe src="<?=$url?>" frameborder="0" width="100%" height="600"></iframe>
<?php require_once($folder."pie.php")?>