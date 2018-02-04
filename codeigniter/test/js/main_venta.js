$(document).on('ready',function(){
	$("#input_buscar").on('keyup',function(){
		//$("#content-producto").html($("#input_buscar").val());
		$.ajax({
			url:"http://localhost/codeigniter/test/vpproducto/buscar",
			type:'post',
			data:{nom:$('#input_buscar').val()},
			success:function(resp){
				$("#content-producto").html(resp);
			}

		});
	});

	


	


});

var producto=[];

function agregar(id){
	var articulo=new Object();
	var art=document.querySelector(".articulo"+id);
	var pre=document.querySelector(".precio"+id);
	articulo.id=id;
	articulo.nom=art.innerHTML;
	articulo.pre=pre.value;
	producto.push(articulo);
	console.log(producto);
	mostrar();
}

function mostrar(){
	var tb=document.querySelector("#detalle");
	tb.innerHTML="";
	for (var i = producto.length - 1; i >= 0; i--) {
		
		
		var td="<tr><td>"+producto[i].id+"</td><td>"+producto[i].nom+"</td><td id='pre"+producto[i].id+"'>"+producto[i].pre+"</td><td><input onChange='importe("+i+")' type='number' id='cantidad"+i+"'></td><td><td id='impo"+i+"'></tr>"
		tb.innerHTML=tb.innerHTML+td;

		

	}
}

function importe(id){

	var cant=document.querySelector("#cantidad"+id);
	var importe=document.querySelector("#impo"+id);
	var mul=producto[id].pre*cant.value;

	importe.innerHTML=mul;
	console.log(producto[id].pre);
	




}
