/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function confirmarEliminar(texto)
{ 
    var agree = confirm("¿Desea Eliminar Este Registro "+texto+"?");
    if (agree)
           return true;   
    else
             return false;    
}
function confirmarExamen()
{ 
    var agree = confirm("¿Quieres Realizar El Examen?. Si elige SI comenzara automaticamente, si eliges NO no lo realizara.");
    if (agree)
           return true;   
    else
             return false;    
}

function confirmarTerminadoExamen()
{ 
    var agree = confirm("¿Quieres Realizar El Examen?. Si elige SI comenzara automaticamente, si eliges NO no lo realizara.");
    if (agree)
           return true;   
    else
             return false;    
}



