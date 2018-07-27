<?php
include_once("../../login/check.php");
$folder="../../";
include_once("../../class/cliente.php");
$cliente=new cliente;

$codusuariolog=$_SESSION['CodUsuarioLog'];
$nivelusuariolog=$_SESSION['Nivel'];

if( in_array($nivelusuariolog,array(1,2,3)))
{
    //echo "si";
  $condicion="";  
}else{
$condicion="codvendedor=$codusuariolog";
    }
$cli=$cliente->mostrarTodoRegistro("$condicion",1,"nombre");


$titulo="Registro de Venta de Articulos";
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

            $(".cantidad[rel="+fila+"]").attr("max",data.stock)
            $(".precio[rel="+fila+"]").val(data.precioventa)
            $(".stock[rel="+fila+"]").html(data.stock)
            $(".unidad[rel="+fila+"]").html(data.unidad)
        },"json");
    });
     $(document).on("keyup change",".cantidad,.descuento",function(){
         var fila=$(this).attr("rel");
        var cantidad=parseInt($(".cantidad[rel="+fila+"]").val());
        var precio=parseInt($(".precio[rel="+fila+"]").val());
         var descuento=parseInt($(".descuento[rel="+fila+"]").val());
         var total=(cantidad*precio)-descuento;
        $(".subtotal[rel="+fila+"]").val(total.toFixed(2));
         sumarTodo()
    });
    $(document).on("keyup change","#descuento",function(){
       var sb=parseFloat($("#subtotal").val()); 
        var desc=parseFloat($(this).val());
        var totalgeneral=sb-desc;
        $("#totalgeneral").val(totalgeneral.toFixed(2))
    });
    $(document).on("keyup change","#cancelado",function(){
       var total=parseFloat($("#total").val()); 
        var cancelado=parseFloat($(this).val());
        var cambio=cancelado-total;
        $("#cambio").val(cambio.toFixed(2))
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
<style type="text/css">
    .contenedorstock{
        position: relative;
    }
    .stock{
        position: absolute;
        top: 0px;
        left: 0px;
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
                         <td >
                          <div class="form-group">
                            <label class="form-label">Cliente </label>
                            <select name="codcliente" class="form-control">
                                <?php foreach($cli as $d){
                                ?>
                                <option value="<?php echo $d['codcliente']?>"><?=$d['nombre']?> <?=$d['apellido']?></option>
                               <?php
                                }?>
                            </select>
                          </div>   
                         </td>
                        <td colspan="">
                          <div class="form-group">
                            <label class="form-label">Fecha de Venta</label>
                            <input type="date" class="form-control" placeholder="" name="fechaventa" value="<?=date("Y-m-d")?>" readonly>
                          </div>   
                         </td>
                     </tr>
                     
                    </table>
                   <table class="table table-bordered table-hover">
                       <thead>
                           <tr>
                               <th width="15">Nº</th>
                               <th >Codigo</th>
                               <th width="100">Cantidad</th>
                               <th width="120">Precio</th>
                               <th width="120">Descuento</th>
                               <th width="50" style="width: 100px !important;">SubTotal</th>
                               <!--<th width="150">Fecha Vencimiento</th>-->
                           </tr>
                       </thead>
                       <tfoot id="marca" >
                           <tr class="table-success">
                               <th colspan="4">
                                   <a href="#" id="aumentar" class="btn btn-info btn-xs">Aumentar</a>
                               </th>
                               <th class="text-right">Total</th>
                               <th>
                                   <input type="number" name="total" value="" min="0" readonly class="form-control total text-right" id="total">
                                   
                               </th>
                                
                           </tr>
                           <tr class="table-success">
                               <th colspan="4">
                                   
                               </th>
                               <th class="text-right">Cancelado</th>
                               <th>
                                   <input type="number" name="cancelado" value="" min="0"  class="form-control total text-right" id="cancelado">
                                   
                               </th>
                                
                           </tr>
                           <tr class="table-success">
                               <th colspan="4">
                                   
                               </th>
                               <th class="text-right">Cambio</th>
                               <th>
                                   <input type="number" name="cambio" value="" min="0" readonly class="form-control total text-right" id="cambio">
                                   
                               </th>
                                
                           </tr>
                           <tr>
                               
                               <th colspan="3">
                               Observación
                               <textarea class="form-control" name="observacion"></textarea>
                               </th>
                               <th>
                                   Tipo de Venta  <select name="tipoventa" id="" class="form-control">
                                   <option value="contado">Contado</option>
                                   <option value="credito">Credito</option>
                               </select>
                               </th>
                               <th colspan="2">Fecha de Cancelación  <input type="date" name="fechacancelacion" value="" class="form-control">
                               </th>
                           </tr>
                       </tfoot>
                   </table>
                  <input type="submit" class="btn btn-primary" value="Guardar">
                </form>
<?php require_once($folder."pie.php")?>