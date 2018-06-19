<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/articulo.php");
$articulo=new articulo;
$valores=array("codgrupo"=>"'$codgrupo'",
                "codigointerno"=>"'$codigointerno'",
               "nombre"=>"'$nombre'",
               "codunidad"=>"'$codunidad'",
               "preciocompra"=>"'$preciocompra'",
               "precioventa"=>"'$precioventa'",
               "stockminimo"=>"'$stockminimo'",
              "stockmaximo"=>"'$stockmaximo'",
               "detalle"=>"'$detalle'",
            );
$articulo->insertarRegistro($valores);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>