<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pregunta
 *
 * @author Fernando
 */
class pregunta {

    private $id_preg;
    private $descrip_pre;
    private $id_exam;
    private $puntaje;
    private $alter1;
    private $alter2;
    private $alter3;
    private $alter4;
    private $respta;

    function __construct($descrip_pre, $id_exam, $puntaje, $alter1, $alter2, $alter3, $alter4, $respta, $id_preg = null) {
        $this->id_preg = $id_preg;
        $this->descrip_pre = $descrip_pre;
        $this->id_exam = $id_exam;
        $this->puntaje = $puntaje;
        $this->alter1 = $alter1;
        $this->alter2 = $alter2;
        $this->alter3 = $alter3;
        $this->alter4 = $alter4;
        $this->respta = $respta;
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getId_preg() {
        return $this->id_preg;
    }

    public function getDescrip_pre() {
        return $this->descrip_pre;
    }

    public function getId_exam() {
        return $this->id_exam;
    }

    public function getPuntaje() {
        return $this->puntaje;
    }

    public function getAlter1() {
        return $this->alter1;
    }

    public function getAlter2() {
        return $this->alter2;
    }

    public function getAlter3() {
        return $this->alter3;
    }

    public function getAlter4() {
        return $this->alter4;
    }

    public function getRespta() {
        return $this->respta;
    }

    public function setId_preg($id_preg) {
        $this->id_preg = $id_preg;
    }

    public function setDescrip_pre($descrip_pre) {
        $this->descrip_pre = $descrip_pre;
    }

    public function setId_exam($id_exam) {
        $this->id_exam = $id_exam;
    }

    public function setPuntaje($puntaje) {
        $this->puntaje = $puntaje;
    }

    public function setAlter1($alter1) {
        $this->alter1 = $alter1;
    }

    public function setAlter2($alter2) {
        $this->alter2 = $alter2;
    }

    public function setAlter3($alter3) {
        $this->alter3 = $alter3;
    }

    public function setAlter4($alter4) {
        $this->alter4 = $alter4;
    }

    public function setRespta($respta) {
        $this->respta = $respta;
    }

    public function guardar() {
        if ($this->id_preg) {
            $stmt = $this->objPdo->prepare("UPDATE pregunta
   SET descrip_pre=:descrip_pre, id_exam=:id_exam, puntaje=:puntaje, alter1=:alter1, alter2=:alter2, 
       alter3=:alter3, alter4=:alter4
 WHERE id_preg=:id_preg");
            $arrayUpdate = array('descrip_pre' => $this->descrip_pre,
                'id_exam' => $this->id_exam,
                'puntaje' => $this->puntaje,
                'alter1' => $this->alter1,
                'alter2' => $this->alter2,
                'alter3' => $this->alter3,
                'alter4' => $this->alter4,
                'id_preg' => $this->id_preg);
            $result = $stmt->execute($arrayUpdate);
        } else {
            $stmt = $this->objPdo->prepare("INSERT INTO pregunta(descrip_pre, id_exam, puntaje, alter1, alter2, alter3, 
            alter4)
    VALUES (:descrip_pre,:id_exam,:puntaje,:alter1,:alter2,:alter3,:alter4)");
            $arrayInsert = array('descrip_pre' => $this->descrip_pre,
                'id_exam' => $this->id_exam,
                'puntaje' => $this->puntaje,
                'alter1' => $this->alter1,
                'alter2' => $this->alter2,
                'alter3' => $this->alter3,
                'alter4' => $this->alter4);
            $result = $stmt->execute($arrayInsert);
        }
        return $result;
    }

    public function listar($txt_id_gru) {
        $stmt = $this->objPdo->prepare("SELECT id_preg, descrip_pre, examen.id_exam, puntaje, alter1, alter2, alter3, 
       alter4, respta FROM pregunta inner join examen on pregunta.id_exam=examen.id_exam
  inner join grupo on examen.id_grupo=grupo.id_grupo where grupo.id_grupo=:grup and examen.id_pub=2 group by id_preg, descrip_pre, examen.id_exam, puntaje, alter1, alter2, alter3, 
       alter4, respta");
        $arraySelect = array('grup' => $txt_id_gru);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function actualizar() {
        $stmt = $this->objPdo->prepare("UPDATE pregunta SET  respta=:respta WHERE id_preg=:id_preg");
        $arrayUpdate = array('respta' => $this->respta,
            'id_preg' => $this->id_preg);
        $result = $stmt->execute($arrayUpdate);
        return $result;
    }

    public function eliminar($id) {
        $stmt = $this->objPdo->prepare("DELETE FROM pregunta WHERE id_preg=:id");
        $arrayDelete = array('id' => $id);
        $result = $stmt->execute($arrayDelete);
        return $result;
    }

    public function listarAlter($id_preg) {
        $stmt = $this->objPdo->prepare("SELECT * FROM pregunta where id_preg=:id ");
        $arraySelect = array('id' => $id_preg);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarPreguntasDesarrollar($id_examen) {
        $stmt = $this->objPdo->prepare("SELECT * FROM pregunta where id_exam=:id ");
        $arraySelect = array('id' => $id_examen);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
        public function compararRpta($id_pregunta,$rpta) {
        $stmt = $this->objPdo->prepare("SELECT * FROM pregunta where id_preg=:id and respta=:rpta");
        $arraySelect = array('id' => $id_pregunta,'rpta'=>$rpta);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
