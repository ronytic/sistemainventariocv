<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$valores=array("nombre"=>"'$nombre'",
                "direccion"=>"'$direccion'",
               "nit"=>"'$nit'",
               "fax"=>"'$fax'",
               "contacto"=>"'$contacto'",
               "telefonos"=>"'$telefonos'",
               "memo"=>"'$memo'",
              
               
            );
$proveedor->insertarRegistro($valores);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>