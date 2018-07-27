<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/usuario.php");
$usuario=new usuario;
$us=$usuario->mostrarTodoRegistro("nivel LIKE '$nivel' and nombres LIKE '$nombres%' and Nivel!=1",1,"paterno,materno,nombres");




include_once("../../class/unidad.php");
$unidad=new unidad;

include_once("../../class/grupo.php");
$grupo=new grupo;

$datos=array();
$i=0;
foreach($us as $u){
    $i++;
    switch($u['Nivel']){
        case "2":{$Nivel="Gerente";}break;
        case "3":{$Nivel="Administrador";}break;
        case "4":{$Nivel="Ventas";}break;
        case "5":{$Nivel="Almacen";}break;
        default:$Nivel="";

    }
    $datos[$i]['CodUsuario']=$u['CodUsuario'];
    $datos[$i]['Paterno']=$u['Paterno'];
    $datos[$i]['Materno']=$u['Materno'];
    $datos[$i]['Nombres']=$u['Nombres'];
    $datos[$i]['Usuario']=$u['Usuario'];
    $datos[$i]['Nivel']=$Nivel;
    
}
listadotabla(array("Paterno"=>"Paterno","Materno"=>"Materno","Nombres"=>"Nombres","Nivel"=>"Nivel","Usuario"=>"Usuario"),$datos,1,"","modificar.php","eliminar.php");
?>