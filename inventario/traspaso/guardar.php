<?php
include_once("../../login/check.php");
extract($_POST);


include_once("../../class/traspaso.php");
$traspaso=new traspaso;
$valores=array("fechatraspaso"=>"'$fechatraspaso'",
                "codarticulosalida"=>"'$codarticuloorigen'",
               "codarticuloentrada"=>"'$codarticulodestino'",
               "stocksalida"=>"'$stockorigen'",
               "stockentrada"=>"'$stockdestino'",
               "cantidadsalida"=>"'$cantidadorigen'",
               "cantidadentrada"=>"'$cantidaddestino'",
            );
$traspaso->insertarRegistro($valores);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>