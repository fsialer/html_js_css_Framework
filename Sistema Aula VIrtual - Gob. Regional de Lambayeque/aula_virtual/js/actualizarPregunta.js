/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function enviarPregunta(id){
    var td_key_preg=document.querySelector("#td_key_preg"+id);
    var td_descrip_pre=document.querySelector("#td_descrip_pre_"+id);
    var td_id_exam=document.querySelector("#td_id_exam_"+id);
    var td_puntaje=document.querySelector("#td_puntaje_"+id);
    var td_alter1=document.querySelector("#td_alter1_"+id);
    var td_alter2=document.querySelector("#td_alter2_"+id);
    var td_alter3=document.querySelector("#td_descrip_pre_"+id);
    var td_alter4=document.querySelector("#td_descrip_pre_"+id);
    
    key_preg.value=td_key_preg.innerHTML;
    alert(td_key_preg.innerHTML);
    cboExamen.value=td_id_exam.innerHTML;
    txtPreg.value=td_descrip_pre.innerHTML;
    txtPuntaje.value=td_puntaje.innerHTML;
    txtAlt1.value=td_alter1.innerHTML;
    txtAlt2.value=td_alter2.innerHTML;
    txtAlt3.value=td_alter3.innerHTML;
    txtAlt4.value=td_alter4.innerHTML;
    
    
}


