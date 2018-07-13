<?php
include_once("../../login/check.php");
include_once("../../class/proveedor.php");
$Cod=$_GET['Cod'];
$proveedor=new proveedor;
include_once("../../class/compra.php");
$compra=new compra;
$c=$compra->mostrarTodoRegistro("codproveedor=".$Cod);
if(count($c)==0){
    $proveedor->eliminarRegistro("codproveedor=".$Cod);
}else{
    echo "Este Proveedor TIENE REGISTRADO compras, no se puede Eliminar";
}

?>
