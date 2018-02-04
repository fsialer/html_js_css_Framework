<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inscripcion
 *
 * @author Lenovo
 */
class inscripcion {

    private $id_inscripcion;
    private $id_user;
    private $id_grupo;

    function __construct($id_user, $id_grupo, $id_inscripcion = null) {
        $this->id_inscripcion = $id_inscripcion;
        $this->id_user = $id_user;
        $this->id_grupo = $id_grupo;

        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getDescp_grupo() {
        return $this->descp_grupo;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function getId_grupo() {
        return $this->id_grupo;
    }

    public function setId_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }

    public function setId_inscripcion($id_inscripcion) {
        $this->id_inscripcion = $id_inscripcion;
    }

    public function guardar() {
//        if ($this->id_inscripcion) {
//            $stmt = $this->objPdo->prepare("UPDATE inscripcion set 
//                estado_inscripcion=:estado_inscripcion,
//                id_dato_user=:id_dato_user,
//                id_cap=:id_cap,                          
//                WHERE id_inscripcion=:id_inscripcion");
//            $arrayUpdate = array('estado_inscripcion' => $this->estado_inscripcion,
//                'id_dato_user' => $this->id_dato_user,
//                'id_cap' => $this->id_cap,              
//                'id_inscripcion' => $this->id_inscripcion);
//            $result = $stmt->execute($arrayUpdate);
//        } else {
        $stmt = $this->objPdo->prepare("INSERT INTO inscripcion (id_user,id_grupo)"
                . " VALUES (:id_user,:id_grupo)");
        $arrayInsert = array('id_user' => $this->id_user,
            'id_grupo' => $this->id_grupo);
        $result = $stmt->execute($arrayInsert);
//        }
        return $result;
    }

    public function actualizar() {
        $stmt = $this->objPdo->prepare("UPDATE inscripcion set                
                id_user=:id_user,
                id_codigo=:id_codigo,                          
                WHERE id_inscripcion=:id_inscripcion");
        $arrayUpdate = array(
            'id_user' => $this->id_user,
            'id_grupo' => $this->id_grupo,
            'id_inscripcion' => $this->id_inscripcion);
        $result = $stmt->execute($arrayUpdate);
        return $result;
    }

    public function listar() {
        $stmt = $this->objPdo->prepare("SELECT * FROM inscripcion ORDER BY id_inscripcion asc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarInscripcion($dni) {
        $stmt = $this->objPdo->prepare("SELECT id_inscripcion, grupo.descp_grupo,capacitacion.nom_cap
  FROM inscripcion inner join grupo on inscripcion.id_grupo=grupo.id_grupo
  inner join datos_user on inscripcion.id_user=datos_user.id_user
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where datos_user.dni_user=:dni and capacitacion.fechafin_cap between current_date and capacitacion.fechafin_cap");
        $arraySelect = array('dni' => $dni);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarDetInscp($id_ins) {
        $stmt = $this->objPdo->prepare("SELECT id_inscripcion, datos_user.id_user, grupo.id_grupo, capacitacion.nom_cap,grupo.descp_grupo,capacitacion.descrip_cap,
capacitacion.fechaini_cap,capacitacion.fechafin_cap FROM inscripcion inner join datos_user on inscripcion.id_user=datos_user.id_user
  inner join grupo on inscripcion.id_grupo=grupo.id_grupo
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where  id_inscripcion=:id_insc");
        $arraySelect = array('id_insc' => $id_ins);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function comprobarInscripcion($id_user, $id_Cap) {
        $stmt = $this->objPdo->prepare("SELECT id_inscripcion, datos_user.id_user, grupo.id_grupo
  FROM inscripcion inner join datos_user on inscripcion.id_user=datos_user.id_user
  inner join grupo on inscripcion.id_grupo=grupo.id_grupo
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where datos_user.id_user=:id_user and capacitacion.id_cap=:id_Cap");
        $arraySelect = array('id_user' => $id_user, 'id_Cap' => $id_Cap);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function correo() {
        require("../phpMailer/class.phpmailer.php");
        require("../phpMailer/class.smtp.php");
        include ("datos_user.php");
        include ("grupo.php");

        $objDatos_user = new datos_user();
        $return = $objDatos_user->listarDatos2($this->id_user);

        foreach ($return as $datos_user) {
            $nomCompleto = "$datos_user->nom_user $datos_user->ape_user";
            $usua = $datos_user->dni_user;
            $email = $datos_user->email_user;
        }
        $objGrup = new grupo();
        $return2 = $objGrup->listar3($this->id_grupo);
        foreach ($return2 as $grupo) {
            $nomGrupo = $grupo->descp_grupo;
            $nomCap = $grupo->nom_cap;
            $fecha = $grupo->fecha_grupo;
            $horai = $grupo->horaini_grupo;
            $horaf = $grupo->horafin_grupo;
            $lugar = $grupo->lugar_cap;
        }
//Especificamos los datos y configuración del servidor
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;

//Nos autenticamos con nuestras credenciales en el servidor de correo Gmail
        $mail->Username = "feralexis007@gmail.com";
        $mail->Password = "finalfantasyX";

//Agregamos la información que el correo requiere
        $mail->From = "feralexis007@gmail.com";
        $mail->FromName = "Master";
        $mail->Subject = "Informacion Referente ala Inscripcion.";
        $mail->AltBody = "";
        $mail->MsgHTML("<h1>Inscripcion a la Capacitacion: $nomCap</h1><br/><p><h3>Tenga mis coordiales saludos Sr(a)$nomCompleto con el DNI $usua  </h3><br/>"
                . "Es un placer informar que se acaba de registrar en la capacitacion de $nomCap en el grupo '$nomGrupo' que se realizara en $lugar el dia $fecha , la hora de inicio sera alas $horai y culminar a las $horaf.<br/>"
                . "Sin mas que decirle nos pasamos a retirar.<br/>"
                . "Atte. Gobierno Regional de Lambayeque</p><br/>"
                . "<h3>Por favor no remitir ningun mensaje a este correo electronico, si remite algun mensaje a este correo no se le contestará.</h3></p>");
        $mail->AddAttachment("adjunto.txt");
        $mail->AddAddress("$email", "Usuario Prueba");
        $mail->IsHTML(true);

//Enviamos el correo electrónico
        $mail->Send();
    }

    public function cantidadInscrito($fechain, $fechafin) {
        $stmt = $this->objPdo->prepare("SELECT count(inscripcion.id_inscripcion)as cantidad,capacitacion.nom_cap,grupo.descp_grupo
  FROM inscripcion inner join grupo on inscripcion.id_grupo=grupo.id_grupo
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where capacitacion.fechafin_cap between :fechain and :fechafin
  group by capacitacion.nom_cap,grupo.descp_grupo");
        $arraySelect = array('fechain' => $fechain, "fechafin" => $fechafin);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function cboInscrito($id_grupo) {
        $stmt = $this->objPdo->prepare("SELECT id_inscripcion, datos_user.nom_user,datos_user.ape_user, id_grupo
  FROM inscripcion inner join datos_user on inscripcion.id_user=datos_user.id_user where id_grupo=:id_grupo");
         $arraySelect = array('id_grupo' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

//    public function eliminar($id) {
//        $stmt = $this->objPdo->prepare("DELETE FROM grupo WHERE id_cap=:id and descp_grupo=:descp");
//        $arrayDelete = array('id' => $id,
//            'descp' => $descp);
//        $result = $stmt->execute($arrayDelete);
//        return $result;
//    }
}

?>
