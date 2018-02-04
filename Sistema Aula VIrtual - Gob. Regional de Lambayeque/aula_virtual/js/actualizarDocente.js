/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function plasmar(id) {
   
    var td_key = document.querySelector("#td_key_"+id);
    var td_nom = document.querySelector("#td_nom_"+id);
    var td_ape = document.querySelector("#td_ape_"+id);
    var td_dir = document.querySelector("#td_dir_"+id);
    var td_tc = document.querySelector("#td_tc_"+id);
    var td_email = document.querySelector("#td_email_"+id); 
    var td_sex=document.querySelector("#td_sex_"+id);
    var td_dni=document.querySelector("#td_dni_"+id);

    
    key.value = td_key.innerHTML;
    txtNombre.value= td_nom.innerHTML;
    txtApellido.value = td_ape.innerHTML;
    txtDireccion.value = td_dir.innerHTML;
    txtTelefono.value = td_tc.innerHTML;
    txtEmail.value = td_email.innerHTML;
    cboSexo.value=td_sex.innerHTML;
    txtDNI.value=td_dni.innerHTML;
}



