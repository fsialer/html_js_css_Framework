$(document).on("ready",function(){
	var seleccion=$(".ejem1");
	if (seleccion.length) {
		console.log("Existen: "+seleccion.length);
	}else{
		console.log("No existe");
	}
	//seleccion.not('.cl1').text("Este elemento tiene la clase cl1");
	//not es para ver si existe otra clase(.) o id (#) dentro del mismo objeto (.ejem1).
	//seleccion.has('p').text("Este elemento tiene paragraph en su contenido");
	//has para ver si tiene una clase o id dentro de un elemento.
	$('li').first().html("<strong>soy el elemento 1</strong>");
	//el first selecciona el primer elemento de las lista, esta funciona como un arreglo.
	$('li').eq(2).text("Soy el elemento 3s");
	//eq selecciona un elemento de la lista segun su posicion, funciona como un arreglo.

});