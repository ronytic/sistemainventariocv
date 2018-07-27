<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/menu.php");
$menu=new menu;
$men=$menu->mostrarTodoRegistro("",1,"Orden");

switch($CodNivel){
        case "2":{$Nivel="Gerente";}break;
        case "3":{$Nivel="Administrador";}break;
        case "4":{$Nivel="Vendedor";}break;
        case "5":{$Nivel="Almacen";}break;
        default:$Nivel="";

    }


include_once("../../class/submenu.php");
$submenu=new submenu;



$datos=array();
$i=0;
?>
<form action="guardar.php" method="post">
<input type="hidden" name="Nivel" value="<?=$Nivel?>">
<table class="table table-condensed table-bordered table-hover">
<?php
foreach($men as $m){
    $mm=$menu->mostrarTodoRegistro("CodMenu=".$m['CodMenu']." and $Nivel=1",1,"Orden"); 
     $checm=count($mm)?'checked="checked"':'';

    $datos[$i]['CodMenu']=$m['CodMenu'];
    $submen=$submenu->mostrarTodoRegistro("CodMenu=".$m['CodMenu'],1,"Orden");
    ?>
    <tr>
        <td>
        
        <label><input type="checkbox" class="form-checkbox" <?=$checm?> name="m[<?=$m['CodMenu']?>]">
        <b><?=$m['Nombre']?></b>
        </label>
        <br>
        
        <?php
        foreach($submen as $sm){
           $ssmm=$submenu->mostrarTodoRegistro("CodSubmenu=".$sm['CodSubmenu']." and $Nivel=1",1,"Orden"); 
            $chec=count($ssmm)?'checked="checked"':'';
         ?>
         <span >
             <label class="badge " style="border: rgba(208,208,208,1.00) 1px solid">

             <input type="checkbox" class="form-checkbox" <?=$chec?> name="sm[<?=$sm['CodSubmenu']?>]">
             
             <?=$sm['Nombre']?>
             </label>
         </span>
         <?php
        }
        ?>
        
        </td>
    </tr>
    <?php
    
}

?>
</table>
<input type="submit" value="Guardar" class="btn btn-success">
</form>