/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function enviarCap(id) {
    var id_cap = document.querySelector("#id_cap" + id);
    var h3_nom_cap = document.querySelector("#h3_nom_cap_" + id);

    key_cap.value = id_cap.innerHTML;
    txtCap.value = h3_nom_cap.innerHTML;
}

