<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of examen
 *
 * @author Lenovo
 */
class examen {

    private $id_exam;
    private $nom_exam;
    private $fecha_exam;
    private $coment_exam;
    private $id_grupo;
    private $tlimite_exam;
    private $id_texam;
    private $id_pub;

    function __construct($nom_exam, $fecha_exam, $coment_exam, $id_grupo, $tlimite_exam,$id_texam,$id_pub, $id_exam = null) {
        $this->id_exam = $id_exam;
        $this->nom_exam = $nom_exam;
        $this->fecha_exam = $fecha_exam;
        $this->coment_exam = $coment_exam;
        $this->id_grupo = $id_grupo;
        $this->tlimite_exam = $tlimite_exam;
        $this->id_texam = $id_texam;        
        $this->id_pub = $id_pub;      
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getId_texam() {
        return $this->id_texam;
    }

    public function getId_pub() {
        return $this->id_pub;
    }

    public function setId_texam($id_texam) {
        $this->id_texam = $id_texam;
    }

    public function setId_pub($id_pub) {
        $this->id_pub = $id_pub;
    }

        public function getId_exam() {
        return $this->id_exam;
    }

    public function getId_grupo() {
        return $this->id_grupo;
    }

    public function setId_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }

    public function setId_exam($id_exam) {
        $this->id_exam = $id_exam;
    }

    public function getNom_exam() {
        return $this->nom_exam;
    }

    public function setNom_exam($nom_exam) {
        $this->nom_exam = $nom_exam;
    }

    public function getFecha_exam() {
        return $this->fecha_exam;
    }

    public function setFecha_exam($fecha_exam) {
        $this->fecha_exam = $fecha_exam;
    }

    public function getComent_exam() {
        return $this->coment_exam;
    }

    public function setComent_exam($coment_exam) {
        $this->coment_exam = $coment_exam;
    }

    public function getId_cap() {
        return $this->id_cap;
    }

    public function setId_cap($id_cap) {
        $this->id_cap = $id_cap;
    }

    public function getDesc_grupo() {
        return $this->desc_grupo;
    }

    public function setDesc_grupo($desc_grupo) {
        $this->desc_grupo = $desc_grupo;
    }

    public function getTlimite_exam() {
        return $this->tlimite_exam;
    }

    public function setTlimite_exam($tlimite_exam) {
        $this->tlimite_exam = $tlimite_exam;
    }

