/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function enviarTrabajo(id) {
   
      var td_id_trabajo= document.querySelector("#td_id_trabajo_" + id);
    var td_nom_trabajo = document.querySelector("#td_nom_trabajo_" + id);
    var td_arch_trabajo = document.querySelector("#td_arch_trabajo_" + id);
    var td_fecha_trabajo = document.querySelector("#td_fecha_trabajo_" + id);
   
    
    key_trabajo.value = td_id_trabajo.innerHTML;
   
   
    txtTrab.value = td_nom_trabajo.innerHTML;

    txtFile.value = td_arch_trabajo.innerHTML;
    txtFechaTrab.value = td_fecha_trabajo.innerHTML;
    
    

}


