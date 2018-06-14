<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$cli=$proveedor->mostrarTodoRegistro("nombre LIKE '$nombre%' and nit LIKE '$nit%'",1,"nombre");
listadotabla(array("nombre"=>"Nombre","contacto"=>"Contacto","direccion"=>"Dirección","nit"=>"Nit"),$cli,1,"","modificar.php","eliminar.php");
?>