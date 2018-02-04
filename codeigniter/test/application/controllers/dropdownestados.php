<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class dropdownEstados extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('dropdownEstados_model');

	}

	public function index(){		
		/*$pagina=3;
		$config=array('base_url'=>base_url().'dropdownestados/',
				'total_rows'=>$this->dropdownEstados_model->total_estados(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
				);
		$this->pagination->initialize($config);
		$result=$this->dropdownEstados_model->listar($config['per_page'],$this->uri->segment(2));
		
		$array_data=array('data_estados'=>$result);
		if ($result) {
			$this->load->view('dropdown/estados/index',$array_data);
		}else{
			$this->session->set_flashdata('msg','No hay Datos');
			$this->load->view('dropdown/estados/index',$array_data);
		}*/
		 $this->load->library('migration');

                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }
		
	}

	public function agregar(){

		$array_regiones=$this->dropdownEstados_model->listar_regiones();		
		$lista_regiones[0]='---SELECCIONA UNA REGION---';
		foreach ($array_regiones as $regiones) {
				$lista_regiones[$regiones->id]=$regiones->nombre;
		}
		$array_data=array('data_regiones'=>$lista_regiones);
		if ($this->input->post()) {
			$form_data=array('id_provincia'=>$this->input->post('cboProvincia'),'distrito'=>$this->input->post("input_distrito"),
				'estado'=>$this->input->post("estado"));
			$array_rules=array(
				array('field'=>'cboRegion',
						'label'=>'regiones',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
				array('field'=>'cboProvincia',
						'label'=>'provincias',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
				array('field'=>'input_distrito',
					'label'=>'distrito',
					'rules'=>'required|min_length[3]',
					'errors'=>array(
						'required'=>'El distrito es requerido.',
						'min_length'=>'El distrito tiene que tener mas de 3 caracteres.')
				),
			array('field'=>'estado',
				'label'=>'',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'Elija un estado'))
			);

			$this->form_validation->set_rules($array_rules);
			if ($this->form_validation->run()==true) {
				$result=$this->dropdownEstados_model->agregar($form_data);				
				if ($result) {
					$this->session->set_flashdata('msg','El estado se registro Exitosamente.');
					redirect(base_url().'dropdownestados');
				}else{
					$this->session->set_flashdata('msg','El estado no se registro Exitosamente.');
					redirect(base_url().'dropdownestados');
				}
			}else{
				$this->load->view('dropdown/estados/agregarview',$array_data);
			}
		}else{
			$this->load->view('dropdown/estados/agregarview',$array_data);
		}
	}
	public function editar(){
		$id=$this->uri->segment(3);
		$result=$this->dropdownEstados_model->obtener_estado($id);
		$array_regiones=$this->dropdownEstados_model->listar_regiones();	
		$lista_regiones[0]='---SELECCIONA UNA REGION---';
		foreach ($array_regiones as $regiones) {
				$lista_regiones[$regiones->id]=$regiones->nombre;
		}
		$array_data=array('data_estados'=>$result,'data_regiones'=>$lista_regiones);
		if ($this->input->post()) {
			$form_data=array('id_provincia'=>$this->input->post('cboProvincia'),'distrito'=>$this->input->post("input_distrito"),
				'estado'=>$this->input->post("estado"));
			$array_rules=array(
				array('field'=>'cboRegion',
						'label'=>'regiones',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
				array('field'=>'cboProvincia',
						'label'=>'provincias',
						'rules'=>'is_natural_no_zero',
						'errors'=>array(
							'is_natural_no_zero'=>'Seleccione una opcion valida.'
							)
						),
				array('field'=>'input_distrito',
					'label'=>'distrito',
					'rules'=>'required|min_length[3]',
					'errors'=>array(
						'required'=>'El distrito es requerido.',
						'min_length'=>'El distrito tiene que tener mas de 3 caracteres.')
				),
				array('field'=>'estado',
				'label'=>'',
				'rules'=>'required',
				'errors'=>array(
					'required'=>'Elija un estado'))
				);
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
				$result=$this->dropdownEstados_model->actualizar($id,$form_data);				
					if ($result) {
						$this->session->set_flashdata('msg','El estado se actualizo Exitosamente.');
						redirect(base_url().'dropdownestados');
					}else{
						$this->session->set_flashdata('msg','El estado no se actualizo Exitosamente.');
						redirect(base_url().'dropdownestados');
					}
				}else{
					$this->load->view('dropdown/estados/editarview',$array_data);
				}
				
		}else{
			if ($result) {				
				$this->load->view('dropdown/estados/editarview',$array_data);
			}else{
				redirect(base_url().'dropdownestados');
			}
		}
	}
	public function borrar(){
		$id=$this->uri->segment(3);
		$result=$this->dropdownEstados_model->eliminar($id);
		if ($result) {
			$this->session->set_flashdata('msg','El estado se borro exitosamente.');
				redirect(base_url().'dropdownestados');		
		}else{
			$this->session->set_flashdata('msg','El estado no se borro exitosamente.');
				redirect(base_url().'dropdownestados');		
		}
	}
	public function cargar_provincias(){
				
		if ($this->input->post('cboRegion')) {
			$result=$this->dropdownEstados_model->listar_provincias($this->input->post('cboRegion'));
			?>
			<option value='0' <?php echo set_value('cboProvincia');?>>---SELECCIONA UNA PROVINCIA---</option>
			<?php foreach ($result as $provincia) {?>
				<option value="<?php echo $provincia->id;?>" <?php echo set_value('cboProvincia');?> ><?php echo $provincia->provincia;?></option>
			<?php }
		}else{?>
			<option value='0' <?php echo set_value('cboProvincia');?>>---SELECCIONA UNA PROVINCIA---</option>
		<?php }
	}
}