<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doc extends CI_Controller {

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
		if ($permiso != 1) {
			redirect(base_url('sec/invalidar'));
		}
	}

	public function index()
	{
		$this->isLogin();
		//$docidd = $this->session->userdata('docid');
		$usu_id = $this->session->userdata('userid');

		$this->load->model('docente_model');
		$this->load->model('contacto_model');
		$this->load->model('docente_categoria_model');
		$this->load->model('docente_formacion_model');
		$this->load->model('domicilio_model');
		$this->load->model('carrera_model');

		$docente = $this->docente_model->select_where_docente_usu_id($usu_id);
		$doc_id  = $docente[0]->doc_id;
		$datos   = array('current_user' => $this->session->userdata('username'),
						 'docente'		=> $this->docente_model->select_where_docente_id($doc_id),
						 'contacto'		=> $this->contacto_model->select_where_contacto_id($doc_id),
						 'domicilios'	=> $this->domicilio_model->select_where_domicilio($doc_id),
						 'categorias'	=> $this->docente_categoria_model->select_where_docente_categoriaid($doc_id),
						 'formaciones'	=> $this->docente_formacion_model->select_docente_formacion_doc_id($doc_id)
				   );
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php',array('current_user' => $this->session->userdata('username')));
		$this->load->view('doc/docente_principal', $datos);
		$this->load->view('footer');
	}

	
	public function lista_carrera($doc_id){
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');

		$this->load->model('Carrera_model');
		$combos = array('carrera' => $this->Carrera_model->select_where_carrera_dir($doc_id) ); 

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php',array('current_user' => $this->session->userdata('username'),
			'dire'=>$this->Carrera_model->select_where_carrera_dir($doc_id)));
		$this->load->view('/doc/carrera_dir', $combos);
		$this->load->view('footer');

	}

	public function vucontacto($con_id)
	{
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');

		$this->load->model('Docente_model');
		$this->load->model('Contacto_model');

		$dato =  array('conta'=>$this->Contacto_model->get_contacto($con_id),
						'doc_id' => $this->Docente_model->select_where_docente_usu_id($usu_id));

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/doc/cambiar_contacto', $dato);
		$this->load->view('footer');

	}

	public function vudocente($doc_id)
	{
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');

		$this->load->model('Docente_model');
		$dato = array('doc'=>$this->Docente_model->get_docente($doc_id),
					  'doc_id' => $this->Docente_model->select_where_docente_usu_id($usu_id));

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/doc/cambiar_docente', $dato);
		$this->load->view('footer');
	}

	public function vudocenteformacion($docform_id)
	{
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');

		$this->load->model('Docente_formacion_model');
		$this->load->model('Docente_model');
		$this->load->model('Institucion_model');
		$this->load->model('Tipo_formacion_model');
		$this->load->model('Tipo_modalidad_formacion_model');
		$this->load->model('Tipo_titulo_model');

        $combos = array('docenteform'	=> $this->Docente_formacion_model->get_docente_formacion($docform_id),
        				'doc_id'		=> $this->Docente_model->select_where_docente_usu_id($usu_id),
        				'instituciones' => $this->Institucion_model->select_institucion(),
        				'tformaciones'	=> $this->Tipo_formacion_model->select_tipo_formacion(),
        				'ttitulos'		=> $this->Tipo_titulo_model->select_tipo_titulo(),
        				'tmodalidades'	=> $this->Tipo_modalidad_formacion_model->select_tipo_modalidad_formacion());
        $this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/doc/cambiar_docente_formacion', $combos);
		$this->load->view('footer');
	}

	public function vcdomicilio()
	{
	    $this->isLogin();

		$usu_id = $this->session->userdata('userid');

		$this->load->model('Docente_model');
		$this->load->model('Municipio_model');
		$this->load->model('Domicilio_model');

		$municipios = $this->Municipio_model->select_municipio();
		$docente = $this->Docente_model->select_where_docente_usu_id($usu_id);
		$doc_id  = $docente[0]->doc_id;
		$domicilios = $this->Domicilio_model->select_where_domicilio($doc_id);

		if($domicilios != FALSE){
			$dom = $domicilios;
			if(count($dom) == 3){
				$this->session->set_flashdata('carga_error', 'Ya has registrado 3 domicilios.');
				redirect(base_url('doc'));
			} else {
				$combos = array('municipios'=> $municipios, 'docente'=> $docente);

				$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
				$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
				$this->load->view('/doc/crear_docente_domicilio', $combos);
				$this->load->view('footer');
			}
		} else {
			$combos = array('municipios'=> $municipios, 'docente'=> $docente);

			$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
			$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
			$this->load->view('/doc/crear_docente_domicilio', $combos);
			$this->load->view('footer');
		}
	}


	public function vcdocenteformacion()
	{
		$this->isLogin();
		$usu_id = $this->session->userdata('userid');

		$this->load->model('Docente_formacion_model');
		$this->load->model('Docente_model');
		$this->load->model('Institucion_model');
		$this->load->model('Tipo_formacion_model');
		$this->load->model('Tipo_modalidad_formacion_model');
		$this->load->model('Tipo_titulo_model');

        $combos = array(
        				'doc_id'		=> $this->Docente_model->select_where_docente_usu_id($usu_id),
        				'instituciones' => $this->Institucion_model->select_institucion(),
        				'tformaciones'	=> $this->Tipo_formacion_model->select_tipo_formacion(),
        				'ttitulos'		=> $this->Tipo_titulo_model->select_tipo_titulo(),
        				'tmodalidades'	=> $this->Tipo_modalidad_formacion_model->select_tipo_modalidad_formacion());
        $this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/doc/crear_docente_formacion', $combos);
		$this->load->view('footer');
	}

	public function vcinstitucion()
	{
		$this->isLogin();
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/doc/crear_institucion');
		$this->load->view('footer');
	}

	public function vccargarcv()
	{
		$this->isLogin();
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/doc/cargar_cv');
		$this->load->view('footer');
	}

	public function vcmunicipio()
	{
		$this->isLogin();

		$this->load->model('Estado_model');
		$estado = $this->Estado_model->select_estado(); 	 
		$combos = array('estados' => $estado);
		
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/doc/crear_municipio', $combos);
		$this->load->view('footer');
	}

	public function vucontrasena()
	{
		$this->isLogin();
		
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo DOC'));
		$this->load->view('navbar_doc.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/doc/cambiar_contrasena');
		$this->load->view('footer');
	}
}
