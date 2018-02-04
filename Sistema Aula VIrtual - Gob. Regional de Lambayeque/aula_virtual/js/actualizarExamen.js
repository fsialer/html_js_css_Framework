/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function enviarExamen(id){
    var td_key=document.querySelector("#td_key_examn_"+id);
    var td_nom_exam=document.querySelector("#td_nom_exam_"+id);
    
    var td_fecha_exam=document.querySelector("#td_fecha_exam_"+id);
    var td_coment_exam=document.querySelector("#td_coment_exam_"+id);
    var td_tlimite_exam=document.querySelector("#td_tlimite_exam_"+id);
    var td_id_texam=document.querySelector("#td_id_texam_"+id);
    key_exam.value=td_key.innerHTML;
    txtExam.value=td_nom_exam.innerHTML;
    txtFechaExam.value=td_fecha_exam.innerHTML;
    txtCom.value=td_coment_exam.innerHTML;
    txtTLimite.value=td_tlimite_exam.innerHTML;
    cbotipoExam.value=td_id_texam;
}


