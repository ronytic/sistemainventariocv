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
			$.post(direccion,function(){
				$("form.formulariobusqueda").submit();	
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
}