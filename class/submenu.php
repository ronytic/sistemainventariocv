<?php
include_once("bd.php");
class submenu extends bd{
	var $tabla="submenu";
	function mostrar($Nivel,$Menu){
		$this->campos=array('Nombre','Url');
		switch($Nivel){
			case "1":{return $this->getRecords(" Admin=1 and CodMenu=$Menu and Activo=1","Orden");}break;
			case "2":{return $this->getRecords(" Gerente=1 and CodMenu=$Menu and Activo=1","Orden");}break;
			case "3":{return $this->getRecords(" Administrador=1 and CodMenu=$Menu and Activo=1","Orden");}break;
			case "4":{return $this->getRecords(" Vendedor=1 and CodMenu=$Menu and Activo=1","Orden");}break;
			case "5":{return $this->getRecords(" Almacen=1 and CodMenu=$Menu and Activo=1","Orden");}break;
	}
	}
	function verificar($Directorio,$Nivel){
		switch($Nivel){
			case "1":{return $this->getRecords("Url='$Directorio' and Admin=1 and Activo=1","Orden");}break;
			case "2":{return $this->getRecords("Url='$Directorio' and  Gerente=1 and Activo=1","Orden");}break;
			case "3":{return $this->getRecords("Url='$Directorio' and  Administrador=1 and Activo=1","Orden");}break;
			case "4":{return $this->getRecords("Url='$Directorio' and  Vendedor=1 and Activo=1","Orden");}break;
			case "5":{return $this->getRecords("Url='$Directorio' and  Almacen=1 and Activo=1","Orden");}break;
		}
	}
}
?>