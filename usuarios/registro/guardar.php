<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/usuario.php");
$usuario=new usuario;
$valores=array("Usuario"=>"'$Usuario'",
                "Pass2"=>"MD5('$Pass')",
                "Nivel"=>"'$Nivel'",
               "Nombres"=>"'$Nombres'",
               "Paterno"=>"'$Paterno'",
               "Materno"=>"'$Materno'",
               "Cargo"=>"'$Cargo'",
               "Ci"=>"'$Ci'",
               "Direccion"=>"'$Direccion'",
               "Telefono"=>"'$Telefono'",
               "Celular"=>"'$Celular'",
               "Observacion"=>"'$Observacion'",
               "CodUsuarioRegistro"=>"'".$_SESSION['CodUsuarioLog']."'",
                "NivelRegistro"=>"'".$_SESSION['Nivel']."'",
               "FechaRegistro"=>"'".date("Y-m-d")."'",
               "HoraRegistro"=>"'".date("H:i:s")."'",
               "Activo"=>"'1'",
              
            );
$usuario->insertarRegistro($valores,0);
//print_r($valores);
$titulo="Mensaje de Confirmación";
$folder="../../";
$nuevo=1;
$listar=1;
//$botones=array("Facturar"=>array("facturar.php","danger"));
$mensajes[]="Sus datos fueron guardados correctamente.";
include_once("../../respuesta.php");
?>