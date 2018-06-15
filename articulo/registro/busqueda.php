<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/articulo.php");
$articulo=new articulo;
$art=$articulo->mostrarTodoRegistro("codgrupo LIKE '$codgrupo' and nombre LIKE '$nombre%'",1,"nombre");




include_once("../../class/unidad.php");
$unidad=new unidad;

include_once("../../class/grupo.php");
$grupo=new grupo;

$datos=array();
$i=0;
foreach($art as $a){
    $i++;
    $datos[$i]['codarticulo']=$a['codarticulo'];
    $datos[$i]['codigointerno']=$a['codigointerno'];
    $datos[$i]['nombre']=$a['nombre'];
    $datos[$i]['preciominimo']=$a['preciominimo'];
    $datos[$i]['precioventa']=$a['precioventa'];
    $datos[$i]['stockminimo']=$a['stockminimo'];
    $datos[$i]['stockmaximo']=$a['stockmaximo'];
    
    $u=$unidad->mostrarRegistro($a['codunidad']);
    $u=array_shift($u);
    $g=$grupo->mostrarRegistro($a['codgrupo']);
    $g=array_shift($g);
    $datos[$i]['grupo']=$g['nombre'];
    $datos[$i]['unidad']=$u['nombre'];
}
listadotabla(array("codigointerno"=>"Cod Int.","nombre"=>"Nombre","grupo"=>"Grupo","unidad"=>"Unidad","preciominimo"=>"Precio Min","precioventa"=>"Precio  Ven","stockminimo"=>"Stock Min","stockmaximo"=>"Stock Max"),$datos,1,"","modificar.php","eliminar.php");
?>