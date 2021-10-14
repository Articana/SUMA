<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dire extends CI_Controller {
	
	/*
	public function __construct()
    	{
        	parent::__construct();
		
		// Test
		$this->load->library('unit_test');

		$test = $this->vr_detalle(99); // detalle de docente
		$expected_result = count($test) >= 0;
		$test_name = 'Test';
		$this->unit->run($test, $expected_result, $test_name);
		
	}
	*/
	
	public function isLogin()
	{
		if ($this->session->has_userdata('userid') && $this->session->has_userdata('username') && $this->session->has_userdata('permiso')) {
			$this->redirectArea();
		} else {
			redirect(base_url('sec/invalidar'));
		}
	}

	public function redirectArea()
	{
		$permiso = $this->session->userdata('permiso');
		if ($permiso != 11) {
			redirect(base_url('sec/invalidar'));
		}
	}

	public function index()
	{
		$this->isLogin();
		redirect(base_url('dire/filtro'));
	}

	public function filtro($letra = 'A')
	{
		
		
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');
		

		$carr_id = $this->session->userdata('carr_id');

		$this->load->model('Responsable_model');
		$this->load->model('Docente_model');
		$responsable = $this->Responsable_model->select_where_resp_usu_id($usu_id);
		$res_id  = $responsable[0]->res_id;

		$datos = array('carrera' => $this->Responsable_model->select_where_carrera_dir($res_id),
			'docentes' => $this->Docente_model->select_where_paterno_carr($letra,$carr_id),
			'carr_id' => $carr_id,
			'resp' => $this->Docente_model->select_where_carrera_docente($carr_id)
		 );
		

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo DIRE'));
		$this->load->view('navbar_dir.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('dir/dir_principal.php',$datos);
		//print_r( $datos);
		$this->load->view('footer.php');
	}

	public function carrera_dire($carr_id = 0){
		if ($carr_id > 0) {
			$this->session->set_userdata('carr_id', $carr_id);
			$this->filtro('A');
		}
		else 
		{
			redirect(base_url('dire'));
		}
	}


	public function vrdetalle($doc_id = 0)
	{
		$this->isLogin();

		if($doc_id > 0)
		{
			$this->load->model('Docente_model'); 
			$this->load->model('Academia_model'); 
			$this->load->model('Academia_miembros_model'); 
			$this->load->model('Carga_model'); 
			$this->load->model('Contacto_model'); 
			$this->load->model('Cuerpo_academico_miembros_model'); 
			$this->load->model('Docente_carrera_model'); 
			$this->load->model('Docente_categoria_model'); 
			$this->load->model('Domicilio_model'); 
			$this->load->model('Docente_formacion_model');
			$cargas =$this->Carga_model->select_where_carga_id($doc_id);
			$carga = json_encode($cargas);

			$datos = array('docente' => $this->Docente_model->select_where_docente_id($doc_id),
						  'academia'=>  $this->Academia_model->select_where_academia($doc_id),
						  'acamiembro'=>$this->Academia_miembros_model->select_where_academiamiembros($doc_id),
						  'contacto'=>$this->Contacto_model->select_where_contacto_id($doc_id),
						  'cmiembros'=>$this->Cuerpo_academico_miembros_model->select_where_cuerpomiembros_id($doc_id),
						  'doccarrera'=>$this->Docente_carrera_model->select_where_doccarrera_docid($doc_id),
						  'categorias'=>$this->Docente_categoria_model->select_where_docente_categoriaid($doc_id),
						  'domicilios'	=> $this->Domicilio_model->select_where_domicilio($doc_id),
						  'formaciones'	=> $this->Docente_formacion_model->select_docente_formacion_doc_id($doc_id),
						  'carga' => $carga,
						  'doc_id'=>$doc_id);
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo DIRE'));
		$this->load->view('navbar_dir.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('dir/ver_detalle',$datos);
		$this->load->view('footer.php');
		//}
		} else 
		{
			redirect(base_url('dire'));
		}

		}

	public function carrera_usuarios($carr_id = 0){
		if ($carr_id > 0) {
			$this->session->set_userdata('carr_id', $carr_id);
			$this->vrusuario();
		} 
		
	}

	public function carrera_acamiembros($carr_id = 0){
		if ($carr_id > 0) {
			$this->session->set_userdata('carr_id', $carr_id);
			$this->vracademiamiembros();
		} 
		
	}

	public function carrera_cuerpo($carr_id = 0){
		if ($carr_id > 0) {
			$this->session->set_userdata('carr_id', $carr_id);
			$this->vrcuerpo_academico_miembros();
		} 
		
	}

	public function vracademiamiembros()
	{
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');
		
		$carr_id = $this->session->userdata('carr_id');

		$this->load->model('Responsable_model');
		$this->load->model('Academia_miembros_model');
		$responsable = $this->Responsable_model->select_where_resp_usu_id($usu_id);
		$res_id  = $responsable[0]->res_id;

		$data = array('carrera' => $this->Responsable_model->select_where_carrera_dir($res_id),
			'listar' => $this->Academia_miembros_model->select_academia_miembros_dir($carr_id),
			'car_id' => $carr_id
		 );
		
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DIR'));
		$this->load->view('navbar_dir.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/dir/listar_acamiembros', $data);
		$this->load->view('footer');
	}

	public function vrcuerpo_academico_miembros()
	{
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');
		
		$carr_id = $this->session->userdata('carr_id');

		$this->load->model('Responsable_model');
		$this->load->model('Cuerpo_academico_miembros_model');
		$responsable = $this->Responsable_model->select_where_resp_usu_id($usu_id);
		$res_id  = $responsable[0]->res_id;

		$data = array('carrera' => $this->Responsable_model->select_where_carrera_dir($res_id),
			'miembro' => $this->Cuerpo_academico_miembros_model->select_cuerpo_academico_miembros_dir($carr_id),
			'car_id' => $carr_id
		 );
		
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DIR'));
		$this->load->view('navbar_dir.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/dir/listar_miembros_ca', $data);
		$this->load->view('footer');

	}

	public function vrusuario()
	{
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');
		
		$car_id = $this->session->userdata('carr_id');

		$this->load->model('Responsable_model');
		$this->load->model('Usuario_model');
		$responsable = $this->Responsable_model->select_where_resp_usu_id($usu_id);
		$res_id  = $responsable[0]->res_id;

		$data = array('carrera' => $this->Responsable_model->select_where_carrera_dir($res_id),
			'usuario' => $this->Usuario_model->select_usuario_director($car_id),
			'car_id' => $car_id
		 );
		
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DIR'));
		$this->load->view('navbar_dir.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/dir/listar_usuario', $data);
		$this->load->view('footer');

	}

	public function vucontrasena()
	{
		$this->isLogin();
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DIR'));
		$this->load->view('navbar_dir.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/dir/cambiar_contrasena');
		$this->load->view('footer');
	}

}
