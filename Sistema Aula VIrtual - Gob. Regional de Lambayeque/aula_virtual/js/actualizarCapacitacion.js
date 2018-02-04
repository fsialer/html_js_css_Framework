/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function plasmar2(id){
     var td_idcap=document.querySelector("#td_idcap_"+id);
     var td_nomCap=document.querySelector("#td_nomCap_"+id);
     var td_lug=document.querySelector("#td_lug_"+id);
     var td_fechai=document.querySelector("#td_fechai_"+id);
     var td_fechaf=document.querySelector("#td_fechaf_"+id);
     var td_desc=document.querySelector("#td_desc_"+id);
     var td_id_user=$("#td_id_user_"+id).val();
     
     
     
     
     key2.value=td_idcap.innerHTML;
     txtCapacitacion.value=td_nomCap.innerHTML;
     txtLugar.value=td_lug.innerHTML;
     txtFechaI.value=td_fechai.innerHTML;
     txtFechaF.value=td_fechaf.innerHTML;
     txtDescp.value=td_desc.innerHTML;
     cboDoc.value=td_id_user
    
   
     
}
//function plasmar2(id){
//    var td_idcap=document.querySelector("td_idcap_"+id);
//   alert("td_idcap.value");
//     
//}




