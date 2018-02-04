<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of datos_user
 *
 * @author Fernando
 */
class datos_user {

    private $id_user;
    private $nom_user;
    private $ape_user;
    private $dir_user;
    private $tc_user;
    private $email_user;
    private $id_sexo;
    private $dni_user;
    private $clave_user;
    private $id_tuser;

    function __construct($nom_user, $ape_user, $dir_user, $tc_user, $email_user, $id_sexo, $dni_user, $clave_user, $id_tuser, $id_user = null) {
        $this->id_user = $id_user;
        $this->nom_user = $nom_user;
        $this->ape_user = $ape_user;
        $this->dir_user = $dir_user;
        $this->tc_user = $tc_user;
        $this->email_user = $email_user;
        $this->id_sexo = $id_sexo;
        $this->dni_user = $dni_user;
        $this->clave_user = $clave_user;
        $this->id_tuser = $id_tuser;
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getNom_user() {
        return $this->nom_user;
    }

    public function getApe_user() {
        return $this->ape_user;
    }

    public function getDir_user() {
        return $this->dir_user;
    }

    public function getTc_user() {
        return $this->tc_user;
    }

    public function getEmail_user() {
        return $this->email_user;
    }

    public function getId_sexo() {
        return $this->id_sexo;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function setNom_user($nom_user) {
        $this->nom_user = $nom_user;
    }

    public function setApe_user($ape_user) {
        $this->ape_user = $ape_user;
    }

    public function setDir_user($dir_user) {
        $this->dir_user = $dir_user;
    }

    public function setTc_user($tc_user) {
        $this->tc_user = $tc_user;
    }

    public function setEmail_user($email_user) {
        $this->email_user = $email_user;
    }

    public function setId_sexo($id_sexo) {
        $this->id_sexo = $id_sexo;
    }

    public function guardar() {
        if ($this->id_user) {
            $stmt = $this->objPdo->prepare("UPDATE datos_user set nom_user=:nom_user,
                ape_user=:ape_user,
                dir_user=:dir_user,
                tc_user=:tc_user,
                email_user=:email_user,
                id_sexo=:id_sexo,
                dni_user=:dni_user                        
                WHERE id_user=:id_user");
            $arrayUpdate = array('nom_user' => $this->nom_user,
                'ape_user' => $this->ape_user,
                'dir_user' => $this->dir_user,
                'tc_user' => $this->tc_user,
                'email_user' => $this->email_user,
                'id_sexo' => $this->id_sexo,
                'dni_user' => $this->dni_user,
                'id_user' => $this->id_user);
            $result = $stmt->execute($arrayUpdate);
        } else {
            $stmt = $this->objPdo->prepare("INSERT INTO datos_user (nom_user,ape_user,dir_user,tc_user,email_user,id_sexo,dni_user,clave_user,id_tuser) VALUES (:nom_user,:ape_user,:dir_user,:tc_user,:email_user,:id_sexo,:dni_user,:clave_user,:id_tuser)");
            $arrayInsert = array('nom_user' => $this->nom_user,
                'ape_user' => $this->ape_user,
                'dir_user' => $this->dir_user,
                'tc_user' => $this->tc_user,
                'email_user' => $this->email_user,
                'id_sexo' => $this->id_sexo,
                'dni_user' => $this->dni_user,
                'clave_user' => $this->clave_user,
                'id_tuser' => $this->id_tuser);
            $result = $stmt->execute($arrayInsert);
        }
        return $result;
    }

    public function verificarUsuario() {
        $stmt = $this->objPdo->prepare("SELECT nom_user,ape_user,dni_user,clave_user,id_tuser FROM datos_user");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarSexo() {
        $stmt = $this->objPdo->prepare("SELECT * FROM sexo");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarDatos($dni) {
        $stmt = $this->objPdo->prepare("SELECT * FROM datos_user WHERE dni_user='$dni'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarDatos2($id_user) {
        $stmt = $this->objPdo->prepare("SELECT * FROM datos_user WHERE id_user='$id_user'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listar() {
        $stmt = $this->objPdo->prepare("SELECT * FROM datos_user WHERE id_tuser=3 ORDER BY id_user asc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarAdmin() {
        $stmt = $this->objPdo->prepare("SELECT * FROM datos_user WHERE id_tuser=1 ORDER BY id_user asc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function eliminar($id) {
        $stmt = $this->objPdo->prepare("DELETE FROM datos_user WHERE id_user=:id");
        $arrayDelete = array('id' => $id);
        $result = $stmt->execute($arrayDelete);
        return $result;
    }

    public function listarDNI($dni) {
        $stmt = $this->objPdo->prepare("SELECT id_user,dni_user FROM datos_user WHERE dni_user=:dni and id_tuser=2");
        $arraySelect = array('dni' => $dni);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function correo() {
        require("../phpMailer/class.phpmailer.php");
        require("../phpMailer/class.smtp.php");

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
        $mail->Subject = "Bienvenido a Aula Virtual GRL";
        $mail->AltBody = "";
        $mail->MsgHTML("<h1>Registro a Aula Virtual GRL</h1><br/><p><h3>Bienvenido Sr(a)$this->nom_user $this->ape_user </h3><br/>"
                . "Se acaba de registrar al sistema de capacitacion del gobierno regional. A continuacion se le mostrará sus datos de inicio de sesion.</p><br/>"
                . "<p><h2>Usuario:$this->dni_user</h2><br/>"
                . "<h2>Contraseña:$this->clave_user</h2><br/><br/>"
                . "<h3>Por favor no remitir ningun mensaje a este correo electronico, si remite algun mensaje a este correo no se le contestará.</h3></p>");
        $mail->AddAttachment("adjunto.txt");
        $mail->AddAddress("$this->email_user", "Usuario Prueba");
        $mail->IsHTML(true);

//Enviamos el correo electrónico
        $mail->Send();
    }

    public function tipoUsuario() {
        $stmt = $this->objPdo->prepare("SELECT * FROM tipo_user ORDER BY id_tuser asc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarUsuarioTipo($id_tipo, $id_sexo) {
        $stmt = $this->objPdo->prepare("SELECT * FROM datos_user WHERE id_tuser=:id_tipo and id_sexo=:id_sexo");
        $arraySelect = array('id_tipo' => $id_tipo, 'id_sexo' => $id_sexo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }



}