    public function guardar() {
        if ($this->id_exam) {
            $stmt = $this->objPdo->prepare("UPDATE examen SET nom_exam=:nom_exam, fecha_exam=:fecha_exam, coment_exam=:coment_exam, 
       t else {limite_exam=:tlimite_exam ,id_texam=:id_texam WHERE id_exam=:id_exam");
            $arrayUpdate = array('nom_exam' => $this->nom_exam,
                'fecha_exam' => $this->fecha_exam,
                'coment_exam' => $this->coment_exam,
                'tlimite_exam' => $this->tlimite_exam,
                'id_texam'=>$this->id_texam,
                'id_exam' => $this->id_exam);
            $result = $stmt->execute($arrayUpdate);
        }else{
            $stmt = $this->objPdo->prepare("INSERT INTO examen(nom_exam, fecha_exam, coment_exam, id_grupo, tlimite_exam, 
            id_texam, id_pub)
    VALUES (:nom_exam, :fecha_exam, :coment_exam, :id_grupo, :tlimite_exam,:id_texam, :id_pub)");
            $arrayInsert = array('nom_exam' => $this->nom_exam,
                'fecha_exam' => $this->fecha_exam,
                'coment_exam' => $this->coment_exam,
                'id_grupo' => $this->id_grupo,
                'tlimite_exam' => $this->tlimite_exam,
                'id_texam' => $this->id_texam,
                'id_pub' => $this->id_pub);
            $result = $stmt->execute($arrayInsert);
        }


        return $result;
    }
     public function actualizar() {      
            $stmt = $this->objPdo->prepare("UPDATE examen SET id_pub=:id_pub WHERE id_exam=:id_exam");
            $arrayUpdate = array('id_pub' => $this->id_pub,'id_exam' => $this->id_exam);
            $result = $stmt->execute($arrayUpdate);    


        return $result;
    }

    public function listar($id_grupo) {
        $stmt = $this->objPdo->prepare("SELECT * FROM examen WHERE id_grupo=:id_grupo and id_pub=2");
        $arraySelect = array('id_grupo' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function listar2($id_grupo) {
        $stmt = $this->objPdo->prepare("SELECT * FROM examen WHERE id_grupo=:id_grupo and id_texam=1 and id_pub=2");
        $arraySelect = array('id_grupo' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function listar3($id_grupo) {
        $stmt = $this->objPdo->prepare("SELECT * FROM examen WHERE id_grupo=:id_grupo and id_pub=1");
        $arraySelect = array('id_grupo' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarExamSubir($id_grupo) {
        $stmt = $this->objPdo->prepare("SELECT * FROM examen WHERE id_grupo=:id_grupo and id_texam=2 and id_pub=2");
        $arraySelect = array('id_grupo' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function eliminar($id) {
        $stmt = $this->objPdo->prepare("DELETE FROM examen WHERE id_exam=:id");
        $arrayDelete = array('id' => $id);
        $result = $stmt->execute($arrayDelete);
        return $result;
    }

    public function listarExamenDesa($txt_nom_cap, $txtDet_gr) {
        $stmt = $this->objPdo->prepare("SELECT examen.id_exam, nom_exam, fecha_exam, coment_exam, grupo.id_grupo, tlimite_exam,tipo_examen.id_texam,publicar.id_pub
  FROM examen inner join tipo_examen on examen.id_texam=tipo_examen.id_texam
  inner join publicar on examen.id_pub=publicar.id_pub
  inner join grupo on examen.id_grupo=grupo.id_grupo
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where capacitacion.nom_cap=:no_cap and grupo.descp_grupo=:gru and publicar.id_pub=1 and tipo_examen.id_texam=1");
        $arraySelect = array('no_cap' => $txt_nom_cap, 'gru' => $txtDet_gr);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function listarExamenDesa2($txt_nom_cap, $txtDet_gr) {
        $stmt = $this->objPdo->prepare("SELECT examen.id_exam, nom_exam, fecha_exam, coment_exam, grupo.id_grupo, tlimite_exam,tipo_examen.id_texam,publicar.id_pub,examen_subir.archivo
  FROM examen inner join examen_subir on examen.id_exam=examen_subir.id_exam
  inner join tipo_examen on examen.id_texam=tipo_examen.id_texam
  inner join publicar on examen.id_pub=publicar.id_pub
  inner join grupo on examen.id_grupo=grupo.id_grupo
  inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  where capacitacion.nom_cap=:no_cap and grupo.descp_grupo=:gru and publicar.id_pub=1 and tipo_examen.id_texam=2");
        $arraySelect = array('no_cap' => $txt_nom_cap, 'gru' => $txtDet_gr);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarTipoExamen() {
        $stmt = $this->objPdo->prepare("SELECT id_texam, descripcion, abreviatura  FROM tipo_examen");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    
       public function cboExamenSubir($id_grupo) {
        $stmt = $this->objPdo->prepare("SELECT * FROM examen where id_pub=1 and id_texam=2 and id_grupo=:id_grupo");
         $arraySelect = array('id_grupo' => $id_grupo);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

//     public function listarExamen($id_cap, $des_gr) {
//        $stmt = $this->objPdo->prepare("SELECT * FROM examen WHERE id_cap=:id_cap and desc_grupo=:des_gr");
//        $arraySelect = array('id_cap' => $id_cap, 'des_gr' => $des_gr);
//        $stmt->execute($arraySelect);
//        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
//        return $result;
//    }
}

?>
