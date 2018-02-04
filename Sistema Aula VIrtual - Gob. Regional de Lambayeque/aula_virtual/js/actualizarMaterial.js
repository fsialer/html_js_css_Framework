/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function enviarMaterial(id) {
   
  
    
    var td_key = document.querySelector("#td_key_" + id);
    var td_nom_mat = document.querySelector("#td_nom_mat_" + id);
    var td_arch_mat = document.querySelector("#td_arch_mat_" + id);
    var td_fecha_mat = document.querySelector("#td_fecha_mat_" + id);
    var td_coment_mat = document.querySelector("#td_coment_mat_" + id);
 
   
    
    key_material.value = td_key.innerHTML;
   
   
    txtMat.value = td_nom_mat.innerHTML;

    txtFile.value = td_arch_mat.innerHTML;
    txtFechaMat.value = td_fecha_mat.innerHTML;
    txtComent.value = td_coment_mat.innerHTML;
    

}
