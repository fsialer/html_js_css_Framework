function enviarPersona(id,datos){
	console.log(id+'-'+datos);
	var persona=document.querySelector("#input_persona");
	var id_per=document.querySelector("#input_id_per");
	persona.value=datos;
	id_per.value=id;
}