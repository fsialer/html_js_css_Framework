$(document).ready(function(){
	$('.amenidades-select').chosen({
		width: "100%",
		placeholder_text_multiple:"Elija las amenidades que desee.",
		no_results_text:"No se encuentran resultados con"
	});
	$('.habitaciones-select').chosen({
		width: "100%",
		placeholder_text_multiple:"Elija las habitaciones que desee.",
		no_results_text:"No se encuentran resultados con"
	});
	$('.piso_select').chosen({
		 width: "100%",
		 allow_single_deselect: true,
		 placeholder_text_single:"Eija un piso",
		 no_results_text:"No se encuentran resultados con"
	});
	$('.tip_hab-select').chosen({
		 width: "100%",
		 allow_single_deselect: true,
		 placeholder_text_single:"Elija un tipo de habitación que desee",
		 no_results_text:"No se encuentran resultados con"
	});
	$('.cargo-select').chosen({
		 width: "100%",
		 allow_single_deselect: true,
		 placeholder_text_single:"Elija un cargo que desee",
		 no_results_text:"No se encuentran resultados con"
	});	
	aumentar();	
	var f1 = $('.f_llegada').val();
	var f2=$('.f_salida').val();
	restaFechas(f1,f2);
	$('.f_salida').on('change',function(){
		var f1 = $('.f_llegada').val();
		var f2=$('.f_salida').val();
		restaFechas(f1,f2);
	});

	$('.btnBuscar').on('click',function(){
		console.log($('.f_salida').val());
		$.ajax({
			url:'http://localhost/codeigniter/fhotel/availables',
			type:'post',
			dataType:'html',
			data:{f_llegada:$('.f_llegada').val(),
			f_salida:$('.f_salida').val()},
			success:function(res){
				$('.result-type-rooms').html(res);
			}

		});
	});

	


});

	

$('.f_salida').val(function(){
	return $('.f_llegada').val();
});

function aumentar(){
	var f_salida=$('.f_salida').val();
	var arrayfll=f_salida.split('-');
	arrayfll[2]=+arrayfll[2]+1;
	var fecha_c=arrayfll.join('-');
	$('.f_salida').val(fecha_c);
}


var tipos_habitaciones=[];
function agregar(id){
	var reserva={
		cantidad:$('.cantidad'+id).val(),
		num_noche:$('.num_noche').val(),
		tipo_hab_id:$('.id_tr'+id).val(),
		pre_tip_hab:$('.precio_th'+id).val(),
		nom_tip_hab:$('.nom_th'+id).val()
	};
	tipos_habitaciones.push(reserva);
	mostrar();
}
restaFechas = function(f1,f2)
 {
	 var aFecha1 = f1.split('-'); 
	 var aFecha2 = f2.split('-'); 
	 var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]); 
	 var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]); 
	 var dif = fFecha2 - fFecha1;
	 var dias = Math.floor(dif / (1000 * 60 * 60 * 24)); 
	 $('.num_noche').val(dias);
	
 }

function mostrar(){
	var total_t=0;
	console.log(tipos_habitaciones);
	$('.tabla_detalle').empty();
	if(tipos_habitaciones.length>0){	
	var cabecera='<tr><th>Tipo habitación</th><th>cantidad</th><th>Noches</th><th>Precio</th><th>SubTotal</th><th>Acción</th></tr>';
	$('.tabla_detalle').append(cabecera);
	tipos_habitaciones.forEach(function(res,pos){
		var detalle="<tr><td>"+res.nom_tip_hab+"</td><td>"+res.cantidad+"</td><td>"+res.num_noche+"</td>"+
		"<td>"+res.pre_tip_hab+"</td><td>"+(res.pre_tip_hab*res.cantidad*res.num_noche)+"</td><td><button class='btn btn-danger' name='btnEliminar' onClick='eliminarth("+pos+")'>Eliminar</button></td><tr>";
		$('.tabla_detalle').append(detalle);
		total_t+=res.pre_tip_hab*res.cantidad*res.num_noche;		
	});	
	var igv="<tr><td><strong>IGV:</strong>1.8</td></tr>";
	$('.tabla_detalle').append(igv);
	var total="<tr><td><strong>Total:</strong>"+(total_t+(total_t*1.8))+"</td></tr>";
	$('.tabla_detalle').append(total);
	var btnConfimar="<input type='submit' name='btnConfirmar' value='Confirmar' class='btn btn-info btnConfirmar'/>";
	$('.tabla_detalle').append(btnConfimar);
	}
	
}

function eliminarth(pos){
	console.log('eliminado'+pos);
	tipos_habitaciones.splice(pos,1);
	console.log(tipos_habitaciones.length);
	mostrar();
}

