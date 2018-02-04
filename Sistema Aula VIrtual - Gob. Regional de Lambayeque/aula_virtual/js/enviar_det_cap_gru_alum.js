/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var f;


function enviarInscripcion2(id) {

    var td_id_inscp = document.querySelector("#td_id_inscp" + id);
    var td_desc_grup_inscp = document.querySelector("#td_desc_grup_inscp" + id);
    var td_nom_cap_inscp = document.querySelector("#td_nom_cap_inscp" + id);
//    var cap=td_id_cap.innerHTML;
//    var gru=td_desc_grup.innerHTML;

    txt_id_inscrip.value = td_id_inscp.innerHTML;
    txtDet_gr_inscrip.value = td_desc_grup_inscp.innerHTML;
    txt_nom_cap_ins.value = td_nom_cap_inscp.innerHTML;
    txt_inscrp.value = td_id_inscp.innerHTML;

//    txt_id_cap2.value = td_id_cap.innerHTML;
//    txtDet_gr2.value = td_desc_grup.innerHTML;
//    txt_id_cap4.value = td_id_cap.innerHTML;
//    txtDet_gr4.value = td_desc_grup.innerHTML;
//    txt_id_cap5.value = td_id_cap.innerHTML;
//    txtDet_gr5.value = td_desc_grup.innerHTML;
//    txt_id_cap6.value = td_id_cap.innerHTML;
//    txtDet_gr6.value = td_desc_grup.innerHTML;
    var usu = $("#txt_us").val();


    var id_inscp = $("#txt_inscrp").val();

    var des_g_insc = $("#txtDet_gr_inscrip").val();
    var nom_cap_ins = $("#txt_nom_cap_ins").val();
    // alert($("#txt_nom_cap_ins").val());
//
//
    var dataString = "";
    $.ajax({
        type: "POST",
        url: "./procesar/pVerif_det_inscrip.php?txt_id_inscrip=" + id_inscp,
        data: dataString,
        success: function(data) {
            $('#detalle_inscrip').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarAsistInscrip.php?txt_id_inscrip=" + id_inscp,
        data: dataString,
        success: function(data) {
            $('#list_Asist').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarMaterialInsc.php?txt_nom_cap=" + nom_cap_ins + '&txtDet_gr=' + des_g_insc,
        data: dataString,
        success: function(data) {
            $('#list_Mat_Descargar').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarExamenDesarrollar.php?txt_nom_cap=" + nom_cap_ins + '&txtDet_gr=' + des_g_insc + "&id_ins=" + id_inscp + "&us=" + usu,
        data: dataString,
        success: function(data) {
            $('#list_Examen_desar').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarExamenDesarrollar2.php?txt_nom_cap=" + nom_cap_ins + '&txtDet_gr=' + des_g_insc + "&us=" + usu,
        data: dataString,
        success: function(data) {
            $('#list_Examen_desar2').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarNotas.php?id_inscp=" + id_inscp,
        data: dataString,
        success: function(data) {
            $('#cargar_notas').fadeIn(100).html(data);
        }
    });
    $.ajax({
        type: "POST",
        url: "./procesar/pListarTrabajo.php?id_inscp=" + id_inscp,
        data: dataString,
        success: function(data) {
            $('#list_trabajo').fadeIn(100).html(data);
        }
    });
//    $.ajax({
//        type: "POST",
//        url: "./procesar/pListarPregunta.php?txt_id_cap=" + id_cap + '&txtDet_gr=' + des_g,
//        data: dataString,
//        success: function(data) {
//            $('#list_preg').fadeIn(100).html(data);
//        }
//    });
//    $.ajax({
//        type: "POST",
//        url: "./procesar/pListarAsistencia.php?txt_id_cap=" + id_cap + "&txtDet_gr=" + des_g,
//        data: dataString,
//        success: function(data) {
//            $('#list_Asistencia').fadeIn(100).html(data);
//        }
//    });


//    alert(cap.toString()+"+"+gru.toString());
}





