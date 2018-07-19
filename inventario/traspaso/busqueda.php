<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/traspaso.php");
$traspaso=new traspaso;

$fechatraspaso=$fechatraspaso!=""?$fechatraspaso:'%';
$fechacancelacion=$fechacancelacion!=""?$fechacancelacion:'%';
$tras=$traspaso->mostrarTodoRegistro("codarticulosalida LIKE '$codarticuloorigen' and codarticuloentrada LIKE '$codarticulodestino' and fechatraspaso LIKE '$fechatraspaso'",1,"fechatraspaso");

//print_r($tras);


include_once("../../class/articulo.php");
$articulo=new articulo;

include_once("../../class/unidad.php");
$unidad=new unidad;

$datos=array();
$i=0;
foreach($tras as $t){
    $i++;
    $datos[$i]['codtraspaso']=$t['codtraspaso'];
    $datos[$i]['fechatraspaso']=$t['fechatraspaso'];
    

    
    $as=$articulo->mostrarRegistro($t['codarticulosalida']);
    $as=array_shift($as);
    $ae=$articulo->mostrarRegistro($t['codarticuloentrada']);
    $ae=array_shift($ae);

    $datos[$i]['articulosaliente']=$as['nombre'];
    
    $datos[$i]['articuloentrada']=$ae['nombre'];
    
    $us=$unidad->mostrarRegistro($as['codunidad']);
    $us=array_shift($us);
    
    $ue=$unidad->mostrarRegistro($ae['codunidad']);
    $ue=array_shift($ue);
    
    $datos[$i]['cantidadsalida']=$t['cantidadsalida']." ".$us['nombre'];
    $datos[$i]['cantidadentrada']=$t['cantidadentrada']." ".$ue['nombre'];

}
listadotabla(array("articulosaliente"=>"Articulo Saliente","cantidadsalida"=>"Cantidad Saliente","articuloentrada"=>"Articulo Entrada","cantidadentrada"=>"Cantidad Entrada","fechatraspaso"=>"Fecha Traspaso"),$datos,1,"","","");
?>