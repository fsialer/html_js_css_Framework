/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {    
    $('#txtUsuario').blur(function(){
//        $('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);
        var username = $(this).val();        
        var dataString = 'txtUsuario='+username;
        
        $.ajax({
            type: "POST",
            url: "./procesar/pVerificarUsuario.php?id_cap="+$('#key_cap').val(),
            data: dataString,
            success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    });              
});   


