/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function comprueba_extension(formulario, archivo) {
    extensiones_permitidas = new Array(".rar", ".zip");
    mierror = "";
    if (!archivo) {
        //Si no tengo archivo, es que no se ha seleccionado un archivo en el formulario 
        mierror = "No has seleccionado ningún archivo";
    } else {
        //recupero la extensión de este nombre de archivo 
        extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
        //alert (extension); 
        //compruebo si la extensión está entre las permitidas 
        permitida = false;
        for (var i = 0; i < extensiones_permitidas.length; i++) {
            if (extensiones_permitidas[i] == extension) {
                permitida = true;
                break;
            }
        }
        if (!permitida) {
            mierror = "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " + extensiones_permitidas.join();
        } else {
            //submito! 
//            validarlimite();
         alert ("Todo correcto. Voy a submitir el formulario."); 
            formulario.submit();
            return true;
        }
    }
    //si estoy aqui es que no se ha podido submitir 
    alert(mierror);
    return false;
}

function validarlimite() {
    valor = document.validar_file.txtArch.value;
    fso = new ActiveXObject("Scripting.FileSystemObject");
    f = fso.GetFile(valor);
    alert(f.size);
//            if (f.size > 5024000)
//            {
//                alert("Todo correcto.Archivo Confirmado");
//                formulario.submit();
//
//            }
//            else
//            {
//                mierror = "El archivo seleccionado sobre pasado los 5 MB";
//            } // tamaño maximo 1 mb

}

