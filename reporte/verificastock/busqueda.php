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

include_once("../../venta/stock.php");
//$ventadetalle=new ventadetalle;


$datos=array();
$i=0;
foreach($art as $a){
    $i++;
    $datos[$i]['codarticulo']=$a['codarticulo'];
    $datos[$i]['codigointerno']=$a['codigointerno'];
    $datos[$i]['nombre']=$a['nombre'];
    $stockminimo=$a['stockminimo'];
    
    $u=$unidad->mostrarRegistro($a['codunidad']);
    $u=array_shift($u);
    $g=$grupo->mostrarRegistro($a['codgrupo']);
    $g=array_shift($g);
    
    $datos[$i]['grupo']=$g['nombre'];
    $datos[$i]['unidad']=$u['nombre'];
    $stock=0;
    
    $stock=ObtenerStock($a['codarticulo']);
    if($stock<=$stockminimo){
       $textostock='<span class="badge badge-danger">'.$stock.'</span>'; 
    }else{
        $textostock='<span class="badge badge-success">'.$stock.'</span>'; 
    }
    $textostock="<center>".$textostock."</center>";
    
    $datos[$i]['stock']=$textostock;
    
}
listadotabla(array("codigointerno"=>"Cod Int.","nombre"=>"Nombre","grupo"=>"Grupo","unidad"=>"Unidad","stock"=>"Stock Actual"),$datos,0,"","","");
?>