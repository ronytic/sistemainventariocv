<?php
include_once("../../login/check.php");
extract($_GET);
if($fechacompradesde!=""){
    

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

//print_r($ven);
include_once("../../class/cliente.php");
$cliente=new cliente;

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
$titulo="Reporte de Venta de Articulos";
class PDF extends PPDF{
    function Cabecera(){

        $this->TituloCabecera(8,"N");
        $this->TituloCabecera(40,"Cliente");
        $this->TituloCabecera(25,"Fecha Venta");
        $this->TituloCabecera(20,"Total");
        $this->TituloCabecera(20,"Cancelado");
        $this->TituloCabecera(20,"Cambio");
        $this->TituloCabecera(20,"Tipo Venta");
        $this->TituloCabecera(35,"Fecha Cancelación");
        
    }
}

$pdf=new PDF("P","mm","letter");
$pdf->Addpage();
$i=0;
$total=0;
$cancelado=0;
$cambio=0;
$datos=array();
foreach($ven as $v){
    
    
    $cli=$cliente->mostrarTodoRegistro("codcliente=".$v['codcliente'],1,"nombre");
    $cli=array_shift($cli);
    
    $i++;
    $datos[$i]['codingreso']=$in['codingreso'];
    

    $total=$total+$v['total'];
    $cancelado=$cancelado+$v['cancelado'];
    $cambio=$cambio+$v['cambio'];
    
    $pdf->CuadroCuerpo(8 ,$i,0,"R");
    $pdf->CuadroCuerpo(40,$cli['nombre']." ".$cli['apellido']);
    $pdf->CuadroCuerpo(25,$v['fechaventa']);
    $pdf->CuadroCuerpo(20,number_format($v['total'],2,".",""),1,"R",1);
    $pdf->CuadroCuerpo(20,number_format($v['cancelado'],2,".",""),1,"R",1);
    $pdf->CuadroCuerpo(20,number_format($v['cambio'],2,".",""),1,"R",1);
    $pdf->CuadroCuerpo(20,$v['tipoventa']);
    $pdf->CuadroCuerpo(35,$v['fechacancelacion']);
   
    $pdf->ln();
}
$pdf->CuadroCuerpo(73,"Total",1,"R",1,"","B");
$pdf->CuadroCuerpo(20,number_format($total,2,".",""),1,"R",1,"","B");
$pdf->CuadroCuerpo(20,number_format($cancelado,2,".",""),1,"R",1,"","B");
$pdf->CuadroCuerpo(20,number_format($cambio,2,".",""),1,"R",1,"","B");
$i++;
$datos[$i]['codingreso']=0;
$datos[$i]['stockanterior']="Total";
$datos[$i]['cantidad']=$total;


$pdf->Output();

?>