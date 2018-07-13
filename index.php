<?php
include_once("login/check.php");
$folder="";
$titulo="Inicio de Sistema";
$Subtitulo="";
?>
<?php require_once($folder."cabecerahtml.php")?>
<?php require_once($folder."cabecera.php")?>

            
  <script src="<?=$folder;?>js/core/dashboards_dashboard-1.js"></script>
              <!-- / Charts -->
<?php require_once($folder."pie.php")?>