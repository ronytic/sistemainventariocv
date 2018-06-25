<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/cobrar.php");
$cobrar=new cobrar;
$valores=array("codcliente"=>"'$codcliente'",
                "tipo"=>"'$tipo'",
               "nroboleta"=>"'$nroboleta'",
               "fechadeuda"=>"'$fechadeuda'",
               "fechacancelacion"=>"'$fechacancelacion'",
               "total"=>"'$total'",
               "acuenta"=>"'$acuenta'",
              "saldo"=>"'$saldo'",
               "estado"=>"'$estado'",
               "detalle"=>"'$detalle'",
            );
$cobrar->insertarRegistro($valores);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>