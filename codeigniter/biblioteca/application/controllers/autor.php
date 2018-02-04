<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autor extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Autor_model');
		$this->load->model('Nacionalidad_model');
	}

	public function index(){
		if ($this->session->userdata('login')) {
			$pagina=10;
			$config=array('base_url'=>base_url().'autor/',
				'total_rows'=>$this->Autor_model->total_autores(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$result=$this->Autor_model->listado($config['per_page'],$this->uri->segment(2));
			$array_data=array('data_autores'=>$result);
			if ($result) {
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view("autor/index",$array_data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->session->set_flashdata('msg','NO HAY DATOS');
				$this->load->view("autor/index",$array_data);
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	public function agregar(){
		if ($this->session->userdata('login')) {
			if ($this->input->post()) {
				$array_rules=array(
					array('field'=>'input_nom',
						  'label'=>'nombres',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE ES REQUERIDO.',
							'min_length'=>'EL NOMBRE TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_ap',
						  'label'=>'apellido paterno',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL APELLIDO PATERNO ES REQUERIDO.',
							'min_length'=>'EL APELLIDO PATERNO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_am',
						  'label'=>'apellido paterno',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL APELLIDO MATERNO ES REQUERIDO.',
							'min_length'=>'EL APELLIDO MATERNO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'cboNacionalidad',
						  'label'=>'pais',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'LA NACIONDALIDAD ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UNA NACIONALIDAD.')
						)
				);
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$form_data=array('nombres'=>$this->input->post('input_nom'),'apellido_paterno'=>$this->input->post('input_ap'),'apellido_materno'=>$this->input->post('input_am'),'id_nacion'=>$this->input->post('cboNacionalidad'));
					$this->Autor_model->insertar($form_data);
					$this->session->set_flashdata('msg','El autor se agrego Exitosamente.');
					redirect(base_url().'autor');
				}else{
					$result=$this->Nacionalidad_model->lista_nacion();
					$data_nacionalidades[0]='--SELECCION UN NACIONALIDAD--';				
					foreach ($result as $paises) {
						$data_nacionalidades[$paises->id]=$paises->nombre;
					}
					$array_data=array('data_nacionalidades'=>$data_nacionalidades);
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$this->load->view('autor/agregar',$array_data);
					$this->load->view('template/footer');	
				}
			}else{
				$result=$this->Nacionalidad_model->lista_nacion();
				$data_nacionalidades[0]='--SELECCION UN NACIONALIDAD--';				
				foreach ($result as $paises) {
					$data_nacionalidades[$paises->id]=$paises->nombre;
				}
				$array_data=array('data_nacionalidades'=>$data_nacionalidades);
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view('autor/agregar',$array_data);
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	public function editar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Autor_model->obtener_autor($id);	
			if ($result) {
				if ($this->input->post()) {
					$array_rules=array(
					array('field'=>'input_nom',
						  'label'=>'nombres',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE ES REQUERIDO.',
							'min_length'=>'EL NOMBRE TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_ap',
						  'label'=>'apellido paterno',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL APELLIDO PATERNO ES REQUERIDO.',
							'min_length'=>'EL APELLIDO PATERNO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),	
					array('field'=>'input_am',
						  'label'=>'apellido paterno',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL APELLIDO MATERNO ES REQUERIDO.',
							'min_length'=>'EL APELLIDO MATERNO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('field'=>'cboNacionalidad',
						  'label'=>'pais',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'LA NACIONDALIDAD ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UNA NACIONALIDAD.')
						)
					);
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$form_data=array('nombres'=>$this->input->post('input_nom'),'apellido_paterno'=>$this->input->post('input_ap'),'apellido_materno'=>$this->input->post('input_am'),'id_nacion'=>$this->input->post('cboNacionalidad'));
						$this->Autor_model->actualizar($id,$form_data);
						$this->session->set_flashdata('msg','El autor se edito Exitosamente.');
						redirect(base_url().'autor');
					}else{
						$result2=$this->Nacionalidad_model->lista_nacion();
						$data_nacionalidades[0]='--SELECCION UN NACIONALIDAD--';				
						foreach ($result2 as $paises) {
							$data_nacionalidades[$paises->id]=$paises->nombre;
						}					
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));	 
						$array_data=array('data_autor'=>$result,'data_nacionalidades'=>$data_nacionalidades);		
						$this->load->view('autor/editar',$array_data);
						$this->load->view('template/footer');	
					}

				}else{
					$result2=$this->Nacionalidad_model->lista_nacion();
					$data_nacionalidades[0]='--SELECCION UN NACIONALIDAD--';				
					foreach ($result2 as $paises) {
						$data_nacionalidades[$paises->id]=$paises->nombre;
					}					
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));						
					$array_data=array('data_autor'=>$result,'data_nacionalidades'=>$data_nacionalidades);		
					$this->load->view('autor/editar',$array_data);
					$this->load->view('template/footer');
				}
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'autor');
			}
		}else{
			redirect(base_url());
		}
	}

	public function borrar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Autor_model->eliminar($id);
			$this->session->set_flashdata('msg','El autor se borro exitosamente.');
			redirect(base_url().'autor');			
		}else{
			redirect(base_url());
		}		
	}
}