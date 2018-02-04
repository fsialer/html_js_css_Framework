/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var f;
$(document).ready(function(){
    var dataString = "";
 var id_gru2=$("#txid_gru").val();
 
  txt_id_gru.value = id_gru2;
   var usu2 = $("#txt_us2").val();
    txt_id_gru2.value = id_gru2;
    txt_id_gru4.value = id_gru2;
     id_gr5.value = id_gru2;
    id_gr2.value=id_gru2;
    id_gr3.value=id_gru2;
    id_gr4.value=id_gru2;
    id_gr5.value=id_gru2;
      id_gr6.value=id_gru2;
     $.ajax({
        type: "POST",
        url: "./procesar/pVerif_det_cap.php?txt_us=" + usu2 + "&txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#detalle_cap').fadeIn(100).html(data);
        }
    });
$.ajax({
        type: "POST",
        url: "./procesar/pListarMaterial.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#list_mat').fadeIn(100).html(data);
        }
    });
        $.ajax({
        type: "POST",
        url: "./procesar/pListarExamen.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#list_exam').fadeIn(100).html(data);
        }
    });
     $.ajax({
        type: "POST",
        url: "./procesar/pListarExamenPublic.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#list_examPublic').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarPregunta.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#list_preg').fadeIn(100).html(data);
        }
    });
        $.ajax({
        type: "POST",
        url: "./procesar/pListarAsistencia.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#list_Asistencia').fadeIn(100).html(data);
        }
    });
     $.ajax({
        type: "POST",
        url: "./procesar/pListarExamenSubir.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#list_archivo_exam').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarCboExam.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#cboExamen').fadeIn(100).html(data);
        }
    });
     $.ajax({
        type: "POST",
        url: "./procesar/pCboExamenSubir.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#cboExamS').fadeIn(100).html(data);
        }
    });
       $.ajax({
        type: "POST",
        url: "./procesar/pListarCboExamenEscrito.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#cboExamenEscrito').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarCboInscripcion.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#cboAlumno').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarNotasExEscrito.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#list_notas').fadeIn(100).html(data);
        }
    });
       $.ajax({
        type: "POST",
        url: "./procesar/pListarTrabDes.php?txt_id_gru=" + id_gru2,
        data: dataString,
        success: function(data) {
            $('#list_trab_Desc').fadeIn(100).html(data);
        }
    });

});
 
function enviar(id) {
    var td_id_gru = document.querySelector("#td_id_gru_" + id);

//    var cap=td_id_cap.innerHTML;
//    var gru=td_desc_grup.innerHTML;
    txt_id_gru.value = td_id_gru.innerHTML;
    txt_id_gru2.value = td_id_gru.innerHTML;
    txt_id_gru4.value = td_id_gru.innerHTML;
    id_gr4.value=td_id_gru.innerHTML;
    id_gr5.value = td_id_gru.innerHTML;
      id_gr6.value=td_id_gru.innerHTML;
//    txt_id_cap5.value = td_id_cap.innerHTML;
//    txtDet_gr5.value = td_desc_grup.innerHTML;
//    txt_id_cap6.value = td_id_cap.innerHTML;
//    txtDet_gr6.value = td_desc_grup.innerHTML;
    var usu = $("#txt_us").val();
    var id_gru = $("#txt_id_gru").val();
  
//    var des_g = $("#txtDet_gr").val();


   var dataString = "";
    $.ajax({
        type: "POST",
        url: "./procesar/pVerif_det_cap.php?txt_us=" + usu + "&txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#detalle_cap').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarMaterial.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#list_mat').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarExamen.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#list_exam').fadeIn(100).html(data);
        }
    });
     $.ajax({
        type: "POST",
        url: "./procesar/pListarExamenPublic.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#list_examPublic').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarCboExam.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#cboExamen').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarPregunta.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#list_preg').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarAsistencia.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#list_Asistencia').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pCboExamenSubir.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#cboExamS').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarExamenSubir.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#list_archivo_exam').fadeIn(100).html(data);
        }
    });
     $.ajax({
        type: "POST",
        url: "./procesar/pListarCboExamenEscrito.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#cboExamenEscrito').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarCboInscripcion.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#cboAlumno').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarNotasExEscrito.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#list_notas').fadeIn(100).html(data);
        }
    });
      

     $.ajax({
        type: "POST",
        url: "./procesar/pListarTrabDes.php?txt_id_gru=" + id_gru,
        data: dataString,
        success: function(data) {
            $('#list_trab_Desc').fadeIn(100).html(data);
        }
    });

//    alert(cap.toString()+"+"+gru.toString());
}

