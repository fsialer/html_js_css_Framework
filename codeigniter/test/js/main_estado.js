$(document).ready(function(){
	$("#cboRegion").change(function(){
		$('#cboRegion option:selected').each(function(){
			cboRegion=$('#cboRegion').val();	
			console.log(cboRegion);		
			$.post("http://localhost/codeigniter/test/dropdownestados/cargar_provincias",{
				cboRegion:cboRegion
			},function(data){
				$("#cboProvincia").html(data);
			})
		})
	});
	$('#cboRegion option:selected').each(function(){
			cboRegion=$('#cboRegion').val();	
			console.log(cboRegion);		
			$.post("http://localhost/codeigniter/test/dropdownestados/cargar_provincias",{
				cboRegion:cboRegion
			},function(data){
				$("#cboProvincia").html(data);
			})
		});

});