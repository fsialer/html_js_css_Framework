<?php
include '../clases/datos_user.php';
error_reporting(0);
ini_set('display_errors', 0);

$id_tipo = $_GET['id_tipo'];
$id_sexo=$_GET['id_sexo'];
$objDatosUser = new datos_user();
$result3 = $objDatosUser->listarUsuarioTipo($id_tipo,$id_sexo);
$cant=  count($result3);
if ($cant>0) {
    $item = 0;
foreach ($result3 as $datos_user) {
    $item++;
    echo "<tr>
     
        <td id='td_id_user_$item'>$datos_user->id_user</td>
    <td id='td_nom_ape_$item'>$datos_user->nom_user $datos_user->ape_user</td>
   <td id='td_tc_user_$item'>$datos_user->tc_user </td>
    <td id='td_dir_user_$item'>$datos_user->dir_user</td>
    <td id='td_dni_user_$item'>$datos_user->dni_user</td>  
        <td id='td_email_user_$item'>$datos_user->email_user</td>   
    
        
            ";
echo "</tr>";
}


}  else {
    echo "<div class='alert alert-danger col-md-12 col-lg-12' role='alert'>No existe ningun usuario con esas descripciones.</div>";
}


