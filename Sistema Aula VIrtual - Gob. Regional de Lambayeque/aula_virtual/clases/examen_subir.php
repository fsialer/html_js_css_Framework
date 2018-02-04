<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of examen_subir
 *
 * @author Fernando
 */
class examen_subir {

    private $id_ex_s;
    private $archivo;
    private $id_exam;

    function __construct($archivo, $id_exam, $id_ex_s) {
        $this->id_ex_s = $id_ex_s;
        $this->archivo = $archivo;
        $this->id_exam = $id_exam;
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getId_ex_s() {
        return $this->id_ex_s;
    }

    public function getArchivo() {
        return $this->archivo;
    }

    public function getId_exam() {
        return $this->id_exam;
    }

    public function setId_ex_s($id_ex_s) {
        $this->id_ex_s = $id_ex_s;
    }

    public function setArchivo($archivo) {
        $this->archivo = $archivo;
    }

    public function setId_exam($id_exam) {
        $this->id_exam = $id_exam;
    }

    public function guardar() {
        if ($this->id_mat) {
            $stmt = $this->objPdo->prepare("UPDATE material SET  archivo=:archivo, id_exam=:id_exam
 WHERE id_ex_s=:id_ex_s");
            $arrayUpdate = array('archivo' => $this->archivo,
                'id_exam' => $this->id_exam,
                'id_ex_s' => $this->id_ex_s);
            $result = $stmt->execute($arrayUpdate);
        } else {
            $stmt = $this->objPdo->prepare("INSERT INTO examen_subir(archivo, id_exam)
    VALUES (:archivo,:id_exam)");
            $arrayInsert = array('archivo' => $this->archivo,
                'id_exam' => $this->id_exam);
            $result = $stmt->execute($arrayInsert);
        }
        return $result;
    }

    public function eliminar($id) {
        $stmt = $this->objPdo->prepare("DELETE FROM material WHERE id_mat=:id");
        $arrayDelete = array('id' => $id);
        $result = $stmt->execute($arrayDelete);
        return $result;
    }

    public function listar($txt_id_gru) {
        $stmt = $this->objPdo->prepare("SELECT id_ex_s, archivo, examen.id_exam
  FROM examen_subir inner join examen on examen_subir.id_exam=examen.id_exam
  inner join grupo on examen.id_grupo=grupo.id_grupo where examen.id_pub=2
  and grupo.id_grupo=:grup");
        $arraySelect = array('grup' => $txt_id_gru);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
