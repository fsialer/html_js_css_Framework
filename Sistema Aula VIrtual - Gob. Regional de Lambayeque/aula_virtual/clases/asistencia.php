<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of asistencia
 *
 * @author Fernando
 */
class asistencia {

    private $id_asistencia;
    private $id_inscripcion;
    private $fecha_asistencia;
    private $id_est_asist;

    function __construct($id_inscripcion, $fecha_asistencia, $id_est_asist, $id_asistencia = null) {
        $this->id_asistencia = $id_asistencia;
        $this->id_inscripcion = $id_inscripcion;
        $this->fecha_asistencia = $fecha_asistencia;
        $this->id_est_asist = $id_est_asist;
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getId_asistencia() {
        return $this->id_asistencia;
    }

    public function getId_inscripcion() {
        return $this->id_inscripcion;
    }

    public function getFecha_asistencia() {
        return $this->fecha_asistencia;
    }

    public function getId_est_asist() {
        return $this->id_est_asist;
    }

    public function setId_asistencia($id_asistencia) {
        $this->id_asistencia = $id_asistencia;
    }

    public function setId_inscripcion($id_inscripcion) {
        $this->id_inscripcion = $id_inscripcion;
    }

    public function setFecha_asistencia($fecha_asistencia) {
        $this->fecha_asistencia = $fecha_asistencia;
    }

    public function setId_est_asist($id_est_asist) {
        $this->id_est_asist = $id_est_asist;
    }

    public function guardar() {

        $stmt = $this->objPdo->prepare("INSERT INTO asistencia(id_inscripcion, fecha_asistencia, id_est_asist)VALUES 
           (:id_inscripcion,:fecha_asistencia,:id_est_asist)");
        $arrayInsert = array('id_inscripcion' => $this->id_inscripcion,
            'fecha_asistencia' => $this->fecha_asistencia,
            'id_est_asist' => $this->id_est_asist);
        $result = $stmt->execute($arrayInsert);
        return $result;
    }

    public function actualizar() {
//        echo "entro a actualizar";
        $stmt = $this->objPdo->prepare("UPDATE asistencia
   SET  id_est_asist=:id_est_asist WHERE fecha_asistencia=:fecha_asistencia and id_inscripcion=:id_inscripcion ");
        $arrayUpdate = array('id_est_asist' => $this->id_est_asist, 'fecha_asistencia' => $this->fecha_asistencia
            , 'id_inscripcion' => $this->id_inscripcion);
        $result = $stmt->execute($arrayUpdate);
        return $result;
    }

    public function listarEstadoAsist() {
        $stmt = $this->objPdo->prepare("SELECT * FROM estado_asistencia ORDER BY id_est_asist");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function comprobarFecha($fecha) {
        $stmt = $this->objPdo->prepare("SELECT fecha_asistencia FROM asistencia where fecha_asistencia=:fecha");
        $arraySelect = array('fecha' => $fecha);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarAsistencia($id_grupo) {
        $stmt = $this->objPdo->prepare("SELECT inscripcion.id_inscripcion,datos_user.nom_user,datos_user.ape_user
  FROM inscripcion inner join datos_user on inscripcion.id_user=datos_user.id_user
  inner join grupo on inscripcion.id_grupo=grupo.id_grupo where grupo.id_grupo=:grup");
        $arraySelect = array('grup' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarAsistInscr($id_inscp) {

        $stmt = $this->objPdo->prepare("SELECT id_asistencia, id_inscripcion, fecha_asistencia, estado_asistencia.abreviatura
  FROM asistencia inner join estado_asistencia on asistencia.id_est_asist=estado_asistencia.id_est_asist where id_inscripcion=:id_inscp");
        $arraySelect = array('id_inscp' => $id_inscp);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
        public function cantidadAsis($fechain,$fechafin) {
        $stmt = $this->objPdo->prepare("SELECT count(id_asistencia) as cantidad,capacitacion.nom_cap,grupo.descp_grupo
  FROM asistencia inner join inscripcion on asistencia.id_inscripcion=inscripcion.id_inscripcion
  inner join grupo on inscripcion.id_grupo=grupo.id_grupo
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where capacitacion.fechafin_cap between :fechain and :fechafin group by capacitacion.nom_cap,grupo.descp_grupo ");
        $arraySelect = array('fechain' => $fechain,'fechafin'=>$fechafin);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

//    public function eliminar(){
//        
//    }
}
