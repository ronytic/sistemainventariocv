<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/grupo.php");
$grupo=new grupo;

$valores=array("nombre"=>"'$nombre'",
               "detalle"=>"'$detalle'",
               
            );


$grupo->actualizarRegistro($valores,"codgrupo=".$cod);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>