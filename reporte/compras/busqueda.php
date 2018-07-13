<?php
include_once("../../login/check.php");
$folder="../../";
/*$a=array();

foreach($_POST as $k=>$v){
    array_push($a,"$k=$v");
}
$url="reporte.php?".implode("&",$a);
*/

extract($_POST);
if($fechacompradesde!=""){
    

    $fecha="fechacompra BETWEEN '$fechacompradesde' and '$fechacomprahasta'";
}else{
    $fechacompradesde=$fechacompradesde!=""?$fechacompradesde:'%';
    $fechacomprahasta=$fechacomprahasta!=""?$fechacomprahasta:'%';
    $fecha="fechacompra LIKE '%'";
}


include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$fechacancelacion=$fechacancelacion!=""?$fechacancelacion:'%';
include_once("../../class/compra.php");
$compra=new compra;
$com=$compra->mostrarTodoRegistro("codproveedor LIKE '$codproveedor' and tipocompra LIKE '$tipocompra' and fechacancelacion LIKE '$fechacancelacion' and $fecha",1,"");




$titulo="Reporte de Compra de Articulos";
?>
<a href="#" class="btn btn-success btn-xs exportarexcel">Exportar tabla a excel</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="6"><?=$titulo?></th>

        </tr>
        <tr>
            <th>N</th>
            <th>Proveedor</th>
            <th>Fecha de Compra</th>
            <th>Total</th>
            <th>Tipo de Compra</th>
            <th>Fecha Cancelacion</th>
        </tr>
        
    </thead>
    <?php 
    $i=0;
    foreach($com as $c){        $i++;


        $p=$proveedor->mostrarRegistro($c['codproveedor']);
        $p=array_shift($p);
        
        

       ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$p['nombre']?></td>
            <td><?=$c['fechacompra']?></td>
            <td><?=number_format($c['total'],2,".","")?></td>
            <td><?=$c['tipocompra']?></td>
            <td><?=$c['fechacancelacion']?></td>
            <td>
                <a href="reporte.php?codcompra=<?=$c['codcompra']?>" class="btn btn-info btn-xs">Ver Compra</a>
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
