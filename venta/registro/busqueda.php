<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/venta.php");
$venta=new venta;

$fechaventa=$fechaventa!=""?$fechaventa:'%';
$fechacancelacion=$fechacancelacion!=""?$fechacancelacion:'%';
$ven=$venta->mostrarTodoRegistro("codcliente LIKE '$codcliente' and fechaventa LIKE '$fechaventa' and tipoventa LIKE '$tipoventa' and fechacancelacion LIKE '$fechacancelacion'",1,"fechaventa");




include_once("../../class/cliente.php");
$cliente=new cliente;

include_once("../../class/grupo.php");
$grupo=new grupo;

$datos=array();
$i=0;
foreach($ven as $a){
    $i++;
    $datos[$i]['codventa']=$a['codventa'];
    $datos[$i]['fechaventa']=$a['fechaventa'];
    $datos[$i]['total']=$a['total'];
    $datos[$i]['cancelado']=$a['cancelado'];
    $datos[$i]['cambio']=$a['cambio'];
    $datos[$i]['tipoventa']=$a['tipoventa'];
    $datos[$i]['fechacancelacion']=$a['fechacancelacion'];
    
    $p=$cliente->mostrarRegistro($a['codcliente']);
    $p=array_shift($p);
    

    $datos[$i]['cliente']=$p['nombre']." ".$p['apellido'];

}
//print_r($datos);
listadotabla(array("cliente"=>"Cliente","fechaventa"=>"Fecha de  Venta","total"=>"Total","cancelado"=>"Cancelado","cambio"=>"Cambio","tipoventa"=>"Tipo Venta","fechacancelacion"=>"Fecha Cancelación"),$datos,1,"boleta.php","","");
?>