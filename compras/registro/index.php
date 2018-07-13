<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/proveedor.php");
$proveedor=new proveedor;
$pro=$proveedor->mostrarTodoRegistro("",1,"nombre");


$titulo="Registro de Compra de Articulos";
?>
<?php require_once($folder."cabecerahtml.php")?>

<script>
    var l=0;
$(document).ready(function(){
    
    $("[name=codcliente]").change(function(){
        var codcliente=$(this).val();
        $.post("datoscliente.php",{'codcliente':codcliente},function(data){
            $("#datoscliente").html(data)
        });
    });

    $(document).on("change",".codarticulo",function(){

        var fila=$(this).attr("rel");
        var codarticulo=$(this).val();
        var codalmacen=$("[name=codalmacen]").val();
        $.post("datos.php",{'codarticulo':codarticulo},function(data){

            $(".canti[rel="+fila+"]").html(data.stock)
            $(".precio[rel="+fila+"]").val(data.preciocompra)
            
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
    $("#aumentar").click(function(e){l++;
                                     e.preventDefault();
       $.post("fila.php",{"f":l},function(data){
          $("#marca").before(data); 
           $('select').select2();
       });
    }).click();
});
function sumarTodo(){
    var tt=0;
    $(".subtotal").each(function(){
       var valor=parseFloat($(this).val());
        tt=tt+valor;
    });
    $("#total").val(tt.toFixed(2));
}
</script>
  
<?php require_once($folder."cabecera.php")?>

                <form action="guardar.php" method="post">
                 
                 <table class="table table-bordered table-hover">
                    <tr>
                         <td >
                          <div class="form-group">
                            <label class="form-label">Proveedor </label>
                            <select name="codproveedor" class="form-control">
                                <?php foreach($pro as $d){
                                ?>
                                <option value="<?php echo $d['codproveedor']?>"><?=$d['nombre']?> - <?=$d['nit']?></option>
                               <?php
                                }?>
                            </select>
                          </div>   
                         </td>
                        <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Fecha de Compra</label>
                            <input type="date" class="form-control" placeholder="" name="fechacompra" value="<?=date("Y-m-d")?>">
                          </div>   
                         </td>
                     </tr>
                     
                    </table>
                   <table class="table table-bordered table-hover">
                       <thead>
                           <tr>
                               <th width="15">Nº</th>
                               <th width="200">Codigo</th>
                               <th>Cantidad</th>
                               <th>Precio</th>
                               <th>SubTotal</th>
                               <!--<th width="150">Fecha Vencimiento</th>-->
                           </tr>
                       </thead>
                       <tfoot id="marca" >
                           <tr class="table-success">
                               <th colspan="3">
                                   <a href="#" id="aumentar" class="btn btn-info btn-xs">Aumentar</a>
                               </th>
                               <th class="text-right">Total</th>
                               <th>
                                   <input type="number" name="total" value="" min="0" readonly class="form-control total text-right" id="total">
                                   
                               </th>
                                <th></th>
                           </tr>
                           <tr>
                               
                               <th colspan="3">
                               </th>
                               <th>
                                   Tipo de Compra  <select name="tipocompra" id="" class="form-control">
                                   <option value="contado">Contado</option>
                                   <option value="credito">Credito</option>
                               </select>
                               </th>
                               <th>Fecha de Cancelación  <input type="date" name="fechacancelacion" value="" class="form-control">
                               </th>
                           </tr>
                       </tfoot>
                   </table>
                  <input type="submit" class="btn btn-primary" value="Guardar">
                </form>
<?php require_once($folder."pie.php")?>