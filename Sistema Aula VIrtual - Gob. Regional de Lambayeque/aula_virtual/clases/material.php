<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of material
 *
 * @author Fernando
 */
class material {

    private $id_mat;
    private $nom_mat;
    private $arch_mat;
    private $fecha_mat;
    private $coment_mat;
    private $id_grupo;
    

    function __construct($nom_mat, $arch_mat, $fecha_mat, $coment_mat, $id_grupo, $id_mat = null) {
        $this->id_mat = $id_mat;
        $this->nom_mat = $nom_mat;
        $this->arch_mat = $arch_mat;
        $this->fecha_mat = $fecha_mat;
        $this->coment_mat = $coment_mat;
        $this->id_grupo = $id_grupo;
       
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getId_mat() {
        return $this->id_mat;
    }
    public function getId_grupo() {
        return $this->id_grupo;
    }

    public function setId_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }

        public function getNom_mat() {
        return $this->nom_mat;
    }

    public function getArch_mat() {
        return $this->arch_mat;
    }

    public function getFecha_mat() {
        return $this->fecha_mat;
    }

    public function getComent_mat() {
        return $this->coment_mat;
    }

    public function getId_cap() {
        return $this->id_cap;
    }

    public function getDesc_grupo() {
        return $this->desc_grupo;
    }

    public function setId_mat($id_mat) {
        $this->id_mat = $id_mat;
    }

    public function setNom_mat($nom_mat) {
        $this->nom_mat = $nom_mat;
    }

    public function setArch_mat($arch_mat) {
        $this->arch_mat = $arch_mat;
    }

    public function setFecha_mat($fecha_mat) {
        $this->fecha_mat = $fecha_mat;
    }

    public function setComent_mat($coment_mat) {
        $this->coment_mat = $coment_mat;
    }

    public function setId_cap($id_cap) {
        $this->id_cap = $id_cap;
    }

    public function setDesc_grupo($desc_grupo) {
        $this->desc_grupo = $desc_grupo;
    }

    public function guardar() {
        if ($this->id_mat) {
            $stmt = $this->objPdo->prepare("UPDATE material SET  nom_mat=:nom_mat, arch_mat=:arch_mat, fecha_mat=:fecha_mat, coment_mat=:coment_mat
 WHERE id_mat=:id_mat");
            $arrayUpdate = array('nom_mat' => $this->nom_mat,
                'arch_mat' => $this->arch_mat,
                'fecha_mat' => $this->fecha_mat,
                'coment_mat' => $this->coment_mat,
                'id_mat' => $this->id_mat);
            $result = $stmt->execute($arrayUpdate);
        } else {
            $stmt = $this->objPdo->prepare("INSERT INTO material(nom_mat, arch_mat, fecha_mat, coment_mat, id_grupo)
    VALUES (:nom_mat,:arch_mat,:fecha_mat,:coment_mat,:id_grupo)");
            $arrayInsert = array('nom_mat' => $this->nom_mat,
                'arch_mat' => $this->arch_mat,
                'fecha_mat' => $this->fecha_mat,
                'coment_mat' => $this->coment_mat,
                'id_grupo' => $this->id_grupo);
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

    public function listar($id_grupo) {
        $stmt = $this->objPdo->prepare("SELECT id_mat, nom_mat, arch_mat, fecha_mat, coment_mat, grupo.id_grupo
  FROM material inner join grupo on material.id_grupo=grupo.id_grupo
  where grupo.id_grupo=:id_grupo");
        $arraySelect = array('id_grupo' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarMaterialIns($nom_cap, $des_gr) {
        $stmt = $this->objPdo->prepare("SELECT id_mat, nom_mat, arch_mat, fecha_mat, coment_mat, grupo.id_grupo
  FROM material inner join grupo on material.id_grupo=grupo.id_grupo
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where grupo.descp_grupo=:des_gr and capacitacion.nom_cap=:nom_cap group  by id_mat, nom_mat, arch_mat, fecha_mat, coment_mat, grupo.id_grupo");
        $arraySelect = array('nom_cap' => $nom_cap, 'des_gr' => $des_gr);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
