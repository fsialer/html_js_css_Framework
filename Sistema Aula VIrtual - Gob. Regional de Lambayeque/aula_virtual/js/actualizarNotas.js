/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function enviarNotas(id){
    var td_key=document.querySelector("#td_id_eval"+id);
    alert(td_key.innerHTML);
    var td_id_inscripcion=$("#td_id_inscripcion"+id).val();
    var td_id_exam=$("#td_id_exam"+id).val();
    var td_punto_eval=document.querySelector("#td_punto_eval_"+id);
    key_nota.value=td_key.innerHTML;
    cboAlumno.value=td_id_inscripcion;
    cboExamenEscrito.value=td_id_exam;
    txtNota.value=td_punto_eval.innerHTML;
}

