<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grupo
 *
 * @author Fernando
 */
class grupo {

    private $horaini_grupo;
    private $horafin_grupo;
    private $fecha_grupo;
    private $disp_grupo;
    private $id_cap;
    private $descp_grupo;
    private $id_grupo;

    function __construct($horaini_grupo, $horafin_grupo, $fecha_grupo, $disp_grupo, $id_cap, $descp_grupo, $id_grupo = null) {
        $this->horaini_grupo = $horaini_grupo;
        $this->horafin_grupo = $horafin_grupo;
        $this->fecha_grupo = $fecha_grupo;
        $this->disp_grupo = $disp_grupo;
        $this->id_cap = $id_cap;
        $this->descp_grupo = $descp_grupo;
        $this->id_grupo = $id_grupo;
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getHoraini_grupo() {
        return $this->horaini_grupo;
    }

    public function getId_grupo() {
        return $this->id_grupo;
    }

    public function getDescp_grupo() {
        return $this->descp_grupo;
    }

    public function setDescp_grupo($descp_grupo) {
        $this->descp_grupo = $descp_grupo;
    }

    public function getHorafin_grupo() {
        return $this->horafin_grupo;
    }

    public function getFecha_grupo() {
        return $this->fecha_grupo;
    }

    public function getDisp_grupo() {
        return $this->disp_grupo;
    }

    public function getId_cap() {
        return $this->id_cap;
    }

    public function setId_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }

    public function setHoraini_grupo($horaini_grupo) {
        $this->horaini_grupo = $horaini_grupo;
    }

    public function setHorafin_grupo($horafin_grupo) {
        $this->horafin_grupo = $horafin_grupo;
    }

    public function setFecha_grupo($fecha_grupo) {
        $this->fecha_grupo = $fecha_grupo;
    }

    public function setDisp_grupo($disp_grupo) {
        $this->disp_grupo = $disp_grupo;
    }

    public function setId_cap($id_cap) {
        $this->id_cap = $id_cap;
    }

    public function guardar() {
//        if ($this->id_cap) {
//            $stmt = $this->objPdo->prepare("UPDATE grupo set horaini_grupo=:horaini_grupo,
//                horafin_grupo=:horafin_grupo,
//                fecha_grupo=:fecha_grupo,
//                disp_grupo=:fechafin_cap                          
//                WHERE id_cap=:id_cap");
//            $arrayUpdate = array('horaini_grupo' => $this->horaini_grupo,
//                'horafin_grupo' => $this->lugar_cap,
//                'fecha_grupo' => $this->fechaini_cap,
//                'disp_grupo' => $this->fechafin_cap,               
//                'id_cap' => $this->id_user);
//            $result = $stmt->execute($arrayUpdate);
//        } else {
        $stmt = $this->objPdo->prepare("INSERT INTO grupo (horaini_grupo,horafin_grupo,fecha_grupo,disp_grupo,id_cap,descp_grupo)"
                . " VALUES (:horaini_grupo,:horafin_grupo,:fecha_grupo,:disp_grupo,:id_cap,:descp_grupo)");
        $arrayInsert = array('horaini_grupo' => $this->horaini_grupo,
            'horafin_grupo' => $this->horafin_grupo,
            'fecha_grupo' => $this->fecha_grupo,
            'disp_grupo' => $this->disp_grupo,
            'id_cap' => $this->id_cap,
            'descp_grupo' => $this->descp_grupo
        );
        $result = $stmt->execute($arrayInsert);
//        }
        return $result;
    }

    public function actualizar() {
        $stmt = $this->objPdo->prepare("UPDATE grupo set horaini_grupo=:horaini_grupo,
                horafin_grupo=:horafin_grupo,
                fecha_grupo=:fecha_grupo,
                disp_grupo=:disp_grupo,
                id_cap=:id_cap,
                descp_grupo=:descp_grupo
                WHERE id_grupo=:id_grupo");
        $arrayUpdate = array('horaini_grupo' => $this->horaini_grupo,
            'horafin_grupo' => $this->horafin_grupo,
            'fecha_grupo' => $this->fecha_grupo,
            'disp_grupo' => $this->disp_grupo,
            'id_cap' => $this->id_cap,
            'descp_grupo' => $this->descp_grupo,
            'id_grupo' => $this->id_grupo);
        $result = $stmt->execute($arrayUpdate);
        return $result;
    }

    public function listar() {
        $stmt = $this->objPdo->prepare("SELECT horaini_grupo, horafin_grupo, fecha_grupo, disp_grupo, capacitacion.id_cap,capacitacion.nom_cap, 
       descp_grupo, id_grupo
  FROM grupo inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where capacitacion.id_pub=2");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listar2($id_g) {
        $stmt = $this->objPdo->prepare("SELECT horaini_grupo, horafin_grupo, fecha_grupo, disp_grupo, capacitacion.id_cap, 
       descp_grupo, grupo.id_grupo
  FROM grupo inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where capacitacion.id_pub=1 and grupo.id_grupo=:id_g");
        $arraySelect = array('id_g' => $id_g);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
      public function listar3($id_g) {
        $stmt = $this->objPdo->prepare("SELECT horaini_grupo, horafin_grupo, fecha_grupo, disp_grupo, capacitacion.id_cap, 
       descp_grupo, grupo.id_grupo,capacitacion.nom_cap,capacitacion.lugar_cap
  FROM grupo inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where capacitacion.id_pub=1 and grupo.id_grupo=:id_g");
        $arraySelect = array('id_g' => $id_g);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function eliminar($id) {
        $stmt = $this->objPdo->prepare("DELETE FROM grupo WHERE id_grupo=:id");
        $arrayDelete = array('id' => $id);
        $result = $stmt->execute($arrayDelete);
        return $result;
    }

    public function listarPorCap($id_cap) {
        $stmt = $this->objPdo->prepare("SELECT id_grupo,descp_grupo,disp_grupo,fecha_grupo,horaini_grupo,horafin_grupo FROM grupo where id_cap=:id_cap and disp_grupo>0");
        $arraySelect = array('id_cap' => $id_cap);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function DispGrupo() {
        $stmt = $this->objPdo->prepare("UPDATE grupo set 
                disp_grupo=disp_grupo-:disp_grupo
                WHERE id_grupo=:id_grupo");
        $arrayUpdate = array(
            'disp_grupo' => 1,
            'id_grupo' => $this->id_grupo);
        $result = $stmt->execute($arrayUpdate);
        return $result;
    }

    public function listarDetCap($dni, $id_grup) {
        $stmt = $this->objPdo->prepare("SELECT id_grupo, capacitacion.nom_cap,capacitacion.descrip_cap,capacitacion.fechaini_cap,fechafin_cap,grupo.descp_grupo
  FROM grupo inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  inner join datos_user on capacitacion.id_user=datos_user.id_user
  where datos_user.dni_user=:dni and id_grupo=:id_grup");
        $arraySelect = array('dni' => $dni, 'id_grup' => $id_grup);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    public function listarCapFecha($fecha_in, $fecha_fin) {
        $stmt = $this->objPdo->prepare("SELECT id_grupo,capacitacion.nom_cap,grupo.descp_grupo,datos_user.nom_user,datos_user.ape_user
  FROM grupo inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  inner join datos_user on capacitacion.id_user=datos_user.id_user 
  where capacitacion.fechaini_cap between :fecha_in and :fecha_fin");
        $arraySelect = array('fecha_in' => $fecha_in, 'fecha_fin' => $fecha_fin);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    

}
