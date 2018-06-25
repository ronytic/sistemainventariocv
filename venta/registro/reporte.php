<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Recibo de Venta";
$codventa=$_GET['Cod'];
include_once("../../class/venta.php");
$venta=new venta;
include_once("../../class/ventadetalle.php");
$ventadetalle=new ventadetalle;
include_once("../../class/cliente.php");
$cliente=new cliente;
include_once("../../class/articulo.php");
$articulo=new articulo;
include_once("../../class/unidad.php");
$unidad=new unidad;
include_once("../../class/usuario.php");
$usuario=new usuario;

$v=$venta->mostrarRegistro($codventa);
$v=array_shift($v);

//print_r($v);
$cli=$cliente->mostrarRegistro($v['codcliente']);
$cli=array_shift($cli);
//print_r($cli);




$us=$usuario->mostrarRegistro($v['codusuario']);
$us=array_shift($us);

$vend=$ventadetalle->mostrarTodoRegistro("codventa=".$v['codventa']);
include_once("../../impresion/pdf.php");
class PDF extends PPDF{
    function Cabecera(){
        
        global $cli,$al,$v;

        $this->CuadroCabecera(90,"",40,"");
        $this->CuadroCabecera(30,"Nro de Venta:",40,$v['codventa']);
        $this->ln();$this->ln();
        $this->CuadroCabecera(20,"Cliente:",40,$cli['nombre']." ".$cli['apellido']);
        $this->CuadroCabecera(20,"Teléfono:",40,$cli['telefonos']);
        $this->CuadroCabecera(20,"Contacto:",40,$cli['contacto']);
        $this->ln();
        $this->ln();
        $this->CuadroCabecera(30,"Fecha de Venta:",30,$v['fechaventa']);
        $this->CuadroCabecera(30,"Tipo de Venta:",20,$v['tipoventa']);
        $this->CuadroCabecera(40,"Fecha de Cancelación:",20,$v['fechacancelacion']);
        $this->ln();
$this->ln();
        $this->TituloCabecera(8,"N");
        $this->TituloCabecera(15,"Codigo");
        $this->TituloCabecera(50,"Nombre");

        $this->TituloCabecera(20,"Cant");
        $this->TituloCabecera(25,"UM");
        $this->TituloCabecera(20,"Precio");
        $this->TituloCabecera(20,"Descuento");
        $this->TituloCabecera(20,"Total");
    }
}
$pdf=new PDF("P","mm","letter");
$pdf->Addpage();

//print_r($cotd);
$i=0;
foreach($vend as $vd){
    $art=$articulo->mostrarRegistro($vd['codarticulo']);
    $art=array_shift($art);
    $u=$unidad->mostrarRegistro($art['codunidad']);
    $u=array_shift($u);
    $i++;
    $pdf->CuadroCuerpo(8,"$i",0,0,1);
    $pdf->CuadroCuerpo(15,$art['codigointerno'],0,"L",1,10);
    $pdf->CuadroCuerpo(50,$art['nombre'],0,"L",1,10);

    $pdf->CuadroCuerpo(20,$vd['cantidad'],0,0,1);
    $pdf->CuadroCuerpo(25,$u['nombre'],0,0,1,9);
    $pdf->CuadroCuerpo(20,number_format($vd['precio'],2),0,0,1);
    $pdf->CuadroCuerpo(20,number_format($vd['descuento'],2),0,0,1);
    $pdf->CuadroCuerpo(20,number_format($vd['subtotal'],2,".",""),0,0,1);
    $pdf->ln();
}
$pdf->CuadroCuerpo(118,"Son:".num2letras(number_format($v['total'],2,".","")),0,"L",1,9,"B");
$pdf->CuadroCuerpo(40,"Subtotal:",0,"R",1,9,"B");
$pdf->CuadroCuerpo(20,number_format($v['total'],2,".",""),0,"R",1,9,"B");
$pdf->ln();
$pdf->CuadroCuerpo(118,"",0,"L",0,9,"B");
$pdf->CuadroCuerpo(40,"Cancelado:",0,"R",1,9,"B");
$pdf->CuadroCuerpo(20,number_format($v['cancelado'],2,".",""),0,"R",1,9,"B");
$pdf->ln();
$pdf->CuadroCuerpo(118,"",0,"L",0,9,"B");
$pdf->CuadroCuerpo(40,"Cambio:",0,"R",1,9,"B");
$pdf->CuadroCuerpo(20,number_format($v['cambio'],2,".",""),0,"R",1,9,"B");
$pdf->ln();
$pdf->ln();
$pdf->CuadroCuerpo(25,"Obervación:",0,"",0,9,"B");
$pdf->CuadroCuerpoMulti(115,$v['observacion'],0,"",0,9,"");
$pdf->ln();

$pdf->CuadroCuerpo(25,"Responsable y Consulta",0,"",0,9,"B");
$pdf->ln();
$pdf->CuadroCuerpo(25,"Nombre:",0,"",0,9,"B");
$pdf->CuadroCuerpo(25,$us['Paterno']." ".$us['Materno']." ".$us['Nombres'],0,"",0,9,"");
$pdf->ln();
$pdf->CuadroCuerpo(25,"Cargo:",0,"",0,9,"B");
$pdf->CuadroCuerpo(25,$us['Cargo'],0,"",0,9,"");
$pdf->ln();
$pdf->CuadroCuerpo(25,"Teléfono:",0,"",0,9,"B");
$pdf->CuadroCuerpo(25,$us['Telefono'],0,"",0,9,"");
$pdf->ln();






$pdf->ln(30);
$pdf->CuadroCuerpo(20,"",0,"C","0",9,"");
$pdf->CuadroCuerpo(50,"Firma del Responsable",0,"C","T",9,"");
$pdf->CuadroCuerpo(40,"",0,"C","0",9,"");
$pdf->CuadroCuerpo(50,"Firma del Cliente",0,"C","T",9,"");
$pdf->Output();
?>