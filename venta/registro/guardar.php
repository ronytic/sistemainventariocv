<?php
include_once("../../login/check.php");
extract($_POST);

include_once("../../class/venta.php");
$venta=new venta;
include_once("../../class/ventadetalle.php");
$ventadetalle=new ventadetalle;
$valores=array("codcliente"=>"'$codcliente'",
                "fechaventa"=>"'$fechaventa'",
               "total"=>"'$total'",
               "cancelado"=>"'$cancelado'",
               "cambio"=>"'$cambio'",
               "observacion"=>"'$observacion'",
               "tipoventa"=>"'$tipoventa'",
               "fechacancelacion"=>"'$fechacancelacion'",
              
            );
//$venta->insertarRegistro($valores);
$codventa=$venta->ultimo();
foreach($c as $pr){
    extract($pr);
    $valores=array(
                "codventa"=>"'$codventa'",
                "codarticulo"=>"'$codarticulo'",
                "cantidad"=>"'$cantidad'",
               "precio"=>"'$precio'",
                "descuento"=>"'$descuento'",
               "subtotal"=>"'$subtotal'",
              
            );
//    $ventadetalle->insertarRegistro($valores);
}

include_once("../../class/cobrar.php");
$cobrar=new cobrar;
$valores=array("codcliente"=>"'$codcliente'",
                "tipo"=>"'Sistema'",
               "nroboleta"=>"'$codventa'",
               "fechadeuda"=>"'$fechaventa'",
               "fechacancelacion"=>"'$fechacancelacion'",
               "total"=>"'$total'",
               "acuenta"=>"'$cancelado'",
              "saldo"=>"'$cambio'",
               "estado"=>"'Pendiente'",
               "detalle"=>"'Venta Directa - $observacion'",
            );
 //   $cobrar->insertarRegistro($valores);
$codventa=3;
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
$botones=array("Boleta de Venta"=>array("boleta.php?codventa=$codventa","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>