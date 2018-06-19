<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/compra.php");
$compra=new compra;

$fechacompra=$fechacompra!=""?$fechacompra:'%';
$fechacancelacion=$fechacancelacion!=""?$fechacancelacion:'%';
$comp=$compra->mostrarTodoRegistro("codproveedor LIKE '$codproveedor' and fechacompra LIKE '$fechacompra' and tipocompra LIKE '$tipocompra' and fechacancelacion LIKE '$fechacancelacion'",1,"fechacompra");




include_once("../../class/proveedor.php");
$proveedor=new proveedor;

include_once("../../class/grupo.php");
$grupo=new grupo;

$datos=array();
$i=0;
foreach($comp as $a){
    $i++;
    $datos[$i]['codcompra']=$a['codcompra'];
    $datos[$i]['fechacompra']=$a['fechacompra'];
    $datos[$i]['total']=$a['total'];
    $datos[$i]['tipocompra']=$a['tipocompra'];
    $datos[$i]['fechacancelacion']=$a['fechacancelacion'];
    
    $p=$proveedor->mostrarRegistro($a['codproveedor']);
    $p=array_shift($p);
    

    $datos[$i]['proveedor']=$p['nombre'];

}
listadotabla(array("proveedor"=>"Proveedor","fechacompra"=>"Fecha de  Compra","total"=>"Total","tipocompra"=>"Tipo Compra","fechacancelacion"=>"Fecha Cancelación"),$datos,1,"","","");
?>