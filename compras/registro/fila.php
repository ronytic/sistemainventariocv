<?php
$f=$_POST['f'];
include_once("../../class/grupo.php");
$grupo=new grupo;
$grpo=$grupo->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/articulo.php");
$articulo=new articulo;
$art=$articulo->mostrarTodoRegistro("",1,"nombre");

?>
<tr>
    <td><?=$f;?></td>
    <td><select name="c[<?=$f;?>][codarticulo]" class="form-control codarticulo" rel="<?=$f?>">
                               <option value="">Seleccionar</option>
                                <?php foreach($art as $d){
                                ?>
                                <option value="<?php echo $d['codgrupo']?>"><?=$d['codigointerno']?> - <?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select></td>
    <td>
        <input type="number" name="c[<?=$f;?>][cantidad]" class="form-control cantidad text-right" rel="<?=$f?>" min="0">
        
    </td>
    <td>
        <input type="number" name="c[<?=$f;?>][precio]" class="form-control precio text-right" rel="<?=$f?>" readonly>
        
    </td>
    <td>
        <input type="number" name="c[<?=$f;?>][subtotal]" class="form-control subtotal text-right" rel="<?=$f?>" readonly value="0">
        
    </td>
    <!--<td>
        <input type="date" name class="form-control fechavencimiento" rel="<?=$f?>">
        
    </td>-->
    
</tr>