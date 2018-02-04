<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libro extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Libro_model');
		$this->load->model('Autor_model');
		$this->load->model('Editorial_model');
		$this->load->model('Tematica_model');
	}

	public function index(){
		if ($this->session->userdata('login')) {
			$pagina=10;
			$config=array('base_url'=>base_url().'libro/',
				'total_rows'=>$this->Libro_model->total_libros(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
			);
			$this->pagination->initialize($config);
			$result=$this->Libro_model->listado($config['per_page'],$this->uri->segment(2));
			$array_data=array('data_libros'=>$result);
			if ($result) {
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->load->view("libro/index",$array_data);
				$this->load->view('template/footer');
			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$this->session->set_flashdata('msg','NO HAY DATOS');
				$this->load->view("libro/index",$array_data);
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
					array('field'=>'cboTematica',
						  'label'=>'autor',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'LA TEMATICA ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UNA TEMATICA.')
						),	
					array('field'=>'cboAutor',
						  'label'=>'autor',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'EL AUTOR ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UN AUTOR.')
						),	
					array('field'=>'cboEditorial',
						  'label'=>'editorial',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'LA EDITORIAL ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UNA EDITORIAL.')
						),	
					array('field'=>'input_stock',
						  'label'=>'stock',
						  'rules'=>'required|numeric|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'EL STOCK ES REQUERIDO.',
							'numeric'=>'TIENE QUE SER UN NUMERO.',
							'is_natural_no_zero'=>'NO ES PERMITIDO INGRESAR 0')
						),
					array('field'=>'input_fp',
						  'label'=>'fecha de publicacion',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DE PUBLICACION ES REQUERIDO.')
						),
					array('field'=>'input_ubi',
						  'label'=>'ubicacion',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA UBICACION ES REQUERIDO.')
						),
					array('field'=>'estado',
						  'label'=>'estado',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'EL ESTADO ES REQUERIDO.')
						)
				);
				$this->form_validation->set_rules($array_rules);
				if ($this->form_validation->run()==true) {
					$form_data=array('id_tematica'=>$this->input->post('cboTematica'),'nombre'=>$this->input->post('input_nom'),'id_editorial'=>$this->input->post("cboEditorial"),'num_pag'=>$this->input->post('input_nump'),'stock'=>$this->input->post('input_stock'),'fecha_pub'=>$this->input->post('input_fp'),'ubicacion'=>$this->input->post('input_ubi'),'estado'=>$this->input->post('estado'));
					$this->Libro_model->insertar($form_data);
					$result4=$this->Libro_model->listar_mayor_id();
					$form_data2=array('id_libro'=>$result4->id,'id_autor'=>$this->input->post("cboAutor"));
					$this->Libro_model->insertar_libro_autor($form_data2);
					$this->session->set_flashdata('msg','El libro se agrego Exitosamente.');
					redirect(base_url().'libro');
				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$result=$this->Autor_model->lista_autores();
				$data_autores[0]='--SELECCION UN AUTOR--';				
				foreach ($result as $autores) {
					$data_autores[$autores->id]=$autores->nombres.' '.$autores->apellido_paterno.' '.$autores->apellido_materno;
				}
				$result2=$this->Editorial_model->lista_editoriales();
				$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
				foreach ($result2 as $editoriales) {
					$data_editoriales[$editoriales->id]=$editoriales->nombre;
				}
				
				$result3=$this->Tematica_model->lista_tematicas();
				$data_tematicas[0]='--SELECCION UNA TEMATICA--';
				foreach ($result3 as $tematicas) {
					$data_tematicas[$tematicas->id]=$tematicas->nombre;
				}
				$array_data=array('data_autores'=>$data_autores,'data_editoriales'=>$data_editoriales,'data_tematicas'=>$data_tematicas);
					$this->load->view('libro/agregar',$array_data);
					$this->load->view('template/footer');	
				}

			}else{
				$this->load->view('template/head');
				$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
				$result=$this->Autor_model->lista_autores();
				$data_autores[0]='--SELECCION UN AUTOR--';				
				foreach ($result as $autores) {
					$data_autores[$autores->id]=$autores->nombres.' '.$autores->apellido_paterno.' '.$autores->apellido_materno;
				}
				$result2=$this->Editorial_model->lista_editoriales();
				$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
				foreach ($result2 as $editoriales) {
					$data_editoriales[$editoriales->id]=$editoriales->nombre;
				}
				$result2=$this->Editorial_model->lista_editoriales();
				$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
				foreach ($result2 as $editoriales) {
					$data_editoriales[$editoriales->id]=$editoriales->nombre;
				}
				$result3=$this->Tematica_model->lista_tematicas();
				$data_tematicas[0]='--SELECCION UNA TEMATICA--';
				foreach ($result3 as $tematicas) {
					$data_tematicas[$tematicas->id]=$tematicas->nombre;
				}
				$array_data=array('data_autores'=>$data_autores,'data_editoriales'=>$data_editoriales,'data_tematicas'=>$data_tematicas);			
				$this->load->view('libro/agregar',$array_data);
				$this->load->view('template/footer');
			}
		}else{
			redirect(base_url());
		}	
	}

	public function editar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Libro_model->obtener_libro($id);
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
					array('field'=>'cboTematica',
						  'label'=>'autor',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'LA TEMATICA ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UNA TEMATICA.')
						),	
					array('field'=>'cboAutor',
						  'label'=>'autor',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'EL AUTOR ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UN AUTOR.')
						),	
					array('field'=>'cboEditorial',
						  'label'=>'editorial',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'LA EDITORIAL ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UNA EDITORIAL.')
						),	
					array('field'=>'input_stock',
						  'label'=>'stock',
						  'rules'=>'required|numeric|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'EL STOCK ES REQUERIDO.',
							'numeric'=>'TIENE QUE SER UN NUMERO.',
							'is_natural_no_zero'=>'NO ES PERMITIDO INGRESAR 0')
						),
					array('field'=>'input_fp',
						  'label'=>'fecha de publicacion',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA FECHA DE PUBLICACION ES REQUERIDO.')
						),
					array('field'=>'input_ubi',
						  'label'=>'ubicacion',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'LA UBICACION ES REQUERIDO.')
						),
					array('field'=>'estado',
						  'label'=>'estado',
						  'rules'=>'required',
						  'errors'=>array(
							'required'=>'EL ESTADO ES REQUERIDO.')
						)
					);
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$form_data=array('id_tematica'=>$this->input->post('cboTematica'),'nombre'=>$this->input->post('input_nom'),'id_editorial'=>$this->input->post("cboEditorial"),'num_pag'=>$this->input->post('input_nump'),'stock'=>$this->input->post('input_stock'),'fecha_pub'=>$this->input->post('input_fp'),'ubicacion'=>$this->input->post('input_ubi'),'estado'=>$this->input->post('estado'));
						$form_data2=array('id_autor'=>$this->input->post('cboAutor'));
						$this->Libro_model->actualizar($id,$form_data);
						$this->Libro_model->actualizar_libro_autor($id,$form_data2);
						$this->session->set_flashdata('msg','El Libro se editado Exitosamente.');
						redirect(base_url().'libro');	
					}else{
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
						$result2=$this->Autor_model->lista_autores();
						$data_autores[0]='--SELECCION UN AUTOR--';				
						foreach ($result2 as $autores) {
							$data_autores[$autores->id]=$autores->nombres.' '.$autores->apellido_paterno.' '.$autores->apellido_materno;
						}
						$result3=$this->Editorial_model->lista_editoriales();
						$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
						foreach ($result3 as $editoriales) {
							$data_editoriales[$editoriales->id]=$editoriales->nombre;
						}
						$result4=$this->Editorial_model->lista_editoriales();
						$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
						foreach ($result4 as $editoriales) {
							$data_editoriales[$editoriales->id]=$editoriales->nombre;
						}
						$result5=$this->Tematica_model->lista_tematicas();
						$data_tematicas[0]='--SELECCION UNA TEMATICA--';
						foreach ($result5 as $tematicas) {
							$data_tematicas[$tematicas->id]=$tematicas->nombre;
						}
						$array_data=array('data_autores'=>$data_autores,'data_editoriales'=>$data_editoriales,'data_tematicas'=>$data_tematicas,'data_libros'=>$result);			
						$this->load->view('libro/editar',$array_data);
						$this->load->view('template/footer');
						}

				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$result2=$this->Autor_model->lista_autores();
					$data_autores[0]='--SELECCION UN AUTOR--';				
					foreach ($result2 as $autores) {
						$data_autores[$autores->id]=$autores->nombres.' '.$autores->apellido_paterno.' '.$autores->apellido_materno;
					}
					$result3=$this->Editorial_model->lista_editoriales();
					$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
					foreach ($result3 as $editoriales) {
						$data_editoriales[$editoriales->id]=$editoriales->nombre;
					}
					$result4=$this->Editorial_model->lista_editoriales();
					$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
					foreach ($result4 as $editoriales) {
						$data_editoriales[$editoriales->id]=$editoriales->nombre;
					}
					$result5=$this->Tematica_model->lista_tematicas();
					$data_tematicas[0]='--SELECCION UNA TEMATICA--';
					foreach ($result5 as $tematicas) {
						$data_tematicas[$tematicas->id]=$tematicas->nombre;
					}
					$array_data=array('data_autores'=>$data_autores,'data_editoriales'=>$data_editoriales,'data_tematicas'=>$data_tematicas,'data_libros'=>$result);			
					$this->load->view('libro/editar',$array_data);
					$this->load->view('template/footer');
				}
				
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'libro');
			}
		}else{
			redirect(base_url());
		}
	}

	public function borrar(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$this->Libro_model->eliminar_libro_autor($id);
			$this->Libro_model->eliminar($id);			
			$this->session->set_flashdata('msg','El libro se borro exitosamente.');
			redirect(base_url().'libro');		
		}else{
			redirect(base_url());
		}
	}

	public function abastecer(){
		if ($this->session->userdata('login')) {
			$id=$this->uri->segment(3);
			$result=$this->Libro_model->obtener_libro($id);
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
					array('field'=>'cboTematica',
						  'label'=>'autor',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'LA TEMATICA ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UNA TEMATICA.')
						),	
					array('field'=>'cboAutor',
						  'label'=>'autor',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'EL AUTOR ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UN AUTOR.')
						),	
					array('field'=>'cboEditorial',
						  'label'=>'editorial',
						  'rules'=>'required|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'LA EDITORIAL ES REQUERIDO.',
							'is_natural_no_zero'=>'SELECCIONE UNA EDITORIAL.')
						),	
					array('field'=>'input_stock',
						  'label'=>'stock',
						  'rules'=>'required|numeric|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'EL STOCK ES REQUERIDO.',
							'numeric'=>'TIENE QUE SER UN NUMERO.',
							'is_natural_no_zero'=>'NO ES PERMITIDO INGRESAR 0')
						),				
					array('field'=>'input_ingreso',
						  'label'=>'ingreso',
						  'rules'=>'required|numeric|is_natural_no_zero',
						  'errors'=>array(
							'required'=>'EL INGRESO ES REQUERIDO.',
							'numeric'=>'TIENE QUE SER UN NUMERO.',
							'is_natural_no_zero'=>'NO ES PERMITIDO INGRESAR 0')
						)
					);
					$this->form_validation->set_rules($array_rules);
					if ($this->form_validation->run()==true) {
						$form_data=array('ingreso'=>$this->input->post('input_ingreso'));					
						$this->Libro_model->actualizar_stock($id,$form_data);	
						$form_data2=array('id_libro'=>$id,'cantidad'=>$this->input->post('input_ingreso'),'fecha_ingreso'=>$this->input->post('input_fabast'));
						$this->Libro_model->insertar_abastecer_libro($form_data2);					
						$this->session->set_flashdata('msg','El Libro se abastecio Exitosamente.');
						redirect(base_url().'libro');	
					}else{
						$this->load->view('template/head');
						$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
						$result2=$this->Autor_model->lista_autores();
						$data_autores[0]='--SELECCION UN AUTOR--';				
						foreach ($result2 as $autores) {
							$data_autores[$autores->id]=$autores->nombres.' '.$autores->apellido_paterno.' '.$autores->apellido_materno;
						}
						$result3=$this->Editorial_model->lista_editoriales();
						$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
						foreach ($result3 as $editoriales) {
							$data_editoriales[$editoriales->id]=$editoriales->nombre;
						}
						$result4=$this->Editorial_model->lista_editoriales();
						$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
						foreach ($result4 as $editoriales) {
							$data_editoriales[$editoriales->id]=$editoriales->nombre;
						}
						$result5=$this->Tematica_model->lista_tematicas();
						$data_tematicas[0]='--SELECCION UNA TEMATICA--';
						foreach ($result5 as $tematicas) {
							$data_tematicas[$tematicas->id]=$tematicas->nombre;
						}
						$array_data=array('data_autores'=>$data_autores,'data_editoriales'=>$data_editoriales,'data_tematicas'=>$data_tematicas,'data_libros'=>$result);			
						$this->load->view('libro/abastecer',$array_data);
						$this->load->view('template/footer');
						}

				}else{
					$this->load->view('template/head');
					$this->parser->parse('template/title',array('titulo'=>'BIBLIOTECA','opcion'=>'<a href="'.base_url().'usuario/logout">CERRAR SESION</a>'));
					$result2=$this->Autor_model->lista_autores();
					$data_autores[0]='--SELECCION UN AUTOR--';				
					foreach ($result2 as $autores) {
						$data_autores[$autores->id]=$autores->nombres.' '.$autores->apellido_paterno.' '.$autores->apellido_materno;
					}
					$result3=$this->Editorial_model->lista_editoriales();
					$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
					foreach ($result3 as $editoriales) {
						$data_editoriales[$editoriales->id]=$editoriales->nombre;
					}
					$result4=$this->Editorial_model->lista_editoriales();
					$data_editoriales[0]='--SELECCION UNA EDITORIAL--';
					foreach ($result4 as $editoriales) {
						$data_editoriales[$editoriales->id]=$editoriales->nombre;
					}
					$result5=$this->Tematica_model->lista_tematicas();
					$data_tematicas[0]='--SELECCION UNA TEMATICA--';
					foreach ($result5 as $tematicas) {
						$data_tematicas[$tematicas->id]=$tematicas->nombre;
					}
					$array_data=array('data_autores'=>$data_autores,'data_editoriales'=>$data_editoriales,'data_tematicas'=>$data_tematicas,'data_libros'=>$result);			
					$this->load->view('libro/abastecer',$array_data);
					$this->load->view('template/footer');
				}
				
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'libro');
			}
		}else{
			redirect(base_url());
		}
	}
}