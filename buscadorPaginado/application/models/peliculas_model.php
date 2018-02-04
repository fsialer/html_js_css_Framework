<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peliculas_model extends CI_Model {

    public function construct() {
        parent::__construct();
    }

    //obtenemos el total de filas para hacer la paginación del buscador
    function peliculas($buscador) {
        $this->db->like('autor', $buscador);
        $consulta = $this->db->get('posts');
        return $consulta->num_rows();
    }

    //obtenemos todos los posts a paginar con la función
    //total_posts_paginados pasando lo que buscamos, la cantidad por página y el segmento
    //como parámetros de la misma
    function total_posts_paginados($buscador, $por_pagina, $segmento) {
        $this->db->like('autor', $buscador);
        $consulta = $this->db->get('posts', $por_pagina, $segmento);
        if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $fila) {
            $data[] = $fila;
        }
            return $data;
        }
    }
}

/* application/models/peliculas_model
 * el modelo
 */