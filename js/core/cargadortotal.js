$(document).ready(inicio);
var RedirigirLogin=0;

function inicio(){

	$(document).on('submit','form.formulariobusqueda', function(e) {
		e.preventDefault(); // prevent native submit
		var percent=$("#respuestaformulario")
    	$(this).ajaxSubmit({
        	target: '#respuestaformulario',
			beforeSend: function() {
				//status.empty();
				var percentVal = '0%';
				//bar.width(percentVal)
				percent.html(percentVal+'<div class="progress"><div class="bar" style="width: '+percentVal+';"></div></div>');
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				//bar.width(percentVal)
				percent.html(percentVal+'<div class="progress"><div class="bar" style="width: '+percentVal+';"></div></div>');
			},
			complete: function(xhr) {
			//bar.width("100%");
			//percent.html("100%");
			$("#respuestaformulario").html(xhr.responseText);
			//$("table").stickyTableHeaders();
			//$("table.inicio").stickyTableHeaders('destroy');
			}
    	})
		//$('html, body').animate({scrollTop:$("#respuestaformulario").position().top-200},300);
		 
	});
	$(document).on("submit",".formularioconfirmacion",function(e){
		if(!confirm($(this).attr("data-mensaje"))){
			e.preventDefault();
		}
	});
	$("#respuestaformulario").on("click",".eliminar",function(e){
		var direccion=$(this).attr("href");
		e.preventDefault();
		e.stopPropagation();
		if(confirm("¿Esta seguro que desea Eliminar este Registro?")){
			$.post(direccion,function(data){
                if(data==""){
                    
				    $("form.formulariobusqueda").submit();
                }else{
                    alert(data);
                }
			});
		}
		return false;
	});
	$("#respuestaformulario").on("click",".modificar",function(e){
		//var direccion=$(this).attr("href");
		if(confirm(DeseaModificarRegistro)){
			return true;
		}else{
			return false;
		}
	});

    
    /*Exportar Excel*/
    
	$(document).on('click','.exportarexcel',function(e){

		e.preventDefault();
		var tabla=$(this).next().clone();
		if(!(tabla.find("thead:eq(0)")).length){
			tabla=$(this).next().next().clone();
		}
		
		//alert(tabla.find("thead").html().remove());
		var html='<table border="1">'+tabla.html()+'</table>';
        //alert(html);
        html.replace('Ã³', 'ó');
        //alert(html);
		//return false;
		while (html.indexOf('Ã¡') != -1) html = html.replace('Ã¡', 'á');
		while (html.indexOf('Ã©') != -1) html = html.replace('Ã©', 'é');
		while (html.indexOf('Ã­') != -1) html = html.replace('Ã­', 'í');
		while (html.indexOf('Ã³') != -1) html = html.replace('Ã³', 'ó');
		while (html.indexOf('Ãº') != -1) html = html.replace('Ãº', 'ú');
		while (html.indexOf('Ã±') != -1) html = html.replace('Ã±', 'ñ');
		while (html.indexOf('Âº') != -1) html = html.replace('Âº', 'º');
		/*window.open('data:application/vnd.ms-excel;Content-Disposition:attachment;file=export_filename.xls;name=hebe.xls,' +encodeURIComponent(html));
    e.preventDefault();
		//$.post(folder+"exportar/excel.php",{'dataexcel':datos},function(data){$("#respuestaexcel").html(data)});		*/
		//getting values of current time for generating the file name
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
       // var table_div = $(this).next("table");
        var table_html = html.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = 'Reporte'+'_' + postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
	});
	/*Fin de Exportar Excel*/
    $('select').select2();
}