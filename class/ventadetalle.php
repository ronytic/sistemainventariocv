<?php
include_once("bd.php");
class ventadetalle extends bd{
	var $tabla="ventadetalle";

	function cantidadVentas($codarticulo){
        $this->campos=array('sum(cantidad) as VentaTotal');
        return $this->mostrarTodoRegistro("codarticulo=$codarticulo",1,"");
    }
}
?>