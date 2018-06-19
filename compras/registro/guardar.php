<?php
include_once("../../login/check.php");
extract($_POST);

include_once("../../class/compra.php");
$compra=new compra;
include_once("../../class/compradetalle.php");
$compradetalle=new compradetalle;
$valores=array("codproveedor"=>"'$codproveedor'",
                "fechacompra"=>"'$fechacompra'",
               "total"=>"'$total'",
               "tipocompra"=>"'$tipocompra'",
               "fechacancelacion"=>"'$fechacancelacion'",
              
            );
$compra->insertarRegistro($valores);
$codcompra=$compra->ultimo();
foreach($c as $pr){
    extract($pr);
    $valores=array(
                "codcompra"=>"'$codcompra'",
                "codarticulo"=>"'$codarticulo'",
                "cantidad"=>"'$cantidad'",
               "precio"=>"'$precio'",
               "subtotal"=>"'$subtotal'",
              
            );
    $compradetalle->insertarRegistro($valores);
}
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>