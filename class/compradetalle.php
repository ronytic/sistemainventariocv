<?php
include_once("bd.php");
class compradetalle extends bd{
	var $tabla="compradetalle";

	function cantidadCompras($codarticulo){
        $this->campos=array('sum(cantidad) as CompraTotal');
        return $this->mostrarTodoRegistro("codarticulo=$codarticulo",1,"");
    }
}
?>