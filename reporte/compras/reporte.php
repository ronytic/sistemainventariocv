<?php
include_once("../../login/check.php");
extract($_GET);
if($fechacompradesde!=""){
    

    $fecha="fechacompra BETWEEN '$fechacompradesde' and '$fechacomprahasta'";
}else{
    $fechacompradesde=$fechacompradesde!=""?$fechacompradesde:'%';
    $fechacomprahasta=$fechacomprahasta!=""?$fechacomprahasta:'%';
    $fecha="fechacompra LIKE '%'";
}
$fechacancelacion=$fechacancelacion!=""?$fechacancelacion:'%';
include_once("../../class/compra.php");
$compra=new compra;
$com=$compra->mostrarTodoRegistro("codproveedor LIKE '$codproveedor' and tipocompra LIKE '$tipocompra' and fechacancelacion LIKE '$fechacancelacion' and $fecha",1,"");

//print_r($com);
include_once("../../class/proveedor.php");
$proveedor=new proveedor;

/*
include_once("../../class/unidad.php");
$unidad=new unidad;


include_once("../../class/tipo.php");
$tipo=new tipo;


include_once("../../class/subtipo.php");
$subtipo=new subtipo;

include_once("../../class/material.php");
$material=new material;

include_once("../../class/almacen.php");
$almacen=new almacen;

include_once("../../class/cliente.php");
$cliente=new cliente;
*/

include_once("../../impresion/pdf.php");
$titulo="Reporte de Compra de Articulos";
class PDF extends PPDF{
    function Cabecera(){

        $this->TituloCabecera(8,"N");
        $this->TituloCabecera(40,"Proveedor");
        $this->TituloCabecera(35,"Fecha de Compra");
        $this->TituloCabecera(25,"Total");
        $this->TituloCabecera(30,"Tipo de Compra");
        $this->TituloCabecera(35,"Fecha Cancelación");
        
    }
}

$pdf=new PDF("P","mm","letter");
$pdf->Addpage();
$i=0;
$total=0;
$datos=array();
foreach($com as $c){
    
    /*$m=$material->mostrarTodoRegistro("codmaterial=".$in['codmaterial'],1,"nombre");
    $m=array_shift($m);
    $pro=$proveedor->mostrarTodoRegistro("codproveedor=".$in['codproveedor'],1,"nombre");
    $p=array_shift($pro);
    $uni=$unidad->mostrarTodoRegistro("codunidad=".$m['codunidad'],1,"nombre");
    $u=array_shift($uni);
    $tip=$tipo->mostrarTodoRegistro("codtipo=".$in['codtipo'],1,"nombre");
    $t=array_shift($tip);
    $stipo=$subtipo->mostrarTodoRegistro("codsubtipo=".$in['codsubtipo'],1,"nombre");
    $st=array_shift($stipo);
    
    
    
    $cli=$cliente->mostrarTodoRegistro("codcliente=".$in['codcliente'],1,"nombre");
    $cli=array_shift($cli);
    */
    $pro=$proveedor->mostrarTodoRegistro("codproveedor=".$c['codproveedor'],1,"nombre");
    $pro=array_shift($pro);
    
    $i++;
    $datos[$i]['codingreso']=$in['codingreso'];
    

    $total=$total+$c['total'];
    
    
    $pdf->CuadroCuerpo(8 ,$i,0,"R");
    $pdf->CuadroCuerpo(40,$pro['nombre']);
    
    $pdf->CuadroCuerpo(35,$c['fechacompra']);
    $pdf->CuadroCuerpo(25,number_format($c['total'],2,".",""),0,"R");
    $pdf->CuadroCuerpo(30,$c['tipocompra']);
    $pdf->CuadroCuerpo(35,$c['fechacancelacion']);
   
    $pdf->ln();
}
$pdf->CuadroCuerpo(83,"Total",1,"R",1,"","B");
$pdf->CuadroCuerpo(25,number_format($total,2,".",""),1,"R",1,"","B");

$i++;
$datos[$i]['codingreso']=0;
$datos[$i]['stockanterior']="Total";
$datos[$i]['cantidad']=$total;


$pdf->Output();

?>