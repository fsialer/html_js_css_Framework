$(document).on("ready",function(){
	$('#persona').on("keyup",function(){	
		$.ajax({			
			url:"filtrar_persona",
			type:'POST',
			dataType:'html',
			data:{per:$("#persona").val()},
			success:function(resp){	
				$("#lista_per").empty();				
				$("#lista_per").append(resp);
			}
		});
	});
	$("#btnVerificar").on('click',function(){
		$.ajax({			
			url:"login_lect",
			type:'POST',
			dataType:'html',
			data:{us:$("#input_username").val(),'pass':$("#input_pwd").val()},
			success:function(resp){	
				$("#datos_usuario").html(resp);
			}
		});
	});

	

	

	


});
