<?php

$Nivel=$_SESSION['Nivel'];
$CodUsuarioLog=$_SESSION['CodUsuarioLog'];
include_once("class/usuario.php");

$usuario2=new usuario;
$us2=$usuario2->mostrarDatos($CodUsuarioLog);
$us2=array_shift($us2);
$NombreUsuario=$us2['Nombres'];
$PaternoUsuario=$us2['Paterno'];
$MaternoUsuario=$us2['Materno'];
switch($Nivel){
    case 1:{$NivelUsuario="Administrador";}break;   
    case 2:{$NivelUsuario="Gerente";}break;   
    case 3:{$NivelUsuario="Administrador";}break;   
    case 4:{$NivelUsuario="Vendedor";}break;      
    case 4:{$NivelUsuario="Almacen";}break;    
}

include_once("configuracion.php");

include_once("class/menu.php");
$menu=new menu;
include_once("class/submenu.php");
$submenu=new submenu;
?>
<!DOCTYPE html>

<html lang="en" class="default-style">


<!-- Mirrored from uxpowered.com/products/appwork/v100/html-demo/forms_layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Jun 2018 14:54:22 GMT -->
<head>
  <title><?=$TituloSistema;?></title>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
  <meta name="description" content="">
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="icon" type="image/x-icon" href="<?=$folder;?>imagenes/favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

  <!-- Icon fonts -->
  <link rel="stylesheet" href="<?=$folder;?>css/fonts/fontawesome.css">
  <link rel="stylesheet" href="<?=$folder;?>css/fonts/ionicons.css">
  <link rel="stylesheet" href="<?=$folder;?>css/fonts/linearicons.css">
  <link rel="stylesheet" href="<?=$folder;?>css/fonts/open-iconic.css">
  <link rel="stylesheet" href="<?=$folder;?>css/fonts/pe-icon-7-stroke.css">

  <!-- Core stylesheets -->
  <link rel="stylesheet" href="<?=$folder;?>css/rtl/bootstrap.css" class="theme-settings-bootstrap-css">
  <link rel="stylesheet" href="<?=$folder;?>css/rtl/appwork.css" class="theme-settings-appwork-css">
  <link rel="stylesheet" href="<?=$folder;?>css/rtl/theme-corporate.css" class="theme-settings-theme-css">
  <link rel="stylesheet" href="<?=$folder;?>css/rtl/colors.css" class="theme-settings-colors-css">
  <link rel="stylesheet" href="<?=$folder;?>css/rtl/uikit.css">
  <link rel="stylesheet" href="<?=$folder;?>css/demo.css">
  <link rel="stylesheet" href="<?=$folder;?>css/estilo.css">

  <script src="<?=$folder;?>js/core/material-ripple.js"></script>
  <script src="<?=$folder;?>js/core/layout-helpers.js"></script>
  <!-- Core scripts -->
  <script src="<?=$folder;?>js/core/pace.js"></script>
  <script src="<?=$folder;?>js/core/jquery.min.js"></script>
  <!-- Theme settings -->
  <!-- This file MUST be included after core stylesheets and layout-helpers.js in the <head> section -->
  <!--<script src="<?=$folder;?>js/core/theme-settings.js"></script>-->
  <script>
      var folder="<?=$folder;?>";
    /*window.themeSettings = new ThemeSettings({
      cssPath: folder+'css/rtl/',
      themesPath: folder+'css/rtl/'
    });*/
  </script>



  <!-- Libs -->
  <link rel="stylesheet" href="<?=$folder;?>css/perfect-scrollbar/perfect-scrollbar.css">