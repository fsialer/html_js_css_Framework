/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $("#btnReporteUsuTipo").hide();
    $("#btnReporteCapFecha").hide();
    $("#btnReporteCantInscr").hide();
     $("#btnReporteCantAsist").hide();
     $("#btnReporteCantApro").hide();
    
     $("#btnBuscarCantApro").click(function() {
        var fecha_ini = $("#txtFechaInicio4").val();
        var fecha_fin = $("#txtFechaFinal4").val();
        var dataString = "";
        $("#btnReporteCantApro").show();
        $.ajax({
            type: "POST",
            url: "./procesar/pListarCantApro.php?fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin,
            data: dataString,
            success: function(data) {
                $('#listCantApro').fadeIn(100).html(data);
            }
        });
    });
      $("#btnReporteCantApro").click(function() {
          $("#btnReporteCantApro").hide();
         var fecha_ini = $("#txtFechaInicio4").val();
        var fecha_fin = $("#txtFechaFinal4").val();
        window.open('./reportes/pListarCantApro2.php?fecha_ini='+ fecha_ini +'&fecha_fin='+fecha_fin,'_blank');


    });
    
    $("#btnBuscarCantAsist").click(function() {
        var fecha_ini = $("#txtFechaInicio3").val();
        var fecha_fin = $("#txtFechaFinal3").val();
        var dataString = "";
        $("#btnReporteCantAsist").show();
        $.ajax({
            type: "POST",
            url: "./procesar/pListarCantAsistCap.php?fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin,
            data: dataString,
            success: function(data) {
                $('#listCantAsist2').fadeIn(100).html(data);
            }
        });
    });
      $("#btnReporteCantAsist").click(function() {
          $("#btnReporteCantAsist").hide();
         var fecha_ini = $("#txtFechaInicio3").val();
        var fecha_fin = $("#txtFechaFinal3").val();
        window.open('./reportes/pListarCantAsistCap2.php?fecha_ini='+ fecha_ini +'&fecha_fin='+fecha_fin,'_blank');


    });
    
     $("#btnBuscarCantInscr").click(function() {
        var fecha_ini = $("#txtFechaInicio2").val();
        var fecha_fin = $("#txtFechaFinal2").val();
        var dataString = "";
        $("#btnReporteCantInscr").show();
        $.ajax({
            type: "POST",
            url: "./procesar/pListarCantInscr.php?fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin,
            data: dataString,
            success: function(data) {
                $('#listCantInscr').fadeIn(100).html(data);
            }
        });
    });
      $("#btnReporteCantInscr").click(function() {
          $("#btnReporteCantInscr").hide();
         var fecha_ini = $("#txtFechaInicio2").val();
        var fecha_fin = $("#txtFechaFinal2").val();
        window.open('./reportes/pListarCantInscr2.php?fecha_ini='+ fecha_ini +'&fecha_fin='+fecha_fin,'_blank');


    });
    
    $("#btnBuscarCapFecha").click(function() {
        var fecha_ini = $("#txtFechaInicio").val();
        var fecha_fin = $("#txtFechaFinal").val();
        var dataString = "";
        $("#btnReporteCapFecha").show();
        $.ajax({
            type: "POST",
            url: "./procesar/pListarCapFecha.php?fecha_ini=" + fecha_ini + "&fecha_fin=" + fecha_fin,
            data: dataString,
            success: function(data) {
                $('#listCapFecha').fadeIn(100).html(data);
            }
        });
    });
      $("#btnReporteCapFecha").click(function() {
           $("#btnReporteCapFecha").hide();
         var fecha_ini = $("#txtFechaInicio").val();
        var fecha_fin = $("#txtFechaFinal").val();
        window.open('./reportes/pListarCapFecha2.php?fecha_ini='+ fecha_ini +'&fecha_fin='+fecha_fin,'_blank');


    });
    
    $("#btnBuscarporTipo").click(function() {
        var id_tipo = $("#cboTipoUsuario").val();
        var id_sexo = $("#cboTipoSexo").val();
        var dataString = "";
        $("#btnReporteUsuTipo").show();
        $.ajax({
            type: "POST",
            url: "./procesar/pListarUsuarioTipo.php?id_tipo=" + id_tipo + "&id_sexo=" + id_sexo,
            data: dataString,
            success: function(data) {
                $('#listUsuTipo').fadeIn(100).html(data);
            }
        });
    });

    $("#btnReporteUsuTipo").click(function() {
        $("#btnReporteUsuTipo").hide();
        var id_tipo = $("#cboTipoUsuario").val();
        var id_sexo = $("#cboTipoSexo").val();
        window.open('./reportes/pListarUsuarioTipo2.php?id_tipo='+id_tipo+'&id_sexo='+id_sexo,'_blank');


    });




});
//function reporteUsuario(){
//    var id_tipo = $("#cboTipoUsuario").val();
//        var id_sexo = $("#cboTipoSexo").val();
//        alert();
//         url=$(this).attr('href',"./reportes/pListarUsuarioTipo2.php?id_tipo=" + id_tipo + "&id_sexo=" + id_sexo);
//         window.open(url,'_blank');
////        var dataString = "";
////        $.ajax({
////            type: "POST",
////            url: "./reportes/pListarUsuarioTipo2.php?id_tipo=" + id_tipo + "&id_sexo=" + id_sexo,
////            data: dataString
////           
////        });
//   
//}



