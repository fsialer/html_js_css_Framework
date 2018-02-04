<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of evaluacion
 *
 * @author Fernando
 */
class evaluacion {

    private $punto_eval;
    private $id_user;
    private $id_exam;
    private $id_eval;
    private $id_inscripcion;

    function __construct($punto_eval, $id_inscripcion, $id_exam, $id_eval = null) {
        $this->punto_eval = $punto_eval;
        $this->id_inscripcion = $id_inscripcion;
        $this->id_exam = $id_exam;
        $this->id_eval = $id_eval;
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getId_inscripcion() {
        return $this->id_inscripcion;
    }

    public function setId_inscripcion($id_inscripcion) {
        $this->id_inscripcion = $id_inscripcion;
    }

    public function getPunto_eval() {
        return $this->punto_eval;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getId_exam() {
        return $this->id_exam;
    }

    public function getId_eval() {
        return $this->id_eval;
    }

    public function setPunto_eval($punto_eval) {
        $this->punto_eval = $punto_eval;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function setId_exam($id_exam) {
        $this->id_exam = $id_exam;
    }

    public function setId_eval($id_eval) {
        $this->id_eval = $id_eval;
    }

    public function guardar() {
        if ($this->id_eval) {            
            $stmt = $this->objPdo->prepare("UPDATE evaluacion SET punto_eval=:punto_eval WHERE id_eval=:id_eval");
            echo "dsds"+$stmt;
            $arrayUpdate = array('punto_eval'=>$this->punto_eval,'id_eval' => $this->id_eval);
            $result = $stmt->execute($arrayUpdate);
        } else {
            $stmt = $this->objPdo->prepare("INSERT INTO evaluacion(punto_eval,id_inscripcion,id_exam)VALUES"
                    . "(:punto_eval,:id_inscripcion,:id_exam)");
            $arrayInsert = array('punto_eval' => $this->punto_eval,
                'id_inscripcion' => $this->id_inscripcion,
                'id_exam' => $this->id_exam);
            $result = $stmt->execute($arrayInsert);
        }

        return $result;
    }

    public function listarNotas($id_ins) {
        $stmt = $this->objPdo->prepare("SELECT examen.nom_exam,punto_eval
  FROM evaluacion inner join inscripcion on evaluacion.id_inscripcion=inscripcion.id_inscripcion
  inner join examen on evaluacion.id_exam=examen.id_exam
  where inscripcion.id_inscripcion=:id_ins");
        $arraySelect = array('id_ins' => $id_ins);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function ComprobarExamen($id_inscripcion, $id_exam) {
        $stmt = $this->objPdo->prepare("SELECT examen.nom_exam,evaluacion.punto_eval,evaluacion.id_inscripcion,evaluacion.id_exam
  FROM evaluacion inner join inscripcion on evaluacion.id_inscripcion=inscripcion.id_inscripcion
  inner join examen on evaluacion.id_exam=examen.id_exam
  inner join grupo on examen.id_grupo=grupo.id_grupo
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where evaluacion.id_inscripcion=:id_inscripcion and examen.id_exam=:id_exam");
        $arraySelect = array('id_inscripcion' => $id_inscripcion, 'id_exam' => $id_exam);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarNotasEscrito($txt_id_gru) {
        $stmt = $this->objPdo->prepare("SELECT id_eval,inscripcion.id_inscripcion,examen.id_exam,datos_user.nom_user,datos_user.ape_user,examen.nom_exam,punto_eval
  FROM evaluacion inner join examen on evaluacion.id_exam=examen.id_exam
  inner join inscripcion on evaluacion.id_inscripcion=inscripcion.id_inscripcion
  inner join datos_user on inscripcion.id_user=datos_user.id_user
  where examen.id_texam=2 and inscripcion.id_grupo=:txt_id_gru");
        $arraySelect = array('txt_id_gru' => $txt_id_gru);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function eliminar($id_eval) {
        $stmt = $this->objPdo->prepare("DELETE FROM evaluacion WHERE id_eval=:id_eval");
        $arrayDelete = array('id_eval' => $id_eval);
        $result = $stmt->execute($arrayDelete);
        return $result;
    }
     public function cantAprobados($fechain, $fechafin) {
        $stmt = $this->objPdo->prepare("SELECT  count(*)as cantidad,capacitacion.nom_cap,grupo.descp_grupo
  FROM evaluacion inner join inscripcion on evaluacion.id_inscripcion=inscripcion.id_inscripcion
  inner join datos_user on inscripcion.id_user=datos_user.id_user
 inner join grupo on inscripcion.id_grupo=grupo.id_grupo
 inner join capacitacion on grupo.id_cap=capacitacion.id_cap
 where capacitacion.fechafin_cap between :fechain and :fechafin
  group by datos_user.nom_user,datos_user.ape_user,id_exam,id_eval,capacitacion.nom_cap,grupo.descp_grupo
having avg(punto_eval )>11");
        $arraySelect = array('fechain' => $fechain, 'fechafin' => $fechafin);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
