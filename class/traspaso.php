<?php
include_once("bd.php");
class traspaso extends bd{
	var $tabla="traspaso";

	function cantidadSalida($codarticulo){
        $this->campos=array('sum(cantidadsalida) as CantidadSalida');
        return $this->mostrarTodoRegistro("codarticulosalida=$codarticulo",1,"");
    }
    function cantidadEntrada($codarticulo){
        $this->campos=array('sum(cantidadentrada) as CantidadEntrada');
        return $this->mostrarTodoRegistro("codarticuloentrada=$codarticulo",1,"");
    }
}
?>