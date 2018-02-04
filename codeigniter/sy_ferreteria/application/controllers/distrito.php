<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distrito extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->helper('menu');
		$this->load->model('Departamento_model');
		$this->load->model('Distrito_model');
		$this->load->model('Provincia_model');
	}

	public function index(){
		if ($this->session->userdata('sesion')) {
			$pagina=8;
			$config=array('base_url'=>base_url().'provincia/',
				'total_rows'=>$this->Distrito_model->total_distritos(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
				);
			$this->pagination->initialize($config);
			$result=$this->Distrito_model->listado_distrito($config['per_page'],$this->uri->segment(2));	
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					)
			,'data_distrito'=>$result);
			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$this->load->view('distrito/index',$array_data);
			$this->load->view('templates/footer');
		}else{
			redirect(base_url());
		}
	}

	public function agregar(){
		if ($this->session->userdata('sesion')) {
			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$array_departamento=$this->Departamento_model->listar_departamentos();
			$lista_departamento[0]='---SELECCIONE UN DEPARTAMENTO---';
			foreach ($array_departamento as $departamento) {
				$lista_departamento[$departamento->id]=$departamento->nombre;
			}
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					),
				'data_departamento'=>$lista_departamento
			);
			$array_rules=array(
					array('field'=>'cboDepartamento',
						'label'=>'departamento',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
					array('field'=>'cboProvincia',
						'label'=>'provincia',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
					array('field'=>'input_distrito',
						  'label'=>'provincia',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE DEL DISTRITO ES REQUERIDO.',
							'min_length'=>'EL DISTRITO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('file'=>'radio_estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>'Elija un Estado.')
						)
			);
			$array_form=array('id_provincia'=>$this->input->post('cboProvincia'),
						'nombre'=>$this->input->post('input_distrito'),
						'estado'=>$this->input->post('radio_estado'));
			if ($this->input->post()) {
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$this->Distrito_model->agregar_distrito($array_form);
					redirect(base_url().'distrito');
				}else{
					$this->load->view('distrito/agregar',$array_data);	
				}
			}else{
				$this->load->view('distrito/agregar',$array_data);
			}
			
			$this->load->view('templates/footer');
		}else{
			redirect(base_url());
		}
	}

	public function editar(){
		if ($this->session->userdata('sesion')) {
			$this->load->view('templates/header');
			$this->load->view('templates/title',$this->session->userdata('sesion'));
			$id=$this->uri->segment(3);
			$result=$this->Distrito_model->obtener_distrito($id);
			$array_departamento=$this->Departamento_model->listar_departamentos();
			$lista_departamento[0]='---SELECCIONE UN DEPARTAMENTO---';
			foreach ($array_departamento as $departamento) {
				$lista_departamento[$departamento->id]=$departamento->nombre;
			}
			$array_data=array('mi_menu'=>
				array(
					array('opcion'=>'INICIO','url'=>base_url()),
					array('opcion'=>'MANTENIMIENTO','subopcion'=>array(
						array('opcion'=>'DEPARTAMENTO','url'=>base_url().'departamento'),
						array('opcion'=>'PROVINCIA','url'=>base_url().'provincia'),
						array('opcion'=>'DISTRITO','url'=>base_url().'distrito')
						))
					),
				'data_departamento'=>$lista_departamento,
				'data_distrito'=>$result
			);
			$array_rules=array(
					array('field'=>'cboDepartamento',
						'label'=>'departamento',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
					array('field'=>'cboProvincia',
						'label'=>'provincia',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
					array('field'=>'input_distrito',
						  'label'=>'provincia',
						  'rules'=>'required|min_length[3]',
						  'errors'=>array(
							'required'=>'EL NOMBRE DEL DISTRITO ES REQUERIDO.',
							'min_length'=>'EL DISTRITO TIENE QUE SER MAYOR DE 3 CARACTERES.')
						),
					array('file'=>'radio_estado',
						'label'=>'estado',
						'rules'=>'required',
						'errors'=>array(
							'required'=>'Elija un Estado.')
						)
			);
			$array_form=array('id_provincia'=>$this->input->post('cboProvincia'),
						'nombre'=>$this->input->post('input_distrito'),
						'estado'=>$this->input->post('radio_estado'));
			if ($this->input->post()) {
				# code...
			}else{
				$this->load->view('distrito/editar',$array_data);
			}

		}else{
			redirect(base_url());
		}
	}

	public function cargar_provincias(){
		$options="";
		var_dump($this->input->post('cboDepartamento')) ;
		if ($this->input->post('cboDepartamento')) {
			$result=$this->Provincia_model->listar_provincias($this->input->post('cboDepartamento'));
			?>
			<option value='0' <?php echo set_value('cboProvincia');?>>---SELECCIONA UNA PROVINCIA---</option>
			<?php foreach ($result as $provincia) {?>
				<option value="<?php echo $provincia->id;?>" <?php echo set_value('cboProvincia');?>><?php echo $provincia->nombre;?></option>
			<?php }
		}
	}
}