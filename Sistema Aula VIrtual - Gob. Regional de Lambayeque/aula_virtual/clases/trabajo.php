<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of trabajo
 *
 * @author Fernando
 */
class trabajo {

    private $id_trabajo;
    private $nom_trabajo;
    private $arch_trabajo;
    private $fecha_trabajo;
    private $id_inscripcion;

    function __construct($nom_trabajo, $arch_trabajo, $fecha_trabajo, $id_inscripcion, $id_trabajo = null) {
        $this->id_trabajo = $id_trabajo;
        $this->nom_trabajo = $nom_trabajo;
        $this->arch_trabajo = $arch_trabajo;
        $this->fecha_trabajo = $fecha_trabajo;
        $this->id_inscripcion = $id_inscripcion;
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getId_trabajo() {
        return $this->id_trabajo;
    }

    public function getNom_trabajo() {
        return $this->nom_trabajo;
    }

    public function getArch_trabajo() {
        return $this->arch_trabajo;
    }

    public function getFecha_trabajo() {
        return $this->fecha_trabajo;
    }

    public function getId_inscripcion() {
        return $this->id_inscripcion;
    }

    public function setId_trabajo($id_trabajo) {
        $this->id_trabajo = $id_trabajo;
    }

    public function setNom_trabajo($nom_trabajo) {
        $this->nom_trabajo = $nom_trabajo;
    }

    public function setArch_trabajo($arch_trabajo) {
        $this->arch_trabajo = $arch_trabajo;
    }

    public function setFecha_trabajo($fecha_trabajo) {
        $this->fecha_trabajo = $fecha_trabajo;
    }

    public function setId_inscripcion($id_inscripcion) {
        $this->id_inscripcion = $id_inscripcion;
    }

    public function guardar() {
        if ($this->id_trabajo) {
            $stmt = $this->objPdo->prepare("UPDATE trabajo
   SET nom_trabajo=:nom_trabajo, arch_trabajo=:arch_trabajo, fecha_trabajo=:fecha_trabajo     
 WHERE id_trabajo=:id_trabajo");
            $arrayUpdate = array('nom_trabajo'=>$this->nom_trabajo,
                'arch_trabajo' => $this->arch_trabajo,
                'fecha_trabajo' => $this->fecha_trabajo,               
                'id_trabajo' => $this->id_trabajo);
            $result = $stmt->execute($arrayUpdate);
        } else {
            $stmt = $this->objPdo->prepare("INSERT INTO trabajo(nom_trabajo, arch_trabajo, fecha_trabajo, id_inscripcion)
    VALUES (:nom_trabajo, :arch_trabajo, :fecha_trabajo, :id_inscripcion)");
            $arrayInsert = array('nom_trabajo' => $this->nom_trabajo,
                'arch_trabajo' => $this->arch_trabajo,
                'fecha_trabajo' => $this->fecha_trabajo,
                'id_inscripcion' => $this->id_inscripcion);
            $result = $stmt->execute($arrayInsert);
        }
        return $result;
    }

    public function eliminar($id) {

        $stmt = $this->objPdo->prepare("DELETE FROM trabajo WHERE id_trabajo=:id");
        $arrayDelete = array('id' => $id);
        $result = $stmt->execute($arrayDelete);
        return $result;
    }
    public function listar($id_inscp){
        $stmt = $this->objPdo->prepare("SELECT id_trabajo, nom_trabajo, arch_trabajo, fecha_trabajo
  FROM trabajo where id_inscripcion=:id_inscp");
        $arraySelect = array('id_inscp' => $id_inscp);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
    public function listarTrabDesc($id_grupo){
       
        $stmt = $this->objPdo->prepare("SELECT id_trabajo, nom_trabajo, arch_trabajo, fecha_trabajo,datos_user.nom_user,datos_user.ape_user
  FROM trabajo inner join inscripcion on trabajo.id_inscripcion=inscripcion.id_inscripcion
  inner join grupo on inscripcion.id_grupo=grupo.id_grupo
  inner join datos_user on inscripcion.id_user=datos_user.id_user
  where grupo.id_grupo=:id_grupo");
        $arraySelect = array('id_grupo' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
