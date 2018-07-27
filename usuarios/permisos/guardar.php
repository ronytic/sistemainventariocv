<?php
include_once("../../login/check.php");
/*echo "<pre>";
print_r($_POST);
echo "</pre>";*/
extract($_POST);
include_once("../../class/menu.php");
$menu=new menu;
include_once("../../class/submenu.php");
$submenu=new submenu;

$valores=array("$Nivel"=>"0");
$menu->actualizarRegistro($valores,"");
foreach($m as $k=>$v){
    
    $valores=array("$Nivel"=>"1");
    $menu->actualizarRegistro($valores,"CodMenu=".$k);
}
$valores=array("$Nivel"=>"0");
$submenu->actualizarRegistro($valores,"");
foreach($sm as $k=>$v){
    $valores=array("$Nivel"=>"1");
    $submenu->actualizarRegistro($valores,"CodSubmenu=".$k);
}
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=0;
$listar=0;
$botones=array("Revisar Permisos"=>array("index.php","success"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>