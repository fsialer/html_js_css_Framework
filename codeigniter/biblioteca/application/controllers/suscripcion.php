<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suscripcion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Suscripcion_model');
		$this->load->model('Lector_model');
	}

	public function index(){
		if ($this->session->userdata('login')) {
			
			$pagina=10;
			$config=array('base_url'=>base_url().'suscripcion/',
				'total_rows'=>$this->Suscripcion_model->total_suscripciones(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$result=$this->Suscripcion_model->listado($config['per_page'],$this->uri->segment(2));
			$array_data=array('data_suscripciones'=>$result);
			if ($result) {
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view("suscripcion/index",$array_data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->session->set_flashdata('msg','NO HAY DATOS');
				$this->load->view("suscripcion/index",$array_data);
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
					
					array('field'=>'input_id_per',
						  'label'=>'identificador',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'is_natural_no_zero'=>'NO EXISTE EL IDENTIFICADOR.',
							'required'=>'LA PERSONA ES REQUERIDA.'
							)
						),	
					array('field'=>'input_fi',
						  'label'=>'fecha de inicio',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DE INICIO DE LA SUSCRIPCION ES REQUERIDO.'
							)
						),	
					array('field'=>'input_ff',
						  'label'=>'fecha fin',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DEL FIN DE LA SUSCRIPCION ES REQUERIDO.')
						)
				);
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$form_data=array('id_persona'=>$this->input->post('input_id_per'),'fecha_ini'=>$this->input->post('input_fi'),'fecha_fin'=>$this->input->post('input_ff'));
					$id=$this->input->post('input_id_per');
					$form_data2=array('estado'=>'ACTIVO');
					$result=$this->Suscripcion_model->insertar($form_data);
					if ($result==true) {
						$result=$this->Lector_model->actualizar($id,$form_data2);
						if ($result==true) {
							$this->session->set_flashdata('msg','La suscripcion fue un exito.');
							redirect(base_url().'suscripcion');
						}else{
							$this->session->set_flashdata('msg','La suscripcion se logro pero no se pudo modificar el estado.');
							redirect(base_url().'suscripcion');
						}
					}else{
						$this->session->set_flashdata('msg','La suscripcion se no logro exitosamente.');
							redirect(base_url().'suscripcion');
					}
				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$result=$this->Lector_model->buscar_persona("");
					if (!$result) {
						$this->session->set_flashdata('msg2','NO EXISTEN DATOS DE LAS PERSONAS.');
					}				
					$array_data=array('data_personas'=>$result);
					$this->load->view('suscripcion/agregar',$array_data);
					$this->load->view('template/footer');
				}

			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$result=$this->Lector_model->buscar_persona("");				
				if (!$result) {
					$this->session->set_flashdata('msg2','NO EXISTEN DATOS DE LAS PERSONAS.');
				}				
				$array_data=array('data_personas'=>$result);
				$this->load->view('suscripcion/agregar',$array_data);
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	public function editar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Suscripcion_model->obtener_suscripcion($id);	
			if ($result) {
				if ($this->input->post()) {
					$array_rules=array(
					
					array('field'=>'input_id_per',
						  'label'=>'identificador',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'is_natural_no_zero'=>'NO EXISTE EL IDENTIFICADOR.',
							'required'=>'LA PERSONA ES REQUERIDA.'
							)
						),	
					array('field'=>'input_fi',
						  'label'=>'fecha de inicio',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DE INICIO DE LA SUSCRIPCION ES REQUERIDO.'
							)
						),	
					array('field'=>'input_ff',
						  'label'=>'fecha fin',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DEL FIN DE LA SUSCRIPCION ES REQUERIDO.')
						)
					);
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$form_data=array('id_persona'=>$this->input->post('input_id_per'),'fecha_ini'=>$this->input->post('input_fi'),'fecha_fin'=>$this->input->post('input_ff'));
						$this->Suscripcion_model->actualizar($id,$form_data);
						$this->session->set_flashdata('msg','La suscripcion fue edito Exitosamente.');
						redirect(base_url().'suscripcion');	
					}else{
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));	
						$array_data=array('data_suscripciones'=>$result);				
						$this->load->view('suscripcion/editar',$array_data);
						$this->load->view('template/footer');
					}

				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));	
					$array_data=array('data_suscripciones'=>$result);				
					$this->load->view('suscripcion/editar',$array_data);
					$this->load->view('template/footer');
				}
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'suscripcion');
			}			
		}else{
			redirect(base_url());
		}
	}

	public function borrar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Suscripcion_model->obtener_suscripcion($id);	
			if ($result) {
				$id_persona=$result->id_persona;
				$form_data2=array('estado'=>'INACTIVO');
				$this->Suscripcion_model->eliminar($id);
				$result=$this->Lector_model->actualizar($id_persona,$form_data2);
				$this->session->set_flashdata('msg','La suscripcion se borro exitosamente.');
				redirect(base_url().'suscripcion');
			}else{
				redirect(base_url().'suscripcion');
			}
		}else{
			redirect(base_url());
		}
	}

	public function filtrar_persona(){
		if ($this->session->userdata('login')) {				
				$per=$this->input->post('per');				
				$result=$this->Lector_model->buscar_persona($per);				
				if ($result) {
					foreach ($result as $personas) {
					echo '<tr>';
					echo '<td>'.$personas->datos.'</td>';
					echo '<td>';
					echo '<button onclick="enviarPersona('.$personas->id.','."'$personas->datos'".')" id="btnAgregarPer'.$personas->id.'" class="btn btn-default">AGREGAR</button>';
					echo '</td>';
					echo '</tr>';						
				 	}
				}else{
					echo '<span>NO SE HAN ENCONTRADO RESULTADOS PARA: <strong>'.$per.'</strong></span>';
				}			
		}else{
			redirect(base_url());
		}
	}
}