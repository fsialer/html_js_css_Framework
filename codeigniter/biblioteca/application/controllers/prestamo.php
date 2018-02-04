<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Usuario_model');
		$this->load->model('Libro_model');
		$this->load->model('Prestamo_model');
		
	}

	public function index(){
		if ($this->session->userdata('login')) {
			$pagina=10;
			$config=array('base_url'=>base_url().'prestamo/',
				'total_rows'=>$this->Prestamo_model->total_prestamos(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$result=$this->Prestamo_model->listado($config['per_page'],$this->uri->segment(2));
			$array_data=array('data_prestamos'=>$result);
			if ($result) {
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view("prestamo/index",$array_data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->session->set_flashdata('msg','NO HAY DATOS');
				$this->load->view("prestamo/index",$array_data);
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}
	}

	public function resumen(){	
		if ($this->input->post('id_libros')) {			
			foreach ($this->input->post('id_libros') as $value) {
				$result=$this->Libro_model->obtener_libro($value);				
				$data[]=$result;
			}
			$this->session->set_userdata('det_res',$data);					
			$this->load->view('template/head');
			$this->parser->parse('template/title',
					array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/login">INGRESAR A SISTEMA</a>'));
			$array_data=array('data_libros'=>$this->session->userdata('det_res'));
			$this->load->view("prestamo/resumen",$array_data);
			$this->load->view('template/footer');
		}else{
			redirect(base_url());		
		}
		
	}

	public function login_lect(){
		if (!$this->session->userdata('login')) {
			if ($this->input->post()){
				$form_data=array('username'=>$this->input->post('us'),'pwd'=>do_hash($this->input->post('pass'),'md5'));
				$data_lector=$this->Usuario_model->login_lector($form_data);
				if ($data_lector) {
					$this->session->set_userdata('id_lector',$data_lector->id_lector);
					echo "<div class='panel-heading'>";
					echo "<span>DATOS PERSONALES</span>";
					echo "</div>";
					echo "<div class='panel-body'>";
					echo "<div  class='form-group'>";
					echo form_label('Nombres');
					echo form_input(array('name'=>'input_persona','id'=>'input_persona','readOnly'=>'true','class'=>'form-control','value'=>$data_lector->nombres));
					echo "</div>";
					echo "<div  class='form-group'>";
					echo form_label('APELLIDOS');
					echo form_input(array('name'=>'input_persona','id'=>'input_persona','readOnly'=>'true','class'=>'form-control','value'=>$data_lector->apellido_paterno.' '.$data_lector->apellido_materno));
					echo "</div>";	
					echo form_input(array('name'=>'input_fprest','type'=>'date','id'=>'input_fprest','readOnly'=>'true','class'=>'form-control','value'=>date('Y-m-d')));
					echo "</div>";
									
					echo form_submit('btnSolicitar','SOLICITAR',array('class'=>'form-control btn btn-success'));
					echo "<a href='".base_url()."' class='form-control btn btn-default'>CANCELAR</a>";					
					echo "</div>";										
				}else{
					echo 'NO EXISTE EL USUARIO.';
				}
			}else{
				redirect(base_url());
			}
		}else{
			redirect(base_url());
		}
		
	}

	public function agregar(){
		if ($this->session->userdata('id_lector')) {
			$cont=0;
			$i=0;
			foreach ($this->session->userdata('det_res') as $detalle) {
				$result=$this->Prestamo_model->verificar_prestamo(array('id_lector'=>$this->session->userdata('id_lector'),'id_libro'=>$detalle->id));
				if ($result) {
					$cont++;
				}
			}
			if ($cont>0) {
				redirect(base_url());
			}else{
				foreach ($this->session->userdata('det_res') as $detalle) {
					$form_data=array('id_lector'=>$this->session->userdata('id_lector'),'id_libro'=>$detalle->id,'sitio'=>$this->input->post('cboSitio')[$i],'fecha_prestamo'=>$this->input->post('input_fprest'),'estado'=>'DEUDA');
					$this->Prestamo_model->insertar($form_data);
					$this->Libro_model->disminuir_libro($detalle->id);	
					$i++;				
				}
			}		
			$this->session->set_flashdata('msg','POR FAVOR ASERQUECE A LA VENTANILLA PARA RECOGER SUS LIBROS.');
			redirect(base_url());
		}else{
			redirect(base_url());
		}
		
	}

	public function devolver(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Prestamo_model->obtener_prestamo($id);
			$this->Prestamo_model->actualizar_estado($id,array('estado'=>'RECIBIDO'));
			$this->Libro_model->aumentar_libro($result->id_libro);
			$this->session->set_flashdata('msg','EL LIBRO DE DEVOLVIO EXITOSAMENTE.');
			redirect(base_url().'prestamo');
		}else{
			redirect(base_url());
		}
	}


	public function ver(){
		$id=$this->uri->segment(3);		
		$result=$this->Prestamo_model->detalle_prestamo($id);		
		if ($result) {
			$this->load->view('template/head');
			$this->parser->parse('template/title',
					array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/login">INGRESAR A SISTEMA</a>'));
			$array_data=array('data_prestamo'=>$result);
			$this->load->view("prestamo/ver",$array_data);
			$this->load->view('template/footer');			
		}else{			
			$this->load->view('template/head');
			$this->parser->parse('template/title',
					array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/login">INGRESAR A SISTEMA</a>'));
			$array_data=array('data_prestamo'=>$result);
			$this->session->set_flashdata('msg','Este libro no ah tenido prestamos.');
			$this->load->view("prestamo/ver",$array_data);
			$this->load->view('template/footer');
		}
	}
	

	

	
}