<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of capacitacion
 *
 * @author Fernando
 */
class capacitacion {

    private $id_cap;
    private $nom_cap;
    private $lugar_cap;
    private $fechaini_cap;
    private $fechafin_cap;
    private $descrip_cap;
    private $id_user;
    private $id_pub;

    function __construct($nom_cap, $lugar_cap, $fechaini_cap, $fechafin_cap, $descrip_cap, $id_user, $id_pub, $id_cap = null) {
        $this->id_cap = $id_cap;
        $this->nom_cap = $nom_cap;
        $this->lugar_cap = $lugar_cap;
        $this->fechaini_cap = $fechaini_cap;
        $this->fechafin_cap = $fechafin_cap;
        $this->descrip_cap = $descrip_cap;
        $this->id_user = $id_user;
        $this->id_pub = $id_pub;
        $this->objPdo = new PDO("pgsql:host=localhost user=postgres password=postgres dbname=bdaula");
        $this->objPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getId_pub() {
        return $this->id_pub;
    }

    public function setId_pub($id_pub) {
        $this->id_pub = $id_pub;
    }

    public function getId_cap() {
        return $this->id_cap;
    }

    public function getNom_cap() {
        return $this->nom_cap;
    }

    public function getLugar_cap() {
        return $this->lugar_cap;
    }

    public function getFechaini_cap() {
        return $this->fechaini_cap;
    }

    public function getFechafin_cap() {
        return $this->fechafin_cap;
    }

    public function getDescrip_cap() {
        return $this->descrip_cap;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function setId_cap($id_cap) {
        $this->id_cap = $id_cap;
    }

    public function setNom_cap($nom_cap) {
        $this->nom_cap = $nom_cap;
    }

    public function setLugar_cap($lugar_cap) {
        $this->lugar_cap = $lugar_cap;
    }

    public function setFechaini_cap($fechaini_cap) {
        $this->fechaini_cap = $fechaini_cap;
    }

    public function setFechafin_cap($fechafin_cap) {
        $this->fechafin_cap = $fechafin_cap;
    }

    public function setDescrip_cap($descrip_cap) {
        $this->descrip_cap = $descrip_cap;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function guardar() {
        if ($this->id_cap) {
            $stmt = $this->objPdo->prepare("UPDATE capacitacion set nom_cap=:nom_cap,
                lugar_cap=:lugar_cap,
                fechaini_cap=:fechaini_cap,
                fechafin_cap=:fechafin_cap,
                descrip_cap=:descrip_cap,
                id_user=:id_user
                              
                WHERE id_cap=:id_cap");
            $arrayUpdate = array('nom_cap' => $this->nom_cap,
                'lugar_cap' => $this->lugar_cap,
                'fechaini_cap' => $this->fechaini_cap,
                'fechafin_cap' => $this->fechafin_cap,
                'descrip_cap' => $this->descrip_cap,
                'id_user' => $this->id_user,
                'id_cap' => $this->id_cap);
            $result = $stmt->execute($arrayUpdate);
        } else {
            $stmt = $this->objPdo->prepare("INSERT INTO capacitacion (nom_cap,lugar_cap,fechaini_cap,fechafin_cap,descrip_cap,id_user,id_pub)"
                    . " VALUES (:nom_cap,:lugar_cap,:fechaini_cap,:fechafin_cap,:descrip_cap,:id_user,:id_pub)");
            $arrayInsert = array('nom_cap' => $this->nom_cap,
                'lugar_cap' => $this->lugar_cap,
                'fechaini_cap' => $this->fechaini_cap,
                'fechafin_cap' => $this->fechafin_cap,
                'descrip_cap' => $this->descrip_cap,
                'id_user' => $this->id_user,
                'id_pub' => $this->id_pub
            );
            $result = $stmt->execute($arrayInsert);
        }
        return $result;
    }

    //falta ver 
    public function listar() {
        $stmt = $this->objPdo->prepare("SELECT id_cap, nom_cap, lugar_cap, fechaini_cap, fechafin_cap, descrip_cap, 
       datos_user.nom_user,datos_user.ape_user
  FROM capacitacion inner join publicar on capacitacion.id_pub=publicar.id_pub
  inner join datos_user on capacitacion.id_user=datos_user.id_user
  where publicar.id_pub=1 and fechaini_cap between current_date and fechaini_cap");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listar2() {
        $stmt = $this->objPdo->prepare("SELECT id_cap, nom_cap, lugar_cap, fechaini_cap, fechafin_cap, descrip_cap, 
       datos_user.nom_user,datos_user.ape_user
  FROM capacitacion inner join publicar on capacitacion.id_pub=publicar.id_pub
  inner join datos_user on capacitacion.id_user=datos_user.id_user
  where publicar.id_pub=2");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function cantidad() {
        $stmt = $this->objPdo->prepare("select count(*) from capacitacion");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarDatos() {
        $stmt = $this->objPdo->prepare("select id_cap,nom_cap,lugar_cap,fechaini_cap,fechafin_cap,descrip_cap,datos_user.id_user,datos_user.nom_user,datos_user.ape_user from capacitacion
            inner join publicar on capacitacion.id_pub=publicar.id_pub
inner join datos_user on (capacitacion.id_user=datos_user.id_user) where publicar.id_pub=2 ORDER BY id_cap asc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function listarDatos2() {
        $stmt = $this->objPdo->prepare("select id_cap,nom_cap,lugar_cap,fechaini_cap,fechafin_cap,descrip_cap,datos_user.id_user from capacitacion
            inner join publicar on capacitacion.id_pub=publicar.id_pub
inner join datos_user on (capacitacion.id_user=datos_user.id_user) where publicar.id_pub=1 ORDER BY id_cap asc");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function eliminar($id) {
        $stmt = $this->objPdo->prepare("DELETE FROM capacitacion WHERE id_cap=:id");
        $arrayDelete = array('id' => $id);
        $result = $stmt->execute($arrayDelete);
        return $result;
    }

    public function listarCapDoc($id) {
        $stmt = $this->objPdo->prepare("SELECT id_grupo, capacitacion.nom_cap,grupo.descp_grupo
  FROM grupo inner join capacitacion on grupo.id_cap=capacitacion.id_cap
  inner join datos_user on capacitacion.id_user=datos_user.id_user
  where datos_user.dni_user=:id and fechafin_cap between current_date and fechafin_cap order by id_grupo");
        $arraySelect = array('id' => $id);
        $stmt->execute($arraySelect);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function publicarCap() {
        $stmt = $this->objPdo->prepare("UPDATE capacitacion set id_pub=:id_pub                        
                WHERE id_cap=:id_cap");
        $arrayUpdate = array(
            'id_pub' => $this->id_pub,
            'id_cap' => $this->id_cap);
        $result = $stmt->execute($arrayUpdate);
        return $result;
    }



}
