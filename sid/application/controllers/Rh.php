<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rh extends CI_Controller {

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
		if ($permiso != 9) {
			redirect(base_url('sec/invalidar'));
		}
	}

	public function index()
	{
		$this->isLogin();
		redirect(base_url('rh/filtro'));
	}

	public function filtro($letra = 'A')
	{
		$usu_id = $this->session->userdata('userid');
                $this->load->model('Docente_model');

                $this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo RH'));
                $this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
                $this->load->view('rh/rh_principal.php',array('docentes' => $this->Docente_model->select_where_paterno($letra),
                'letra' => $letra
                ));
                $this->load->view('footer.php');

	}

	public function vrdetalle($doc_id = 0,$letra ='A')
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
						  'doc_id'=>$doc_id,
						  'letra'=>$letra);
	
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('rh/ver_detalle',$datos);
		$this->load->view('footer.php');
		//}
		} else 
		{
			redirect(base_url('rh'));
		}

		}

	public function vucontrasena()
	{
		$this->isLogin();
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/rh/cambiar_contrasena');
		$this->load->view('footer');
	}

	public function vracademia()
	{
		$this->isLogin();

		$this->load->model('Academia_model');

		$datos = array('academia' => $this->Academia_model->select_academia());
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/rh/listar_academia', $datos);
		$this->load->view('footer');
	}


	public function vudocenteformacion($docform_id = 0, $doc_id = 0 , $letra = 'A')
        {
            $this->isLogin();
            if($doc_id > 0){
            $this->load->model('Docente_formacion_model');
			$this->load->model('Docente_model');
	        $combos = array('docenteform'   => $this->Docente_formacion_model->get_docente_formacion($docform_id),
				'doc_id'=> $this->Docente_model->select_where_docente_id($doc_id),
				'letra'=>$letra);
       	    $this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
    	    $this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
            $this->load->view('/rh/cambiar_docente_formacion', $combos);
            $this->load->view('footer');
        	} else{
        		redirect(base_url('rh'));
        	}
        }


	public function vudocente($doc_id)
        {
                $this->isLogin();
                $this->load->model('Docente_model');
                $dato = array('doc'=>$this->Docente_model->get_docente($doc_id));
                $this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
                $this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
                $this->load->view('/rh/cambiar_docente', $dato);
                $this->load->view('footer');
        }


	public function vracademiamiembros()
	{
		$this->isLogin();

		$this->load->model('Academia_miembros_model');
		$lista=$this->Academia_miembros_model->select_academia_miembros();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('rh/listar_acamiembros', $data); 
		$this->load->view('footer.php'); 
	}

	public function vrarea()
	{
		$this->isLogin();

		$this->load->model('Area_model');
		$respuesta = $this->Area_model->select_area();
		$data = array('area' => $respuesta);
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('rh/listar_area', $data);
		$this->load->view('footer');
	}

	public function vrinstitucion()
	{
		$this->isLogin();
		$this->load->model('Institucion_model');
		$respuesta = $this->Institucion_model->select_institucion();
		$data = array('institucion' => $respuesta);
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('rh/listar_institucion', $data);
		$this->load->view('footer');
	}

	public function vrcarrera()
	{
		$this->isLogin();

		$this->load->model('Carrera_model');

		$datos = array('carrera' => $this->Carrera_model->select_carrera());

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('rh/listar_carrera', $datos);
		$this->load->view('footer');
	}

	public function vrcuerpoacademico()
	{
		$this->isLogin();

		$this->load->model('Cuerpo_academico_model');
		$lista=$this->Cuerpo_academico_model->select_cuerpo_academico();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/rh/listar_cuerpo_academico', $data);
		$this->load->view('footer.php'); 
	}

	public function vrcuerpo_academico_miembros()
	{
		$this->isLogin();
		$this->load->model('Cuerpo_academico_miembros_model');

		$datos = array('miembro' => $this->Cuerpo_academico_miembros_model->select_cuerpo_academico_miembros());

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/rh/listar_miembros_ca', $datos);
		$this->load->view('footer');
	}

	public function vrestado()
	{
		$this->isLogin();

		$this->load->model('Estado_model');
		$lista=$this->Estado_model->select_estado();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('rh/listar_estado', $data); 
		$this->load->view('footer.php'); 
	}

	public function vrmunicipio()
	{
		$this->isLogin();

		$this->load->model('Municipio_model');
		$lista=$this->Municipio_model->select_municipio();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('rh/listar_municipio', $data);
		$this->load->view('footer.php'); 
	}

	public function vrnivel()
	{
		$this->isLogin();
		$this->load->model('Nivel_model');
		$lista=$this->Nivel_model->select_nivel();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente  | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('rh/listar_nivel', $data);
		$this->load->view('footer.php'); 
	}

	public function vrdocentecategoria()
	{
		$this->isLogin();

		$this->load->model('Docente_categoria_model');
		$lista=$this->Docente_categoria_model->select_docente_categoria();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema Único de Mejoramiento Académico | Módulo CAC'));
		$this->load->view('navbar_rec.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('rec/listar_docente_categoria', $data); 
		$this->load->view('footer.php'); 
	}

	public function vrtipoformacion()
	{
		$this->isLogin();

		$this->load->model('Tipo_formacion_model');
		$lista=$this->Tipo_formacion_model->select_tipo_formacion();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('rh/listar_tipo_formacion', $data); 
		$this->load->view('footer.php'); 
	}

	public function vrmodalidad()
	{
		$this->isLogin();

		$this->load->model('Tipo_modalidad_formacion_model');

		$dato = array('modalidad' =>  $this->Tipo_modalidad_formacion_model->select_tipo_modalidad_formacion());

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/rh/listar_tipo_modalidad', $dato);
		$this->load->view('footer');
	}

	public function vrtipo_nivel_habilitacion()
	{
		$this->isLogin();
		$this->load->model('Nivel_habilitacion_model');
        $respuesta = $this->Nivel_habilitacion_model->select_nivel_habilitacion();
        $data = array('nivel'=>$respuesta );

        $this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('rh/listar_habilitacion', $data);
		$this->load->view('footer');
	}

	public function vrtipo_nombramiento()
	{
		$this->isLogin();

		$this->load->model('Tipo_nombramiento_model');

		$datos = array('nombramiento' => $this->Tipo_nombramiento_model->select_tipo_nombramiento());

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/rh/listar_tipo_nombramiento', $datos);
		$this->load->view('footer');
	}

	public function vrtipoperiodo()
	{
		$this->isLogin();
		$this->load->model('Tipo_periodo_model');
		$respuesta = $this->Tipo_periodo_model->select_tipo_periodo();
		$data = array('periodo' => $respuesta);
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('rh/listar_periodo', $data);
		$this->load->view('footer');
	}

	public function vrtipo_titulo()
	{
		$this->isLogin();

		$this->load->model('Tipo_titulo_model');

		$datos = array('titulo' =>  $this->Tipo_titulo_model->select_tipo_titulo());

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo RH'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/rh/listar_tipo_titulo', $datos);
		$this->load->view('footer');
	}

	public function vrusuario()
	{
		$this->isLogin();
		$this->load->model('Usuario_model');
		$respuesta = $this->Usuario_model->select_usuario();
		$data = array('usuario' => $respuesta);
		
		$this->load->view('header', array('title' => 'SUMA'));
		$this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/rh/listar_usuario', $data);
		$this->load->view('footer');
		
	}

}
