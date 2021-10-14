<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cambiar extends CI_Controller {

    public function isLogin()
    {
        if (!$this->session->has_userdata('userid') && !$this->session->has_userdata('username') && !$this->session->has_userdata('permiso')) {
            redirect(base_url('sec/invalidar'));
        }
    }

	public function index()
	{
		show_404();
	}

	public function docente_formacion($docform_id)
	{
        $this->isLogin();

        $this->form_validation->set_rules('docform_rama', 'Rama', 'required|min_length[3]|max_length[128]');
        $this->form_validation->set_rules('docform_fechaeg', 'Fecha de Egreso','required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('docform_fechaing', 'Fecha de Ingreso','required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('inst_id', 'Institución','required|min_length[1]|max_length[11]|integer');
        $this->form_validation->set_rules('tipotitulo_id', 'Título','required|min_length[1]|max_length[11]|integer');
        $this->form_validation->set_rules('tipoform_id', 'Formación','required|min_length[1]|max_length[11]|integer');
        $this->form_validation->set_rules('tmf_id', 'Modalidad de Formación','required|min_length[1]|max_length[11]|integer');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('doc/vudocenteformacion/'.$docform_id));  

        }
        else
        {
        	$this->load->model('Docente_model');
            $docente = $this->Docente_model->select_docente();
            $this->load->model('Institucion_model');
            $institucion= $this->Institucion_model->select_institucion();
            $this->load->model('Tipo_formacion_model');
            $tformacion= $this->Tipo_formacion_model->select_tipo_formacion();
            $this->load->model('Tipo_titulo_model'); 
            $ttitulo = $this->Tipo_titulo_model->select_tipo_titulo();
            $this->load->model('Tipo_modalidad_formacion_model'); 
            $tmodalidad = $this->Tipo_modalidad_formacion_model->select_tipo_modalidad_formacion();

            $combos = array('docentes' => $docente, 'instituciones' => $institucion, 'tformaciones' => $tformacion,
                'ttitulos' => $ttitulo, 'tmodalidades' => $tmodalidad);

            $infodformacion['doc_id']= $this->input->post('doc_id');
            $infodformacion['inst_id']= $this->input->post('inst_id');
            $infodformacion['tipoform_id']= $this->input->post('tipoform_id');
            $infodformacion['tipotitulo_id']= $this->input->post('tipotitulo_id');
            $infodformacion['tmf_id']= $this->input->post('tmf_id');
            $infodformacion['docform_rama']= $this->input->post('docform_rama');
            $infodformacion['docform_fechaing']= $this->input->post('docform_fechaing');
            $infodformacion['docform_fechaeg']= $this->input->post('docform_fechaeg');
            $infodformacion['docform_ident']= $this->input->post('docform_ident');
            $this->load->model('Docente_formacion_model');
            $respuesta =$this->Docente_formacion_model->update_docente_formacion($infodformacion, $this->input->post('docform_id'));
            redirect(base_url('doc'));
        	}
	}


   public function docform_rh($docform_id = 0,$doc_id = 0, $letra = 'A')
   {
	   $this->isLogin();
       $this->form_validation->set_rules('docform_estatus', 'Estatus', 'required');
	   if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('rh/vudocenteformacion/'.$docform_id));  
        }
        else
        {
	    $this->load->model('Docente_model');

	        $infodformacion['doc_id']= $this->input->post('doc_id');
            $infodformacion['docform_estatus']= $this->input->post('docform_estatus');
            $this->load->model('Docente_formacion_model');
            $respuesta =$this->Docente_formacion_model->update_docente_formacion($infodformacion, $this->input->post('docform_id'));
	    redirect(base_url('rh/vrdetalle'.'/'.$this->input->post('doc_id').'/'.$letra));
	}
   }

    public function contacto($con_id)
    {
        $this->isLogin();

        $this->form_validation->set_rules('con_id','con_id', 'integer|required|min_length[1]|max_length[11]');   
        $this->form_validation->set_rules('doc_id','doc_id', 'integer|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('con_emailparti','Correo Particular', 'required|min_length[5]|max_length[48]|valid_email');     
        $this->form_validation->set_rules('con_emailinsti','Correo Institucional', 'required|min_length[5]|max_length[48]|valid_email');   
        $this->form_validation->set_rules('con_teleparti','Teléfono Particular', 'required|min_length[5]|max_length[13]|integer');
        $this->form_validation->set_rules('con_teleinsti','Teléfono Institucional', 'required|min_length[5]|max_length[13]|integer');

        if ($this->form_validation->run() == FALSE) 
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('doc/vucontacto/'.$con_id));
           
        }else
        {
            $data['doc_id']= $this->input->post('doc_id');
            $data['con_emailparti'] = $this->input->post('con_emailparti');
            $data['con_emailinsti'] = $this->input->post('con_emailinsti');
            $data['con_teleparti']= $this->input->post('con_teleparti');
            $data['con_teleinsti']= $this->input->post('con_teleinsti');

            $this->load->model('Contacto_model');        
            $respuesta = $this->Contacto_model->update_contacto($data, $this->input->post('con_id')); 
            redirect(base_url('doc'));  
        }
    }

    public function director($res_id)
    {
        $this->isLogin();

        $this->form_validation->set_rules('res_nombres', 'Nombre(s)', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('res_paterno', 'Paterno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('res_materno', 'Materno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('res_numemp', 'Num. Empleado', 'required|min_length[1]|max_length[3]|integer');
        

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vudirector/'.$res_id));
        }
        else
        {
            $this->load->model('Responsable_model');
            $this->load->model('Usuario_model');
            
            $inforesp['res_nombres']= mb_strtoupper($this->input->post('res_nombres'));
            $inforesp['res_paterno']= mb_strtoupper($this->input->post('res_paterno'));
            $inforesp['res_materno']= mb_strtoupper($this->input->post('res_materno'));
            $inforesp['res_numemp']= $this->input->post('res_numemp');
            $infousuario['usu_nombre']= $this->input->post('usu_nombre');
            $respuesta =$this->Responsable_model->update_director($inforesp,$this->input->post('res_id'));
            $respu =$this->Usuario_model->update_usuario($infousuario,$this->input->post('usu_id'));
            redirect(base_url('cac/vrdirector')); 
        }
    }

    public function docente($doc_id)
    {
        $this->isLogin();
        
        $this->form_validation->set_rules('doc_nombres', 'Nombre(s)', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_paterno', 'Paterno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_materno', 'Materno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_fechanac', 'Fecha Nac', 'required|min_length[6]|max_length[10]');
        $this->form_validation->set_rules('doc_numemp', 'Num. Empleado', 'required|min_length[1]|max_length[3]|integer');
        $this->form_validation->set_rules('doc_explab', 'Exp. Lab', 'required|min_length[1]|max_length[2]|integer');
           
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('doc/vudocente/'.$doc_id));     
        }
        else
        {
            $this->load->model('Docente_model');
            $infodocente['doc_nombres']= mb_strtoupper($this->input->post('doc_nombres'));
            $infodocente['doc_paterno']= mb_strtoupper($this->input->post('doc_paterno'));
            $infodocente['doc_materno']= mb_strtoupper($this->input->post('doc_materno'));
            $infodocente['doc_fechanac']=$this->input->post('doc_fechanac');
            //$infodocente['doc_fechain']= $this->input->post('doc_fechain');
            $infodocente['doc_numemp']= $this->input->post('doc_numemp');
            //$infodocente['doc_fotografia']= $this->input->post('doc_fotografia');
            $infodocente['doc_explab']= $this->input->post('doc_explab');
           // $infodocente['doc_estatus']= $this->input->post('doc_estatus');
            $respuesta =$this->Docente_model->update_docente($infodocente, $this->input->post('doc_id'));
            redirect(base_url('doc'));
        }

    }
   
   public function docente_rh ($doc_id = 0, $letra='A')
   {
	$this->isLogin();

        $this->form_validation->set_rules('doc_fechain', 'Fecha de Ingreso', 'required|min_length[6]|max_length[10]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('rh/vudocente/'.$doc_id));
        }
        else
        {
            $this->load->model('Docente_model');
            $infodocente['doc_fechain']= $this->input->post('doc_fechain');
            $respuesta =$this->Docente_model->update_docente($infodocente, $this->input->post('doc_id'));
		redirect(base_url('rh/vrdetalle'.'/'.$doc_id.'/'.$letra));
        }

    }

   public function docente_cac ($doc_id = 0, $letra = 'A')
   {
	$this->isLogin();
        $this->form_validation->set_rules('doc_estatus', 'Estatus', 'required|min_length[1]|max_length[2]|integer');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vudocente/'.$doc_id));
        }
        else
        {
            $this->load->model('Docente_model');
            $infodocente['doc_estatus']= $this->input->post('doc_estatus');
            $respuesta =$this->Docente_model->update_docente($infodocente, $this->input->post('doc_id'));
            redirect(base_url('cac/vrdetalle'.'/'.$doc_id.'/'.$letra));
        	}
	}

    public function contrasena()
    {
        $this->isLogin();
        $this->form_validation->set_rules('usu_contrasena', 'Contrasena', 'required|min_length[4]|max_length[8]|alpha_numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            if ($this->session->userdata('permiso') == 1) {
                $control = 'doc';
            }
            if ($this->session->userdata('permiso') == 5) {
                $control = 'cac';
            }
            redirect(base_url($control.'/vucontrasena'));   
        } else {
            $this->load->model('Usuario_model');
            $data['usu_contrasena']= $this->input->post('usu_contrasena');
            $this->Usuario_model->update_contrasena($data, $this->session->userdata('userid'));

            redirect(base_url());  
        }
    }

    public function academia($aca_id)
    {
        $this->isLogin();

       /* if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }*/

        $this->form_validation->set_rules('aca_nombre','Nombre de Academia', 'required|min_length[2]|max_length[64]');     

        if ($this->form_validation->run() === FALSE) 
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vuacademia/'.$aca_id));          
        }else
        { 
            $this->load->model('academia_model');
            $data['aca_nombre'] = $this->input->post('aca_nombre');
        

            $respuesta = $this->academia_model->update_academia($data, $this->input->post('aca_id')); 
            redirect(base_url('cac/vracademia'));  
        }
    }


    public function academia_miembros($aca_mie_id) 
    { 
        $this->isLogin();

         /*if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }*/

        $this->form_validation->set_rules('aca_mie_estatus','Estatus', 'required'); 
        $this->form_validation->set_rules('anio', 'Año ','trim|required|integer'); 
        
        if ($this->form_validation->run() === FALSE) 
        { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vuacademiamiembros/'.$aca_mie_id));
        }else 
        { 
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
                
            $data['tipoperi_id'] = $this->input->post('tipoperi_id');
            $data['aca_id']= $this->input->post('aca_id'); 
            $data['doc_id'] = $this->input->post('doc_id'); 
            $data['aca_mie_estatus'] = $this->input->post('aca_mie_estatus');
            $data['anio'] = $this->input->post('anio');
            $this->load->model('Academia_miembros_model'); 

            $respuesta = $this->Academia_miembros_model->update_academia_miembros($data, $this->input->post('aca_mie_id')); 
            redirect(base_url('cac/vracademiamiembros')); 
        } 
    }

    public function carrera($carr_id)
    {
        $this->isLogin();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('carr_nombre','Nombre', 'required|min_length[4]|max_length[64]');
        $this->form_validation->set_rules('carr_abreviatura','Abreviatura', 'required|min_length[2]|max_length[16]');
        $this->form_validation->set_rules('res_id','Responsable', 'required');
               
            if ($this->form_validation->run() === FALSE)
            {
                $this->session->set_flashdata('validation_errors', validation_errors());
                redirect(base_url('cac/vucarrera/'.$carr_id)); 
            }else
            {       
                $this->load->model('Carrera_model');
                
                $data['carr_id']= $this->input->post('carr_id');
                $data['carr_nombre'] = $this->input->post('carr_nombre');
                $data['carr_abreviatura'] = $this->input->post('carr_abreviatura');
                $data['res_id'] = $this->input->post('res_id');
                $respuesta = $this->Carrera_model->update_carrera($data, $this->input->post('carr_id'));
                redirect(base_url('cac/vrcarrera'));
            }     
    }

    public function cuerpo_academico($cue_id)
    {
        $this->isLogin();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('cue_nombre', 'Nombre', 'required|min_length[5]|max_length[128]');

            if ($this->form_validation->run() === FALSE) 
            {
                $this->session->set_flashdata('validation_errors', validation_errors());
                redirect(base_url('cac/vucuerpoacademico/'.$cue_id));
            }else
            {
                $data['tnh_id'] = $this->input->post('tnh_id');
                $data['carr_id'] = $this->input->post('carr_id');
                $data['cue_nombre'] = $this->input->post('cue_nombre');

                $this->load->model('Cuerpo_academico_model');
                $respuesta = $this->Cuerpo_academico_model->update_cuerpo_academico($data,$this->input->post('cue_id'));
                redirect(base_url('cac/vrcuerpoacademico'));
        }
    }

    public function cuerpo_academico_miembros($cam_id)
    {
        $this->isLogin();

        $this->load->library('form_validation');
        $this->form_validation->set_rules('cue_id','cue_id', 'integer|required|min_length[1]|max_length[11]');   
        $this->form_validation->set_rules('doc_id','doc_id', 'integer|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('tmc_id','tmc', 'integer|required|min_length[1]|max_length[11]'); 

        if ($this->form_validation->run() === FALSE) 
        { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vrcuerpo_academico_miembros/'.$cam_id));           
        }else
        {
            $this->load->model('Cuerpo_academico_miembros_model'); 
            
            $data['cam_id']= $this->input->post('cam_id');
            $data['cue_id']= $this->input->post('cue_id');
            $data['doc_id']= $this->input->post('doc_id');
            $data['tmc_id'] = $this->input->post('tmc_id');        
       
            $respuesta = $this->Cuerpo_academico_miembros_model->update_cuerpo_academico_miembros($data, $this->input->post('cam_id')); 
            redirect(base_url('cac/vrcuerpo_academico_miembros/'));  
        }
    }


    public function estado($est_id) 
    { 
        $this->isLogin();
        $this->form_validation->set_rules('est_nombre', 'Nombre ','required|min_length[5]|max_length[64]');
        $this->form_validation->set_rules('est_codigo', 'Código ','integer|required|min_length[1]|max_length[4]');

        
        if ($this->form_validation->run() === FALSE) 
        { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vuestado/'.$est_id)); 
        }else 
        {  
            $this->load->model('Estado_model'); 
            $data['est_nombre'] = $this->input->post('est_nombre'); 
            $data['est_codigo']= $this->input->post('est_codigo');
           
            $respuesta = $this->Estado_model->update_estado($data, $this->input->post('est_id')); 
            redirect(base_url('cac/vrestado')); 
        } 
    }


    public function municipio($mun_id) 
    { 
        $this->isLogin();

        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('mun_nombre', 'Nombre', 'required|min_length[5]|max_length[128]');
        if ($this->form_validation->run() === FALSE) 
        { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vumunicipio/'.$mun_id)); 
        }else 
        {  
            $data['est_id']= $this->input->post('est_id'); 
            $data['mun_nombre'] = $this->input->post('mun_nombre'); 
            $this->load->model('Municipio_model'); 

            $respuesta = $this->Municipio_model->update_municipio($data, $this->input->post('mun_id')); 
            redirect(base_url('cac/vrmunicipio')); 
        } 
    }

    public function nivel($nivel_id) 
    { 
        $this->isLogin();

        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('nivel_desc', 'Descripción ','required|min_length[3]|max_length[32]');
        
        if ($this->form_validation->run() === FALSE) 
        { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vunivel/'.$nivel_id));
        }else 
        { 
            $this->load->model('Nivel_model'); 
            $data['nivel_desc']= $this->input->post('nivel_desc');
            $respuesta = $this->Nivel_model->update_nivel($data, $this->input->post('nivel_id')); 
            redirect(base_url('cac/vrnivel')); 
        } 
    }

    public function docente_categoria($doccat_id) 
    { 
        $this->isLogin();

        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('doccat_fecha','Fecha', 'required'); 
        
        if ($this->form_validation->run() === FALSE) 
        { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vudocentecategoria/'.$doccat_id)); 
        }else 
        { 
        
        /*$this->load->model('Tipo_categoria_model');  
        $categoria = $this->Tipo_categoria_model->select_tipo_categoria();
        $this->load->model('Tipo_nombramiento_model');
        $nombramiento = $this->Tipo_nombramiento_model->select_tipo_nombramiento();
        $this->load->model('Docente_model');
        $docente = $this->Docente_model->select_docente();  

        $combos = array(
                        'categorias'   => $categoria, 
                        'nombramientos'=> $nombramiento, 
                        'docentes'     => $docente 
                      ); */
        
            $data['doc_id']= $this->input->post('doc_id'); 
            $data['tiponomb_id'] = $this->input->post('tiponomb_id'); 
            $data['tipocat_id'] = $this->input->post('tipocat_id');
            $data['doccat_fecha'] = $this->input->post('doccat_fecha');
            $this->load->model('Docente_categoria_model'); 

            $respuesta = $this->Docente_categoria_model->update_docente_categoria($data, $this->input->post('doccat_id')); 
            redirect(base_url('cac/vrdocentecategoria/')); 
        } 
    }


    public function institucion($inst_id)
    {
        $this->isLogin();
        $this->form_validation->set_rules('inst_nombre', 'Nombre de Institución', 'required|min_length[3]|max_length[64]');
        if ($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vuinstitucion/'.$inst_id));   
        }
        else
        {
            $this->load->model('Institucion_model');
            $infoinstitucion['inst_nombre'] = $this->input->post('inst_nombre');
            $respuesta =$this->Institucion_model->update_institucion($infoinstitucion, $this->input->post('inst_id'));
            redirect(base_url('cac/vrinstitucion/'));
        }
    }

    public function area($are_id)
    {
        $this->isLogin();
        $this->form_validation->set_rules('are_nombre', 'Nombre ', 'required|min_length[3]|max_length[48]');
        if ($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vuarea/'.$are_id));        
        }
        else
        {
            $this->load->model('Area_model');
            $infoarea['are_nombre'] = $this->input->post('are_nombre');
            $respuesta =$this->Area_model->update_area($infoarea, $this->input->post('are_id'));
            redirect(base_url('cac/vrarea/'));
        }

    }

    public function tipo_periodo($tipoperi_id)
    {
        $this->isLogin();
        $this->form_validation->set_rules('tipoperi_periodo', 'Tipo Periodo', 'required|min_length[10]|max_length[32]');

         if ($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vutipoperiodo/'.$tipoperi_id));     
        }
        else
        {
            $this->load->model('Tipo_periodo_model');
            $infotipoperi['tipoperi_periodo'] = $this->input->post('tipoperi_periodo');
            $respuesta =$this->Tipo_periodo_model->update_tipo_periodo($infotipoperi, $this->input->post('tipoperi_periodo'));
            redirect(base_url('cac/vrtipoperiodo'));
        }
    }

    public function usuario($usu_id)
    {
        $this->isLogin();
        $this->form_validation->set_rules('usu_nombre', 'Nombre de usuario', 'required|min_length[4]|max_length[32]|alpha_dash');
        $this->form_validation->set_rules('usu_contrasena', 'Contraseña', 'required|min_length[3]|max_length[32]|alpha_dash');
        if ($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vuusuario/'.$usu_id)); 
        }
        else
        {
            $infousuario['usu_nombre'] = $this->input->post('usu_nombre');
            $infousuario['usu_contrasena']= $this->input->post('usu_contrasena');
            $infousuario['usu_permiso']= $this->input->post('usu_permiso'); 
            $this->load->model('Usuario_model');
            $respuesta =$this->Usuario_model->update_usuario($infousuario, $this->input->post('usu_id'));
            redirect(base_url('cac/vrusuario/'));
        }
    }

}
