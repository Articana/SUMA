<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cac extends CI_Controller {

      	/*
	public function __construct()
    	{
        	parent::__construct();
		
		// Test
		$this->load->library('unit_test');

		$test = $this->filtro('A');
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
		if ($permiso != 5) {
			redirect(base_url('sec/invalidar'));
		}
	}

	public function index()
	{
		$this->isLogin();
		redirect(base_url('cac/filtro'));
	}

	public function filtro($letra = 'A')
	{
		$this->isLogin();

		$usu_id = $this->session->userdata('userid');
		$this->load->model('Docente_model');
		$this->load->model('Docente_categoria_model');

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cac_principal.php',array('docentes' => $this->Docente_model->select_where_paterno($letra),
		'letra' => $letra
		/*'categorias'=> $this->Docente_categoria_model->select_where_categoria($letra)*/));
		$this->load->view('footer.php');
	}


	public function vudocente($doc_id)
      	{
            $this->isLogin();
            $this->load->model('Docente_model');
            $dato = array('doc'=>$this->Docente_model->get_docente($doc_id));
            $this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
            $this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
            $this->load->view('/cac/cambiar_docente', $dato);
            $this->load->view('footer');
       	 }


	public function vcacademia()
	{
		$this->isLogin();

		$this->load->model('Docente_model');
        	$docentes = $this->Docente_model->select_docente();  
		$combos = array( 'docente' => $docentes);
		
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_academia',$combos);
		$this->load->view('footer.php');	
	}

	public function vracademia()
	{
		$this->isLogin();

		$this->load->model('Academia_model');

		$datos = array('academia' => $this->Academia_model->select_academia());

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_academia', $datos);
		$this->load->view('footer');
	}

	public function fdacademia($aca_id=0)
	{
		$this->isLogin();

		$this->load->model('Academia_model');

		$dato = array('academia' =>  $this->Academia_model->delete_academia($aca_id));

		$this->load->view('header', array('title' => 'Sistema de Información Docente'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_academia', $dato);
		$this->load->view('footer');
		redirect(base_url('cac/vracademia'));
	}

	public function vuacademia($aca_id)
	{
		$this->isLogin();
		$this->load->model('Academia_model');
        	$verificar = $this->Academia_model->get_academia($aca_id);

        	$dato = array(
                      'aca_id' => $verificar['aca_id'],
                      'aca_nombre' => $verificar['aca_nombre']
                     );

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_academia',$dato);
		$this->load->view('footer.php');
	}


	public function vcacademiamiembros()
	{
		$this->isLogin();

		$this->load->model('Tipo_periodo_model'); 
		$periodo = $this->Tipo_periodo_model->select_tipo_periodo(); 
		$this->load->model('Academia_model'); 
		$academia = $this->Academia_model->select_academia(); 
		$this->load->model('Docente_model');
		$docente = $this->Docente_model->select_docente();
		$combos = array('periodos' => $periodo, 
						'academias' => $academia, 
						'docentes' => $docente
						); 	
		
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_acamiembros', $combos); 
		$this->load->view('footer.php');
	}

	public function vracademiamiembros()
	{
		$this->isLogin();

		$this->load->model('Academia_miembros_model');
		$lista=$this->Academia_miembros_model->select_academia_miembros();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_acamiembros', $data); 
		$this->load->view('footer.php'); 
	}

	public function fdacademiamiembros($aca_mie_id = 0)
		{	
		$this->isLogin();

		$this->load->model('Academia_miembros_model');

		$data =  array('listar' => $this->Academia_miembros_model->delete_academia_miembros($aca_mie_id));

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_acamiembros', $data); 
		$this->load->view('footer.php'); 	
		redirect(base_url('cac/vracademiamiembros'));		
	}

	public function vuacademiamiembros($aca_mie_id) 
   	{ 
   		$this->isLogin();

   		$this->load->model('Academia_miembros_model'); 
   		$this->load->model('Tipo_periodo_model');  
		$this->load->model('Academia_model'); 
		$this->load->model('Docente_model');
		
		$combos = array('acamiembros'=> $this->Academia_miembros_model->get_academia_miembros($aca_mie_id),
						'periodos' 	 => $this->Tipo_periodo_model->select_tipo_periodo(), 
						'academias'  => $this->Academia_model->select_academia() , 
						'docentes'   => $this->Docente_model->select_docente()
						); 	
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_acamiembros', $combos);
		$this->load->view('footer'); 
   	}

   	public function vcarea()
	{
		$this->isLogin();

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_area');
		$this->load->view('footer');
	}

	public function vrarea()
	{
		$this->isLogin();

		$this->load->model('Area_model');
		$respuesta = $this->Area_model->select_area();
		$data = array('area' => $respuesta);
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_area', $data);
		$this->load->view('footer');
	}

	public function fdarea($are_id)
	{
		$this->isLogin();
		$this->load->model('Area_model');
		$respuesta = $this->Area_model->delete_area($are_id);
		$data = array('area' => $respuesta);
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_area', $data);
		$this->load->view('footer');
		redirect(base_url('/index.php/cac/vrarea'));
	}

	public function vuarea($are_id)
	{
		$this->isLogin();
		$this->load->model('Area_model');
		$are=$this->Area_model->get_area($are_id);
		$info = array('are'=> $are);

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/cambiar_area',$info);
		$this->load->view('footer');
	}

	public function vccarga($doc_id =0, $letra='A')
	{
		$this->isLogin();

		if($doc_id > 0)
		{
			//if (true) {
		$this->load->model('Docente_model'); 
	  	$this->load->model('Tipo_periodo_model');  
	  	$this->load->model('Area_model'); 
		$combos = array( 'docente' =>  $this->Docente_model->select_docente(),
						 'periodos'=> $this->Tipo_periodo_model->select_tipo_periodo(),
						 'areas' => $this->Area_model->select_area(),
						 'doc_id' =>$doc_id,
						 'letra'=>$letra);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_carga.php',$combos);
		$this->load->view('footer.php');
		//}
		} else 
		{
			redirect(base_url('cac'));
		}
	}

	public function vccarrera()
	{
		$this->isLogin();
		$this->load->model('Responsable_model');
        $responsable = $this->Responsable_model->select_responsable();
		$combo = array( 'resp' => $responsable);
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_carrera', $combo);
		$this->load->view('footer');
	}

	public function vrcarrera()
	{
		$this->isLogin();
		$this->load->model('Carrera_model');
		$datos = array('carrera' => $this->Carrera_model->select_carrera());
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_carrera', $datos);
		$this->load->view('footer');
	}

	public function fdcarrera($carr_id=0)
	{
		$this->isLogin();
		$this->load->model('Carrera_model');
		$dato = array('carrera' =>  $this->Carrera_model->delete_carrera($carr_id));
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_carrera', $dato);
		$this->load->view('footer');
		redirect(base_url('cac/vrcarrera'));
	}

	public function vucarrera($carr_id)
	{
		$this->isLogin();
		$this->load->model('Carrera_model');
		$this->load->model('Responsable_model');
		$responsable = $this->Responsable_model->select_responsable(); 
		$verificar = $this->Carrera_model->get_carrera($carr_id);
	    	$data = array(
                      'carr_id' => $verificar['carr_id'],
                      'carr_nombre' => $verificar['carr_nombre'],
                      'carr_abreviatura' => $verificar['carr_abreviatura'],
                      'res_id' => $verificar['res_id'],
		      		  'resp' => $responsable
                     );
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_carrera',$data);
		$this->load->view('footer.php');
	}

	public function vccuerpoacedemico()
	{
		$this->isLogin();
		$this->load->model('Nivel_habilitacion_model'); 
		$this->load->model('Carrera_model');
		$nivel = $this->Nivel_habilitacion_model->select_nivel_habilitacion();
		$carrera = $this->Carrera_model->select_carrera(); 
		$combos = array('niveles' => $nivel, 
						'carreras' => $carrera
						); 
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_cuerpoacademico',$combos); 	
		$this->load->view('footer');
	}

	public function vrcuerpoacademico()
	{
		$this->isLogin();
		$this->load->model('Cuerpo_academico_model');
		$lista=$this->Cuerpo_academico_model->select_cuerpo_academico();
		$data =  array('listar' => $lista);
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_cuerpo_academico', $data);
		$this->load->view('footer.php'); 
	}

	public function fdcuerpoacademico($cue_id = 0)
	{	
		$this->isLogin();
		$this->load->model('Cuerpo_academico_model');
		$data =  array('listar' => $this->Cuerpo_academico_model->delete_cuerpo_academico($cue_id));
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_cuerpo_academico', $data); 
		$this->load->view('footer.php'); 
		redirect(base_url('cac/vrcuerpoacademico'));		
	}

	public function vucuerpoacademico($cue_id)
	{
		$this->isLogin();
		$this->load->model('Cuerpo_academico_model');
		$this->load->model('Nivel_habilitacion_model');
		$this->load->model('Carrera_model');
		$combos = array('cuerpoaca'=> $this->Cuerpo_academico_model->get_cuerpo_academico($cue_id),
						'niveles'  => $this->Nivel_habilitacion_model->select_nivel_habilitacion(), 
						'carreras'  => $this->Carrera_model->select_carrera()); 	
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_cuerpo_academico', $combos);
		$this->load->view('footer');
	}

	public function vccuerpo_academico_miembros()
	{
		$this->isLogin();
 		$this->load->model('Cuerpo_academico_model');  
       	        $miembro = $this->Cuerpo_academico_model->select_cuerpo_academico();
        	$this->load->model('Docente_model');  
        	$docentes = $this->Docente_model->select_docente();
        	$this->load->model('Tipo_miembro_ca_model');  
        	$tipo_miembro = $this->Tipo_miembro_ca_model->select_tipo_miembro_ca();
       		$combos = array('miembros' => $miembro, 'docente' => $docentes , 'tipos_miembros'=> $tipo_miembro);
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_cuerpo_miembros',$combos);
		$this->load->view('footer');
	}

	public function vrcuerpo_academico_miembros()
	{
		$this->isLogin();
		$this->load->model('Cuerpo_academico_miembros_model');
		$datos = array('miembro' => $this->Cuerpo_academico_miembros_model->select_cuerpo_academico_miembros());
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_miembros_ca', $datos);
		$this->load->view('footer');
	}

	public function fdcuerpo_academico_miembros($cam_id=0)
	{
		$this->isLogin();
		$this->load->model('Cuerpo_academico_miembros_model');
		$dato = array('carrera' => $this->Cuerpo_academico_miembros_model->delete_cuerpo_academico_miembros($cam_id));
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_academia', $dato);
		$this->load->view('footer');
		redirect(base_url('cac/vrcuerpo_academico_miembros'));
	}

	public function vucuerpo_academico_miembros($cam_id)
	{
		$this->isLogin();
		$this->load->model('Cuerpo_academico_miembros_model');
		$this->load->model('Cuerpo_academico_model');
		$this->load->model('Docente_model'); 
		$this->load->model('Tipo_miembro_ca_model');

        $academico = $this->Cuerpo_academico_miembros_model->get_cuerpo_academico_miembros($cam_id);
        $miembro = $this->Cuerpo_academico_model->select_cuerpo_academico();
        $docentes = $this->Docente_model->select_docente();
        $tipo_miembro = $this->Tipo_miembro_ca_model->select_tipo_miembro_ca();

        $combos = array('academico' => $academico,'miembros' => $miembro, 'docente' => $docentes , 
        				'tipos_miembros'=> $tipo_miembro);
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_ca_miembros',$combos);
		$this->load->view('footer.php');
	}

	public function vcdocente()
	{
		$this->isLogin();
		$this->load->model('Carrera_model');
		$carreras = $this->Carrera_model->select_carrera(); 
		$combos = array('carreras' => $carreras); 

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_docente',$combos);
		$this->load->view('footer');
	}

	public function vcdocentecategoria($doc_id = 0, $letra='A')
	{ 
		$this->isLogin();

		if($doc_id > 0)
		{
			//$this->load->model('Docente_model');
			//$docs = $this->Docente_model->select_where_docente_id($doc_id);

			//if (true) {

				$this->load->model('Tipo_categoria_model');  
				$categoria = $this->Tipo_categoria_model->select_tipo_categoria();
				$this->load->model('Tipo_nombramiento_model');
				$nombramiento = $this->Tipo_nombramiento_model->select_tipo_nombramiento();
				//$docente = $this->Docente_model->select_docente();  

				$combos = array('categorias' => $categoria, 
						'nombramientos' => $nombramiento, 
						'doc_id' => $doc_id,
						'letra'=>$letra);
				$this->load->view('header', array('title' => 'SID'));
				$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
				$this->load->view('cac/crear_docentecategoria', $combos); 	
				$this->load->view('footer');
			//}
		} else 
		{
			redirect(base_url('cac'));
		}

		}

	public function vrdocentecategoria()
	{
		$this->isLogin();

		$this->load->model('Docente_categoria_model');
		$lista=$this->Docente_categoria_model->select_docente_categoria();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_docente_categoria', $data); 
		$this->load->view('footer.php'); 
	}

	public function fddocentecategoria($doccat_id = 0)
	{	
		$this->isLogin();

		$this->load->model('Docente_categoria_model');
		$data =  array('listar' => $this->Docente_categoria_model->delete_docente_categoria($doccat_id));
		
		$this->load->view('header.php', array('title' => 'Sistema Único de Mejoramiento Académico | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_docente_categoria', $data); 
		$this->load->view('footer.php');
		redirect(base_url('cac/vrdocentecategoria'));		
	}


	public function vudocentecategoria($doccat_id) 
   	{ 
   		$this->isLogin();

   		$this->load->model('Docente_categoria_model'); 
   		$this->load->model('Tipo_categoria_model');  
		$this->load->model('Tipo_nombramiento_model');
		$this->load->model('Docente_model'); 

   		$combos = array('doccategorias' => $this->Docente_categoria_model->get_docente_categoria($doccat_id) ,
   					    'categorias'    => $this->Tipo_categoria_model->select_tipo_categoria(), 
						'nombramientos' => $this->Tipo_nombramiento_model->select_tipo_nombramiento(), 
						'docentes'      => $this->Docente_model->select_docente() 
   					  ); 
   		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_docente_categoria', $combos);
		$this->load->view('footer');
   	}


   	public function vcdirector()
   	{
   		$this->isLogin();
		

   		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_director');
		$this->load->view('footer');
   	}

   	public function vrdirector()
   	{
   		$this->isLogin();
   		$this->load->model('Responsable_model');
   		$lista=$this->Responsable_model->select_responsable();
		$data =  array('listar' => $lista);
	
   		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_director',$data);
		$this->load->view('footer');

   	}

   	public function vudirector($res_id)
   	{

   		$this->load->model('Responsable_model'); 
   		$data = array('resps' => $this->Responsable_model->get_director($res_id)); 

   		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_director',$data);
		$this->load->view('footer');
   	}

   	public function fddirector($res_id = 0)
	{	
		$this->isLogin();

		$this->load->model('Responsable_model');
		$data =  array('listar' => $this->Responsable_model->delete_director($res_id));
		
		$this->load->view('header.php', array('title' => 'Sistema Único de Mejoramiento Académico | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_director', $data); 
		$this->load->view('footer.php');
		redirect(base_url('cac/vrdirector'));		
	}

   	public function vcestado()
	{ 	
		$this->isLogin();

		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_estado');
		$this->load->view('footer'); 		
	}

   	public function vuestado($est_id) 
   	{ 
   		$this->isLogin();

   		$this->load->model('Estado_model'); 
   		$data = array('estad' => $this->Estado_model->get_estado($est_id)); 
   		
   		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_estado', $data);
		$this->load->view('footer');
   	}

	public function fdestado($est_id = 0)

	{	
		$this->isLogin();

		$this->load->model('Estado_model');
		$data =  array('listar' => $this->Estado_model->delete_estado($est_id));

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_estado', $data); 
		$this->load->view('footer.php');
		redirect(base_url('cac/vrestado'));		
	}

	public function vrestado()
	{
		$this->isLogin();

		$this->load->model('Estado_model');
		$lista=$this->Estado_model->select_estado();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_estado', $data); 
		$this->load->view('footer.php'); 
	}

	public function vcinstitucion()
	{
		$this->isLogin();

		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_institucion');
		$this->load->view('footer');
	}

	public function vrinstitucion()
	{
		$this->isLogin();
		$this->load->model('Institucion_model');
		$respuesta = $this->Institucion_model->select_institucion();
		$data = array('institucion' => $respuesta);

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_institucion', $data);
		$this->load->view('footer');
	}

	public function fdinstitucion($inst_id)
	{
		$this->isLogin();
		$this->load->model('Institucion_model');
		$respuesta =$this->Institucion_model->delete_institucion($inst_id);
		$data = array('institucion' => $respuesta);

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_institucion', $data);
		$this->load->view('footer');
		redirect(base_url('cac/vrinstitucion'));
		
	}

	public function vuinstitucion($inst_id)
	{
		$this->isLogin();
		$this->load->model('Institucion_model');
		$institucion=$this->Institucion_model->select_where_institucion_id($inst_id);
		$data =  array('institucion'=> $institucion);

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/cambiar_institucion',$data);
		$this->load->view('footer');
	}

	public function vcmunicipio()
	{
		$this->isLogin();

		$this->load->model('Estado_model');
		$estado = $this->Estado_model->select_estado(); 	 
		$combos = array('estados' => $estado);
		
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_municipio', $combos);
		$this->load->view('footer');
	}

	public function vrmunicipio()
	{
		$this->isLogin();

		$this->load->model('Municipio_model');
		$lista=$this->Municipio_model->select_municipio();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_municipio', $data);
		$this->load->view('footer.php'); 
	}

	public function fdmunicipio($mun_id = 0)
	{	
		$this->isLogin();

		$this->load->model('Municipio_model');
		$data =  array('listar' => $this->Municipio_model->delete_municipio($mun_id));

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_municipio', $data); 
		$this->load->view('footer.php');
		redirect(base_url('cac/vrmunicipio'));		
	}

	public function vumunicipio($mun_id) 
   	{ 
   		$this->isLogin();

   		$this->load->model('Municipio_model'); 
   		$this->load->model('Estado_model');  
   		$data = array('mun'     => $this->Municipio_model->get_municipio($mun_id), 
   			    	  'estados' => $this->Estado_model->select_estado()); 
		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_municipio', $data);
		$this->load->view('footer');
   	}

	public function vcnivel()
	{ 	
		$this->isLogin();

		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_nivelac'); 
		$this->load->view('footer');		
	}

	public function vrnivel()
	{
		$this->isLogin();
		$this->load->model('Nivel_model');
		$lista=$this->Nivel_model->select_nivel();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_nivel', $data);
		$this->load->view('footer.php'); 
	}

	public function fdnivel($nivel_id = 0)
	{	
		$this->isLogin();

		$this->load->model('Nivel_model');	
		$data =  array('listar' => $this->Nivel_model->delete_nivel($nivel_id));

		$this->load->view('header.php', array('title' => 'Sistema Único de Mejoramiento Académico | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_nivel', $data); 
		$this->load->view('footer.php'); 
		redirect(base_url('cac/vrnivel'));		
	}

	public function vunivel($nivel_id) 
   	{ 
   		$this->isLogin();
		$this->load->model('Nivel_model'); 
   		$data = array('nivels' => $this->Nivel_model->get_nivel($nivel_id)); 

   		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/cambiar_nivel', $data);
		$this->load->view('footer');
   	}

   	public function vctipocategoria()
	{ 	
		$this->isLogin();

		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_tipo_categoria');
		$this->load->view('footer');  		
	}

	public function vrtipocategoria()
	{
		$this->isLogin();

		$this->load->model('Tipo_categoria_model');
		$lista=$this->Tipo_categoria_model->select_tipo_categoria();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_tipo_categoria', $data); 
		$this->load->view('footer.php'); 
	}

	public function fdtipocategoria($tipocat_id = 0)
	{	
		$this->isLogin();

		$this->load->model('Tipo_categoria_model');
		$data =  array('listar' => $this->Tipo_categoria_model->delete_tipo_categoria($tipocat_id));
		
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_tipo_categoria', $data); 
		$this->load->view('footer.php');
		redirect(base_url('cac/vrtipocategoria'));		
	}

	public function vctipoformacion()
	{ 	
		$this->isLogin();

		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_gradoformacion'); 
		$this->load->view('footer');		
	}

	public function fdtipoformacion($tipoform_id = 0)
	{	
		$this->isLogin();

		$this->load->model('Tipo_formacion_model');
		$data =  array('listar' => $this->Tipo_formacion_model->delete_tipo_formacion($tipoform_id));

		$this->load->view('header.php', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_tipo_formacion', $data); 
		$this->load->view('footer.php'); 
		redirect(base_url('cac/vrtipoformacion'));		
	}

	public function vrtipoformacion()
	{
		$this->isLogin();

		$this->load->model('Tipo_formacion_model');
		$lista=$this->Tipo_formacion_model->select_tipo_formacion();
		$data =  array('listar' => $lista);

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));	
		$this->load->view('cac/listar_tipo_formacion', $data); 
		$this->load->view('footer.php'); 
	}

	public function vcmodalidad()
	{
		$this->isLogin();

		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_modalidad_formacion');
		$this->load->view('footer');
	}

   	public function vrmodalidad()
	{
		$this->isLogin();

		$this->load->model('Tipo_modalidad_formacion_model');

		$dato = array('modalidad' =>  $this->Tipo_modalidad_formacion_model->select_tipo_modalidad_formacion());

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_tipo_modalidad', $dato);
		$this->load->view('footer');
	}

	public function fdtipo_modalidad($tmf_id=0)
	{
		$this->isLogin();

		$this->load->model('Tipo_modalidad_formacion_model');

        	$dato = array('modalidad' => $this->Tipo_modalidad_formacion_model->delete_tipo_modalidad($tmf_id));
    
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_tipo_modalidad', $dato);
		$this->load->view('footer');
		redirect(base_url('cac/vrmodalidad'));
	}

	public function vctipo_nivel_habilitacion()
	{
       	        $this->isLogin();

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_habilitacion');
		$this->load->view('footer');
	}


	public function vrtipo_nivel_habilitacion()
	{
		$this->isLogin();
		$this->load->model('Nivel_habilitacion_model');
        	$respuesta = $this->Nivel_habilitacion_model->select_nivel_habilitacion();
        	$data = array('nivel'=>$respuesta );
        	$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_habilitacion', $data);
		$this->load->view('footer');
	}

	public function fdtipo_nivel_habilitacion($tnh_id)
	{
		$this->isLogin();
		$this->load->model('Nivel_habilitacion_model');
        	$respuesta = $this->Nivel_habilitacion_model->delete_tipo_nivel_habilitacion($tnh_id);
        	$data = array('nivel'=>$respuesta );

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_habilitacion', $data);
		$this->load->view('footer');
		redirect(base_url('cac/vrtipo_nivel_habilitacion'));
	}

	public function vctipo_nombramiento()
	{
        	$this->isLogin();
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_nombramiento');
		$this->load->view('footer');
	}

	public function vrtipo_nombramiento()
	{
		$this->isLogin();
		$this->load->model('Tipo_nombramiento_model');
		$datos = array('nombramiento' => $this->Tipo_nombramiento_model->select_tipo_nombramiento());
		
		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_tipo_nombramiento', $datos);
		$this->load->view('footer');
	}

	public function fdtipo_nombramiento($tiponomb_id=0)
	{
		$this->isLogin();

		$this->load->model('Tipo_nombramiento_model');

        	$dato = array('nombramiento' =>$this->Tipo_nombramiento_model->delete_tipo_nombramiento($tiponomb_id));
    
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_tipo_nombramiento', $dato);
		$this->load->view('footer');
		redirect(base_url('cac/vrtipo_nombramiento'));
	}

	public function vctipoperiodo()
	{
		$this->isLogin();

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_periodo');
		$this->load->view('footer');
	}

	public function vrtipoperiodo()
	{
		$this->isLogin();

		$this->load->model('Tipo_periodo_model');
		$respuesta = $this->Tipo_periodo_model->select_tipo_periodo();
		$data = array('periodo' => $respuesta);

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_periodo', $data);
		$this->load->view('footer');
	}

	public function fdtipoperiodo($tipoperi_id=0)
	{
		$this->isLogin();

		$this->load->model('Tipo_periodo_model');
		$respuesta = $this->Tipo_periodo_model->delete_tipo_periodo($tipoperi_id);
		$data = array('periodo' => $respuesta);

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/listar_periodo', $data);
		$this->load->view('footer');
		redirect(base_url('cac/vrtipoperiodo'));
	}
	
	
	public function vctipo_titulo()
	{
		$this->isLogin();

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/crear_titulo');
		$this->load->view('footer');
	}

	public function vrtipo_titulo()
	{
		$this->isLogin();

		$this->load->model('Tipo_titulo_model');

		$datos = array('titulo' =>  $this->Tipo_titulo_model->select_tipo_titulo());

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_tipo_titulo', $datos);
		$this->load->view('footer');
	}

	public function fdtipo_titulo($tipotitulo_id=0)
	{
		$this->isLogin();

		$this->load->model('Tipo_titulo_model');
		$dato = array('titulo' =>$this->Tipo_titulo_model->delete_tipo_titulo($tipotitulo_id));

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_tipo_titulo', $dato);
		$this->load->view('footer');
		redirect(base_url('cac/vrtipo_titulo'));
	}

	public function vcusuario()
	{
		$this->isLogin();
		$this->load->model('Docente_model');
		$docs = $this->Docente_model->select_docente(); 
        $combos = array('docs' => $docs);

		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_usuario',$combos);
		$this->load->view('footer');
	}

	public function vcusuario_director()
	{
		$this->isLogin();
		$this->load->model('Responsable_model');
		$resp = $this->Responsable_model->select_resp(); 
        $combos = array('resp' => $resp);

		$this->load->view('header', array('title' => 'SID'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/crear_usuariodire',$combos);
		$this->load->view('footer');
	}

	public function fdusuario($usu_id =0)
	{
		$this->isLogin();
		$this->load->model('Usuario_model');
		$this->Usuario_model->delete_usuario($usu_id);
		$data = array('usuario' => $respuesta);

		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_usuario', $data);
		redirect(base_url('cac/vrusuario'));
		$this->load->view('footer');
	}

	public function vrusuario()
	{
		$this->isLogin();
		$this->load->model('Usuario_model');
		$respuesta = $this->Usuario_model->select_usuario_todo();
		$data = array('usuario' => $respuesta);
		
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/listar_usuario', $data);
		$this->load->view('footer');	
	}

	public function vuusuario($usu_id)
	{
		$this->isLogin();
		$this->load->model('Usuario_model');
		$usu=$this->Usuario_model->get_usuario($usu_id);
		$info = array('usu'=> $usu);
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/cambiar_usuario',$info);
		$this->load->view('footer');
		
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
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/ver_detalle',$datos);
		$this->load->view('footer.php');
		//}
		} else 
		{
			redirect(base_url('cac'));
		}
	}

	public function listado_docusuario()
	{
		$this->isLogin();
		$this->load->model('Carrera_model'); 
		$datos = array('carreras'=> $this->Carrera_model->select_carrera());
		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('cac/seleccion_carrera',$datos);
		$this->load->view('footer.php');
	}

	public function vucontrasena()
	{
		$this->isLogin();
		$this->load->view('header', array('title' => 'Sistema de Información Docente | Módulo CAC'));
		$this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
		$this->load->view('/cac/cambiar_contrasena');
		$this->load->view('footer');
	}


	public function vrdocentedirectorio()
       {
            $this->isLogin();

            $this->load->model('Docente_model');
            $lista=$this->Docente_model->select_docente_directorio();
            $data =  array('listar' => $lista);

            $this->load->view('header.php', array('title' => 'Sistema de Información Docente | Módulo CAC'));
            $this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
            $this->load->view('cac/listar_docente_directorio', $data);
            $this->load->view('footer.php');
        }

}
