<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/grupo.php");
$grupo=new grupo;
$cli=$grupo->mostrarTodoRegistro("nombre LIKE '$nombre%'",1,"nombre");
listadotabla(array("nombre"=>"Nombre","detalle"=>"Detalle"),$cli,1,"","modificar.php","eliminar.php");
?>