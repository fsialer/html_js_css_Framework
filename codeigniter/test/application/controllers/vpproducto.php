<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class vpProducto extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('vpProducto_model');
		
	}

	public function index(){
		
		$pagina=3;
		$config=array('base_url'=>base_url().'vpproducto/',
				'total_rows'=>$this->vpProducto_model->total_productos(), 'per_page'=>$pagina,'uri_segment'=>2,'cur_tag_open'=>'<li class="active"><a href="#">','cur_tag_close'=>'</a></li>','num_tag_open'=>'<li>','num_tag_close'=>'</li>','last_link'=>FALSE,'first_link'=>FALSE,'next_link'=>'&raquo;','next_tag_open'=>'<li>','next_tag_close'=>'</li>','prev_link'=>'&laquo;','prev_tag_open'=>'<li>','prev_tag_close'=>'</li>'
				);
		$this->pagination->initialize($config);
		$result=$this->vpProducto_model->listar($config['per_page'],$this->uri->segment(2));
		$array_data=array("mi_menu"=>array(array('opcion'=>'Ventas','url'=>base_url().'vpventa')),
			"data_productos"=>$result);
		$this->load->helper('navegador');
		$this->load->view("venta_producto/template/header");	
		if ($result) {
			$this->load->view("venta_producto/producto/index",$array_data);
		}else{
			$this->session->set_flashdata('msg','No hay Datos.');
			$this->load->view("venta_producto/producto/index",$array_data);
		}
		$this->load->view("venta_producto/template/footer");
	}

	public function agregar(){
		$this->load->helper('navegador');
		$this->load->view("venta_producto/template/header");
		$array_data=array("mi_menu"=>array(array('opcion'=>'Ventas','url'=>base_url().'vpventa')));
		if ($this->input->post()) {
			
			$rules=array(
				array('field'=>'input_articulo',
					'label'=>'Articulo',
					'rules'=>'required|min_length[3]',
					'errors'=>array(
						'required'=>'El articulo es requerido',
						'min_length'=>'El arituclo tiene que tener mas de 3 caracteres.')),
				array('field'=>'estado',
					'label'=>'estado',
					'rules'=>'required',
					'errors'=>array(
						'required'=>'El estado es requerido.')),
				array('field'=>'input_precio',
					'label'=>'precio',
					'rules'=>'required|decimal',
					'errors'=>array(
						'required'=>'El precio es requerido.',
						'decimal'=>'El precio tiene que ser decimal.'))
				);
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()===true) {
				$array_form=array('articulo'=>$this->input->post('input_articulo'),'estado'=>$this->input->post('estado'),'precio'=>$this->input->post('input_precio'));
				$this->vpProducto_model->agregar($array_form);
				$this->session->set_flashdata('msg','Producto guardado con exito.');
				redirect(base_url().'vpproducto');
			}else{				
				$this->load->view("venta_producto/producto/agregar",$array_data);
			}
		}else{
			$this->load->view("venta_producto/producto/agregar",$array_data);
		}
		$this->load->view("venta_producto/template/footer");
	}

	public function editar(){
		
		$id=$this->uri->segment(3);
		$result=$this->vpProducto_model->obtener_producto($id);
		$array_data=array("mi_menu"=>array(array('opcion'=>'Ventas','url'=>base_url().'vpventa')),'data_producto'=>$result);		
		$this->load->view("venta_producto/template/header");		
		$this->load->helper('navegador');
		if ($this->input->post()) {
			$rules=array(
				array('field'=>'input_articulo',
					'label'=>'Articulo',
					'rules'=>'required|min_length[3]',
					'errors'=>array(
						'required'=>'El articulo es requerido',
						'min_length'=>'El arituclo tiene que tener mas de 3 caracteres.')),
				array('field'=>'estado',
					'label'=>'estado',
					'rules'=>'required',
					'errors'=>array(
						'required'=>'El estado es requerido.')),
				array('field'=>'input_precio',
					'label'=>'precio',
					'rules'=>'required|decimal',
					'errors'=>array(
						'required'=>'El precio es requerido.',
						'decimal'=>'El precio tiene que ser decimal.'))
				);
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()===true) {
				$array_form=array('articulo'=>$this->input->post('input_articulo'),'estado'=>$this->input->post('estado'),'precio'=>$this->input->post('input_precio'));
				$result=$this->vpProducto_model->actualizar($id,$array_form);
				if ($result) {
					$this->session->set_flashdata('msg','Producto actualizo con exito.');
					redirect(base_url().'vpproducto');
				}else{
					$this->session->set_flashdata('msg','Producto no se actualizo con exito.');
					redirect(base_url().'vpproducto');
				}	
				
			}else{
				$this->load->view("venta_producto/producto/editar",$array_data);
			}
		}else{
			if ($result) {
				$this->load->view("venta_producto/producto/editar",$array_data);
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'vpproducto');
			}
			
		}

		$this->load->view("venta_producto/template/footer");
		
	}

	public function borrar(){
		$id=$this->uri->segment(3);
		$result=$this->vpProducto_model->eliminar($id);
		if ($result) {
			$this->session->set_flashdata('msg','El producto se borro exitosamente.');
				redirect(base_url().'vpproducto');		
		}else{
			$this->session->set_flashdata('msg','El producto no se borro exitosamente.');
				redirect(base_url().'vpproducto');		
		}
	}

	public function abastecer(){
		$id=$this->uri->segment(3);
		$result=$this->vpProducto_model->obtener_producto($id);
		$array_data=array("mi_menu"=>array(array('opcion'=>'Ventas','url'=>base_url().'vpventa')),'data_producto'=>$result);	
		$this->load->view("venta_producto/template/header");		
		$this->load->helper('navegador');
		if ($this->input->post()) {
			$rules=array(
				array('field'=>'input_cantidad',
					'label'=>'cantidad',
					'rules'=>'required|is_natural_no_zero',
					'errors'=>array(
						'required'=>'La cantidad es requerido',
						
						'is_natural_no_zero'=>'La cantidad tiene que ser mayor a cero.'))				
				);
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run()===true) {
				$array_form=array('stock'=>$this->input->post('input_cantidad'));
				$result=$this->vpProducto_model->aumentar_stock($id,$array_form);
				if ($result) {
					$this->session->set_flashdata('msg','Producto abastecido con exito.');
					redirect(base_url().'vpproducto');
				}else{
					$this->session->set_flashdata('msg','Producto no se abastecio con exito.');
					redirect(base_url().'vpproducto');
				}	
			}else{
				$this->load->view("venta_producto/producto/abastecer",$array_data);
			}
		}else{
			if ($result) {
				$this->load->view("venta_producto/producto/abastecer",$array_data);
			}else{
				$this->session->set_flashdata('msg','No existe el identificador.');
				redirect(base_url().'vpproducto');
			}
		}
	}


	public function buscar(){
		$nom=$this->input->post('nom');
		
		$result=$this->vpProducto_model->buscar_producto($nom);
		echo "<ul>";
		foreach ($result as $producto) {			
			echo "<li>".$producto->articulo."
			<button id='btnAgregar' value=".$producto->id.">Agregar articulo</button></li>";
		}
		echo "</ul>";


	}

}