/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function plasmar3(id) {

    var td_descp = document.querySelector("#td_descp_" + id);
    var td_id_grupo = document.querySelector("#td_id_grupo_" + id);

    var td_hi = document.querySelector("#td_hi_" + id);
    var td_hf = document.querySelector("#td_hf_" + id);
    var td_fech = document.querySelector("#td_fech_" + id);
    var td_disp = document.querySelector("#td_disp_" + id);
    var td_id_cap = $("#td_id_cap"+id).val();
   


    id_grupo.value=td_id_grupo.innerHTML;
    txtGrupo.value = td_descp.innerHTML;
    txtHoraI.value = td_hi.innerHTML;
    txtHoraF.value = td_hf.innerHTML;
    txtFecha.value = td_fech.innerHTML;
    txtDisp.value = td_disp.innerHTML;
    cboCap.value = td_id_cap


}
