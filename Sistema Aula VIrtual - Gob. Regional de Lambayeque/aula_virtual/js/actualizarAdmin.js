/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function enviarAdmin(id) {
   
    var td_key2 = document.querySelector("#td_key2_"+id);
    var td_nom2 = document.querySelector("#td_nom2_"+id);
    var td_ape2 = document.querySelector("#td_ape2_"+id);
    var td_dir2 = document.querySelector("#td_dir2_"+id);
    var td_tc2 = document.querySelector("#td_tc2_"+id);
    var td_email2 = document.querySelector("#td_email2_"+id); 
    var td_sex2=document.querySelector("#td_sex2_"+id);
    var td_dni2=document.querySelector("#td_dni2_"+id);
    alert(td_key2.innerHTML);
    key4.value = td_key2.innerHTML;
    txtNombre2.value= td_nom2.innerHTML;
    txtApellido2.value = td_ape2.innerHTML;
    txtDireccion2.value = td_dir2.innerHTML;
    txtTelefono2.value = td_tc2.innerHTML;
    txtEmail2.value = td_email2.innerHTML;
    cboSexo2.value=td_sex2.innerHTML;
    txtDNI2.value=td_dni2.innerHTML;
}