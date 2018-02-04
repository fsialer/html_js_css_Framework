/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function enviarRpta(id){
    var td_key_preg=document.querySelector("#td_key_preg"+id);
    var td_descrip_pre=document.querySelector("#td_descrip_pre_"+id);
    var id_preg=td_key_preg.innerHTML;
    alert(td_key_preg.innerHTML);
     key_preg2.value=td_key_preg.innerHTML;
    txtPreg2.value=td_descrip_pre.innerHTML;
    var dataString = "";
    $.ajax({
        type: "POST",
        url: "./procesar/pCboPregunta.php?id_preg=" +id_preg,
        data: dataString,
        success: function(data) {
            $('#cboRpta').fadeIn(100).html(data);
        }
    });
}


