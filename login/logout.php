<?php
session_start();
include_once("../configuracion.php");
include_once("../funciones/url.php");
foreach($_SESSION as $k=>$v){
//	echo $k."-".$v;
	unset($_SESSION[$k]);
}
unset($_SESSION["CodUsuarioLog"]);
unset($_SESSION["LoginSistemaInvCV"]);
unset($_SESSION["Nivel"]);
unset($_SESSION["Pass"]);
session_destroy();
header("Location:".url_base().$directory);
?>