<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/cliente.php");
$cliente=new cliente;
$cli=$cliente->mostrarTodoRegistro("nombre LIKE '$nombre%' and apellido LIKE '$apellido%'",1,"nombre");
listadotabla(array("nombre"=>"Nombre","apellido"=>"Apellido","direccion"=>"Dirección","maximocredito"=>"Máximo Crédito","diascredito"=>"Días Crédito","telefonos"=>"Teléfonos","totaldeuda"=>"Total Deuda","fechapagar"=>"Fecha Pagar"),$cli,1,"","modificar.php","eliminar.php");
?>