function enviarExamensubir(id) {
    var td_id_ex_s = document.querySelector("#td_id_ex_s_" + id);
    var td_id_exam = document.querySelector("#td_id_exam_" + id);
    var td_archivo = document.querySelector("#td_archivo_" + id);
    
    key_examen_arch.value = td_id_ex_s.innerHTML;
    cboExamS.value = td_id_exam.innerHTML;
    txtArchivo.value = txtArchivo.innerHTML;
  
}


