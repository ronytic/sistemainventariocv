<?php
include_once("../../login/check.php");
$folder="../../";
$a=array();
foreach($_POST as $k=>$v){
    array_push($a,"$k=$v");
}
$url="reporte.php?".implode("&",$a);
extract($_POST);
if($fechaventadesde!=""){
    

    $fecha="fechaventa BETWEEN '$fechaventadesde' and '$fechaventahasta'";
}else{
    $$fechaventadesde=$fechaventadesde!=""?$$fechaventadesde:'%';
    $fechaventahasta=$fechaventahasta!=""?$fechaventahasta:'%';
    $fecha="fechaventa LIKE '%'";
}
$fechacancelacion=$fechacancelacion!=""?$fechacancelacion:'%';
include_once("../../class/venta.php");
$venta=new venta;
$ven=$venta->mostrarTodoRegistro("codcliente LIKE '$codcliente' and tipoventa LIKE '$tipoventa' and fechacancelacion LIKE '$fechacancelacion' and $fecha",1,"");

include_once("../../class/cliente.php");
$cliente=new cliente;
$titulo="Reporte de Venta";
?>
<a href="#" class="btn btn-success btn-xs exportarexcel">Exportar tabla a excel</a>
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th colspan="6"><?=$titulo?></th>

        </tr>
        <tr>
            <th>N</th>
            <th>Cliente</th>
            <th>Fecha de Venta</th>
            <th>Total</th>
            <th>Cancelado</th>
            <th>Cambio</th>
            <th>Tipo de Venta</th>
            <th>Fecha Cancelacion</th>
        </tr>
        
    </thead>
    <?php 
    $i=0;
    foreach($ven as $v){        $i++;


        $cli=$cliente->mostrarTodoRegistro("codcliente=".$v['codcliente'],1,"nombre");
    $cli=array_shift($cli);
        
        

       ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$cli['nombre']?> <?=$cli['apellido']?></td>
            <td><?=$v['fechaventa']?></td>
            <td><?=number_format($v['total'],2,".","")?></td>
            <td><?=number_format($v['cancelado'],2,".","")?></td>
            <td><?=number_format($v['cambio'],2,".","")?></td>
            <td><?=$v['tipoventa']?></td>
            <td><?=$v['fechacancelacion']?></td>
            <td>
                <a href="reporte.php?codventa=<?=$v['codventa']?>" class="btn btn-info btn-xs">Ver Venta</a>
            </td>
        </tr>
        <?php

        $total=$total+$c['total'];
        }?>
</table>

<!--
<a href="<?=$url?>" target="_blank" class="btn btn-success btn-xs">Abrir en una nueva Ventana</a>
<iframe src="<?=$url?>" frameborder="0" width="100%" height="600"></iframe>
-->