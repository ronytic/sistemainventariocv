<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$pro=$proveedor->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/articulo.php");
$articulo=new articulo;
$art=$articulo->mostrarTodoRegistro("",1,"nombre");

$titulo="Registro de Compra de Articulos";
?>
<?php require_once($folder."cabecerahtml.php")?>

<script>
    var l=0;
$(document).ready(function(){
    


    $(document).on("change",".codarticulo",function(){

        var fila=$(this).attr("rel");
        var codarticulo=$(this).val();

        $.post("datos.php",{'codarticulo':codarticulo},function(data){

            $(".canti[rel="+fila+"]").attr("max",data.stock)
            $(".stock[rel="+fila+"]").val(data.stock)
            $(".unidad[rel="+fila+"]").html(data.unidad)
        },"json");
    });
     $(document).on("keyup change",".cantidad",function(){
         var fila=$(this).attr("rel");
        var cantidad=parseInt($(this).val());
        var precio=parseInt($(".precio[rel="+fila+"]").val());
         var total=cantidad*precio;
        $(".subtotal[rel="+fila+"]").val(total.toFixed(2));
         sumarTodo()
    });
    $(document).on("keyup change","#descuento",function(){
       var sb=parseFloat($("#subtotal").val()); 
        var desc=parseFloat($(this).val());
        var totalgeneral=sb-desc;
        $("#totalgeneral").val(totalgeneral.toFixed(2))
    });
    var l=0;
    
});
</script>
  <style type="text/css">
    .contenedorstock{
        position: relative;
    }

    .unidad{
        position: absolute;
        top: 0px;
        right: 0px;
    }
</style>
<?php require_once($folder."cabecera.php")?>

                <form action="guardar.php" method="post">
                 
                 <table class="table table-bordered table-hover">
                    <tr>
                        <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Fecha de Traspaso</label>
                            <input type="date" class="form-control" placeholder="" name="fechatraspaso" value="<?=date("Y-m-d")?>">
                          </div>   
                         </td>
                     </tr>
                     
                    </table>
                    <table class="table table-bordered table-hover">
                       <thead>
                           <tr>
                              <th width="90"></th>
                               <th width="50%">Origen</th>
                               <th width="50%">Destino</th>
                           </tr>
                           
                       </thead>
                       <tbody>
                           <tr>
                               <td>Producto</td>
                               <td><select name="codarticuloorigen" class="form-control codarticulo" rel="origen">
                               <option value="">Seleccionar</option>
                                <?php foreach($art as $d){
                                ?>
                                <option value="<?php echo $d['codarticulo']?>"><?=$d['codigointerno']?> - <?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select></td>
                                <td><select name="codarticulodestino" class="form-control codarticulo" rel="destino">
                               <option value="">Seleccionar</option>
                                <?php foreach($art as $d){
                                ?>
                                <option value="<?php echo $d['codarticulo']?>"><?=$d['codigointerno']?> - <?=$d['nombre']?></option>
                               <?php
                                }?>
                            </select></td>
                           </tr>
                           <tr>
                               <td>Stock</td>
                               <td class="contenedorstock">
                                <input type="number" name="stockorigen" class="stock form-control text-right" readonly value="" rel="origen">
                               <span class="badge badge-success unidad"  rel="origen"></span>
                               </td>
                               <td class="contenedorstock">
                               <input type="number" name="stockdestino" class="stock form-control text-right" readonly value="" rel="destino">
                               <span class="badge badge-success unidad"  rel="destino"></span>
                               </td>
                           </tr>
                           <tr>
                               <td>Cantidad a <br>Traspasar</td>
                               <td><input type="number" name="cantidadorigen" class="canti form-control text-right" rel="origen" value="0" min="1" step="1"></td>
                               <td><input type="number" name="cantidaddestino" class=" form-control text-right"  value="0" rel="destino" min="0"></td>
                           </tr>
                       </tbody>
                    </table>

                  <input type="submit" class="btn btn-primary" value="Guardar">
                </form>
<?php require_once($folder."pie.php")?>