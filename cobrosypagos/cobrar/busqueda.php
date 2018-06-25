<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/cobrar.php");
$cobrar=new cobrar;
$fechacancelacion=$_POST['fechacancelacion']!=""?$fechacancelacion:'%';
$cob=$cobrar->mostrarTodoRegistro("codcliente LIKE '$codcliente' and estado LIKE '$estado' and fechacancelacion LIKE '$fechacancelacion'",1,"fechacancelacion");




include_once("../../class/cliente.php");
$cliente=new cliente;

include_once("../../class/grupo.php");
$grupo=new grupo;

$datos=array();
$i=0;
foreach($cob as $a){
    $i++;
    $datos[$i]['codcobrar']=$a['codcobrar'];
    $datos[$i]['nroboleta']=$a['nroboleta'];

    $datos[$i]['fechadeuda']=$a['fechadeuda'];
    $datos[$i]['fechacancelacion']=$a['fechacancelacion'];
    $datos[$i]['total']=$a['total'];
    $datos[$i]['acuenta']=$a['acuenta'];
    $datos[$i]['saldo']=$a['saldo'];
    $datos[$i]['estado']=$a['estado'];
    $datos[$i]['tipo']=$a['tipo'];
    
    $c=$cliente->mostrarRegistro($a['codcliente']);
    $c=array_shift($c);
    $g=$grupo->mostrarRegistro($a['codgrupo']);
    $g=array_shift($g);
    $datos[$i]['cliente']=$c['nombre']." ".$c['apellido'];
    $datos[$i]['unidad']=$u['nombre'];
}
listadotabla(array("nroboleta"=>"Nr Boleta","cliente"=>"Cliente","fechadeuda"=>"Fecha Deuda","fechacancelacion"=>"Fecha Cancelación","total"=>"Total","acuenta"=>"Acuenta  ","saldo"=>"Saldo ","estado"=>"Estado"),$datos,1,"","modificar.php","eliminar.php");
?>