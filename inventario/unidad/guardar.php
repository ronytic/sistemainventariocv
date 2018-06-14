<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/unidad.php");
$unidad=new unidad;
$valores=array("nombre"=>"'$nombre'",
               "abreviatura"=>"'$abreviatura'",
               "detalle"=>"'$detalle'",
               
            );
$unidad->insertarRegistro($valores);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>