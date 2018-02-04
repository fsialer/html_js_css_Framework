$(document).ready(function(){
	$("#cboDepartamento").change(function(){
		$('#cboDepartamento option:selected').each(function(){
			cboDepartamento=$('#cboDepartamento').val();			
			$.post("http://localhost/codeigniter/sy_ferreteria/distrito/cargar_provincias",{
				cboDepartamento:cboDepartamento
			},function(data){
				$("#cboProvincia").html(data);
			})
		})
	});
	
});