<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peliculas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('peliculas_model');
    }

    //con esta función validamos y protegemos el buscador
    public function validar() {
        $this->form_validation->set_rules('buscando', 'buscador', 'required|min_length[2]|max_length[20]|trim|xss_clean');
        $this->form_validation->set_message('required', 'El %s no puede ir vacío!');
        $this->form_validation->set_message('min_length', 'El %s debe tener al menos %s carácteres');
        $this->form_validation->set_message('max_length', 'El %s no puede tener más de %s carácteres');
        if ($this->form_validation->run() == TRUE) {

            $buscador = $this->input->post('buscando');
            $this->session->set_userdata('buscando', $buscador);
            redirect('../peliculas', 'refresh');
        } else {

            $this->load->view('buscador_view'); //display search form
        }
    }

    function index() {
        $buscador = $this->session->userdata('buscando');
        $pages = 2; //Número de registros mostrados por páginas
        $this->load->library('pagination'); //Cargamos la librería de paginación
        $config['base_url'] = base_url() . 'peliculas/pagina'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->peliculas_model->peliculas($buscador); //calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 20; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera'; //primer link
        $config['last_link'] = 'Última'; //último link
        $config['next_link'] = 'Siguiente'; //siguiente link
        $config['prev_link'] = 'Anterior'; //anterior link
        $config['full_tag_open'] = '<div id="paginacion">'; //el div que debemos maquetar si queremos
        $config['full_tag_close'] = '</div>'; //el cierre del div de la paginación
        $this->pagination->initialize($config); //inicializamos la paginación
        //el array con los datos a paginar ya preparados
        $data["peliculas"] = $this->peliculas_model->total_posts_paginados($buscador, $config['per_page'], $this->uri->segment(3));

        //cargamos la vista y el array data
        $this->load->view('peliculas_view', $data);
    }
}
/*application/controllers/peliculas.php
 * el controlador
 */