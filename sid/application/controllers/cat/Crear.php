<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crear extends CI_Controller {

    public function isLogin()
    {
        if (!$this->session->has_userdata('userid') && !$this->session->has_userdata('username') && !$this->session->has_userdata('permiso')) {
            redirect(base_url('sec/invalidar'));
        }
    }

    public function academia()
    {
        $this->isLogin();

        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('aca_nombre','Nombre de Academia', 'required|min_length[5]|max_length[64]');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcacademia'));
        } else {
            $this->load->model('Academia_model'); 
            $data['aca_nombre'] = $this->input->post('aca_nombre');
            $respuesta = $this->Academia_model->insert_academia($data);
            redirect(base_url('cac/vracademia'));
        }   
    }

    public function academia_miembros()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('aca_mie_estatus', 'Estatus ','required|integer');
        $this->form_validation->set_rules('anio', 'Año ','required|integer');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcacademiamiembros'));

        } else {
            $this->load->model('Academia_miembros_model');
            $data['tipoperi_id'] = $this->input->post('tipoperi_id');
            $data['aca_id'] = $this->input->post('aca_id');
            $data['doc_id'] = $this->input->post('doc_id');
            $data['aca_mie_estatus'] = $this->input->post('aca_mie_estatus');
            $data['anio'] = $this->input->post('anio');

            $respuesta = $this->Academia_miembros_model->insert_academia_miembros($data);
            redirect(base_url('cac/vracademiamiembros'));
        }
    }

    public function area()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('are_nombre', 'Nombre del Área', 'required|min_length[3]|max_length[64]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcarea'));
        } else {
            $this->load->model('Area_model');
            $infoarea['are_nombre'] = $this->input->post('are_nombre');
            $respuesta =$this->Area_model->insert_area($infoarea);
            redirect(base_url('cac/vrarea'));
        }
    }

     public function carga()
    {
        $this->isLogin();   
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('doc_id','doc_id', 'integer|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('tipoperi_id','Periodo', 'integer|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('are_id','Área', 'integer|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('car_grupo_tutorado','Grupo Totorado', 'required|min_length[1]|max_length[48]');
        $this->form_validation->set_rules('car_hrs_frente_grupo','Total de Horas frente a Grupo', 'integer|required|min_length[1]|max_length[8]');
        $this->form_validation->set_rules('car_hrs_estadia','Total de Horas de estadía', 'integer|required|min_length[1]|max_length[8]');
        $this->form_validation->set_rules('car_hrs_desarrollo_mat_didactico','Total de Horas de desarrollo de material didáctico', 'integer|required|min_length[1]|max_length[8]');
        $this->form_validation->set_rules('car_hrs_academia_ca','Total de Horas de académia', 'integer|required|min_length[1]|max_length[8]');
        $this->form_validation->set_rules('car_hrs_apoyo_academ_admin','Total de Horas de apoyo académico ', 'integer|required|min_length[1]|max_length[8]');
        $this->form_validation->set_rules('car_hrs_total_hsm','Total de Horas de h/s/m', 'integer|required|min_length[1]|max_length[8]');
        $this->form_validation->set_rules('car_entrega_pro_rep_direccion','Fecha de entrega de reporte a Dirección', 'required|min_length[6]|max_length[10]');
        $this->form_validation->set_rules('car_anio','Año', 'integer|required|min_length[1]|max_length[6]');
              

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vccarga/'. $this->input->post('doc_id')));
        } else {
            $this->load->model('Carga_model'); 
            $data['doc_id']= $this->input->post('doc_id');
            $data['tipoperi_id']= $this->input->post('tipoperi_id');
            $data['are_id'] = $this->input->post('are_id');
            $data['car_grupo_tutorado'] = $this->input->post('car_grupo_tutorado');
            $data['car_hrs_frente_grupo'] = $this->input->post('car_hrs_frente_grupo');
            $data['car_hrs_estadia'] = $this->input->post('car_hrs_estadia');
            $data['car_hrs_desarrollo_mat_didactico'] = $this->input->post('car_hrs_desarrollo_mat_didactico');
            $data['car_hrs_academia_ca'] = $this->input->post('car_hrs_academia_ca');
            $data['car_hrs_apoyo_academ_admin'] = $this->input->post('car_hrs_apoyo_academ_admin');
            $data['car_hrs_total_hsm'] = $this->input->post('car_hrs_total_hsm');
            $data['car_entrega_pro_rep_direccion'] = $this->input->post('car_entrega_pro_rep_direccion');
            $data['car_anio'] = $this->input->post('car_anio');
            $respuesta = $this->Carga_model->insert_carga($data);
            redirect(base_url('cac/filtro/'. $this->input->post('letra')));
        }
    }

    public function carrera()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('carr_nombre','Nnombre', 'required|min_length[5]|max_length[64]');
        $this->form_validation->set_rules('carr_abreviatura','Abreviatura', 'required|min_length[2]|max_length[16]'); 
        $this->form_validation->set_rules('res_id','Responsable', 'required');         

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vccarrera'));             
        } else {
            $this->load->model('Carrera_model');
            $data['carr_id']= $this->input->post('carr_id'); 
            $data['carr_nombre']= $this->input->post('carr_nombre');  
            $data['carr_abreviatura']= $this->input->post('carr_abreviatura');
            $data['res_id']= $this->input->post('res_id');
    
            $respuesta = $this->Carrera_model->insert_carrera($data);
            redirect(base_url('cac/vrcarrera'));     
        }
    }

    public function cuerpo_academico()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('cue_nombre', 'Nombre','required|min_length[5]|max_length[128]');
        $this->form_validation->set_rules('tnh_id', 'Nivel de Habilitación','required|min_length[1]|max_length[11]|integer');
        $this->form_validation->set_rules('carr_id', 'Carrera','required|min_length[1]|max_length[11]|integer');
            
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vccuerpoacademico'));
            
        } else {
            $this->load->model('Cuerpo_academico_model');
           
            $infocuerpo['tnh_id'] = $this->input->post('tnh_id');
            $infocuerpo['carr_id'] = $this->input->post('carr_id');
            $infocuerpo['cue_nombre'] = $this->input->post('cue_nombre');
            $respuesta = $this->Cuerpo_academico_model->insert_cuerpo_academico($infocuerpo);
            redirect(base_url('cac/vrcuerpoacademico'));  
        }
    }

    public function cuerpo_academico_miembros()
    {
        $this->isLogin();  
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }  
        $this->form_validation->set_rules('cue_id','cue_id', 'integer|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('doc_id','doc', 'integer|required|min_length[1]|max_length[11]');
        $this->form_validation->set_rules('tmc_id','tmc_id', 'integer|required|min_length[1]|max_length[11]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vccuerpo_academico_miembros'));
        } else { 
            $this->load->model('Cuerpo_academico_miembros_model');
            $data['cam_id']= $this->input->post('cam_id');
            $data['cue_id']= $this->input->post('cue_id');
            $data['doc_id']= $this->input->post('doc_id');
            $data['tmc_id']= $this->input->post('tmc_id');
            $respuesta = $this->Cuerpo_academico_miembros_model->insert_cuerpo_academico_miembros($data);
            redirect(base_url('cac/vrcuerpo_academico_miembros'));    
        }
    }

    public function director()
    {
        $this->isLogin();

        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

        $this->form_validation->set_rules('res_nombres', 'Nombre(s)', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('res_paterno', 'Paterno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('res_materno', 'Materno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('res_numemp', 'Num. Empleado', 'required|min_length[1]|max_length[3]|integer');
        

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcdirector'));
        } else {
            $this->load->model('Responsable_model');
            
            $inforesp['res_nombres']= mb_strtoupper($this->input->post('res_nombres'));
            $inforesp['res_paterno']= mb_strtoupper($this->input->post('res_paterno'));
            $inforesp['res_materno']= mb_strtoupper($this->input->post('res_materno'));
            $inforesp['res_numemp']= $this->input->post('res_numemp');

            $usuario['usu_nombre'] = 'UTDR' . $inforesp['res_numemp'];
            $usuario['usu_contrasena'] = substr(md5($usuario['usu_nombre']), 0, 8);
            $usuario['usu_permiso'] = '11';
            $respuesta =$this->Responsable_model->insert_director($inforesp, $usuario);
            redirect(base_url('cac/vrdirector')); 
        }
    }

    public function docente()
    {
        $this->isLogin();

        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

        $this->form_validation->set_rules('doc_nombres', 'Nombre(s)', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_paterno', 'Paterno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_materno', 'Materno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_fechanac', 'Fecha Nac', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('doc_fechain', 'Fecha Inicio', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('doc_numemp', 'Num. Empleado', 'required|min_length[1]|max_length[3]|integer');
        $this->form_validation->set_rules('doc_explab', 'Exp. Lab', 'required|min_length[1]|max_length[2]|integer');
        $this->form_validation->set_rules('doc_estatus', 'Estatus', 'required|min_length[1]|max_length[2]|integer');
        $this->form_validation->set_rules('con_emailparti', 'Correo Particular', 'required|min_length[10]|max_length[48]|valid_email');
        $this->form_validation->set_rules('con_emailinsti', 'Correo Institucional', 'required|min_length[10]|max_length[48]|valid_email'); 
        $this->form_validation->set_rules('con_teleinsti', 'Teléfono Institucional', 'required|min_length[7]|max_length[13]|integer'); 
        $this->form_validation->set_rules('con_teleparti', 'Teléfono Particular', 'required|min_length[7]|max_length[13]|integer'); 
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcdocente'));
        } else {
            $this->load->model('Docente_model');
            $this->load->model('Carrera_model');
            $carreras = $this->Carrera_model->select_carrera(); 

            $combos = array('carreras' => $carreras); 

            $infodocente['doc_nombres']= mb_strtoupper($this->input->post('doc_nombres'));
            $infodocente['doc_paterno']= mb_strtoupper($this->input->post('doc_paterno'));
            $infodocente['doc_materno']= mb_strtoupper($this->input->post('doc_materno'));
            $infodocente['doc_fechanac']=$this->input->post('doc_fechanac');
            $infodocente['doc_fechain']= $this->input->post('doc_fechain');
            $infodocente['doc_numemp']= $this->input->post('doc_numemp');
            $infodocente['doc_fotografia']=$infodocente['doc_numemp'].'.jpg';
            $infodocente['doc_explab']= $this->input->post('doc_explab');
            $infodocente['doc_estatus']= $this->input->post('doc_estatus');
            $infodocente['carr_id']= $this->input->post('carr_id');
            $infocontacto['con_emailparti']= $this->input->post('con_emailparti');
            $infocontacto['con_emailinsti']= $this->input->post('con_emailinsti');
            $infocontacto['con_teleparti']= $this->input->post('con_teleparti');
            $infocontacto['con_teleinsti']= $this->input->post('con_teleinsti');

            $infodocente['doc_cvdir']= md5($infodocente['doc_fechanac'].$infodocente['doc_numemp']);

            $usuario['usu_nombre'] = 'UTDC' . $infodocente['doc_numemp'];
            $usuario['usu_contrasena'] = substr(md5($usuario['usu_nombre']), 0, 8);
            $usuario['usu_permiso'] = '1';

            $respuesta =$this->Docente_model->insert_docente($infodocente,$infocontacto, $usuario);

            $file = $infodocente['doc_fotografia'];
            $dir = $infodocente['doc_cvdir'];

            if (!is_dir('./upload/'.$dir)) {
                mkdir('./upload/'.$dir);
            }

            // Configuracion de la carga de archivos
            $config['file_type']        = 'image/jpeg';
            $config['file_ext']         = '.jpg';
            $config['image_type']       = 'jpeg';
            $config['allowed_types']    = 'jpg';
            $config['file_name']        = $file;
            $config['file_ext_tolower'] = TRUE;
            $config['max_size']         = 2048;
            $config['overwrite']        = TRUE;
            $config['upload_path']      = './upload/'.$dir;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('doc_fotografia')) {
                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
                redirect(base_url('cac/vcdocente'));
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            redirect(base_url('cac')); 
        }
    }

    public function docente_categoria()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }

        $this->form_validation->set_rules('doccat_fecha', 'Fecha', 'required');
        $this->form_validation->set_rules('doc_id', 'Docente','required|min_length[1]|max_length[11]|integer');
        $this->form_validation->set_rules('tiponomb_id', 'Tipo de Nombramiento','required|min_length[1]|max_length[11]|integer');
        $this->form_validation->set_rules('tipocat_id', 'Tipo Categoría','required|min_length[1]|max_length[11]|integer');
        if($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcdocentecategoria/' . $this->input->post('doc_id')));

        } else {
            $this->load->model('Docente_categoria_model');
            $data['doc_id'] = $this->input->post('doc_id');
            $data['tiponomb_id'] = $this->input->post('tiponomb_id');
            $data['tipocat_id'] = $this->input->post('tipocat_id');
            $data['doccat_fecha'] = $this->input->post('doccat_fecha');
		
            $this->Docente_categoria_model->insert_docente_categoria($data);
            redirect(base_url('cac/filtro/'. $this->input->post('letra')));
        }
    }

    public function  docente_formacion()
    {
        $this->isLogin();

        $permiso = $this->session->userdata('permiso');
        if ($permiso != 1 ) {
            redirect(base_url('sec/invalidar'));
        }

        $usu_id = $this->session->userdata('userid');
     /*echo $usu_id;*/

        $this->load->library('form_validation');
        $this->form_validation->set_rules('docform_rama', 'Rama', 'required|min_length[3]|max_length[128]');
        $this->form_validation->set_rules('docform_fechaeg', 'Fecha de Egreso','required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('docform_fechaing', 'Fecha de Ingreso','required|min_length[10]|max_length[10]');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('doc/vcdocenteformacion'));
        } else {
	        $this->load->model('Docente_model');
            $infodformacion['doc_id']= $this->Docente_model->select_where_docente_usu_id($usu_id)[0]->doc_id;
            $infodformacion['inst_id']= $this->input->post('inst_id');
            $infodformacion['tipoform_id']= $this->input->post('tipoform_id');
            $infodformacion['tipotitulo_id']= $this->input->post('tipotitulo_id');
            $infodformacion['tmf_id']= $this->input->post('tmf_id');
            $infodformacion['docform_rama']= $this->input->post('docform_rama');
            $infodformacion['docform_fechaing']= $this->input->post('docform_fechaing');
            $infodformacion['docform_fechaeg']= $this->input->post('docform_fechaeg');
            $infodformacion['docform_ident']= $this->input->post('docform_ident');
            $this->load->model('Docente_formacion_model');
            $respuesta =$this->Docente_formacion_model->insert_docente_formacion($infodformacion);

            redirect(base_url('doc'));
        }
    }

	public function domicilio()
	{
        $this->isLogin();

        $permiso = $this->session->userdata('permiso');
        if ($permiso != 1 ) {
            redirect(base_url('sec/invalidar'));
        }

		$this->load->library('form_validation');  
        $this->form_validation->set_rules('dom_calle','Calle', 'required|min_length[4]|max_length[48]');   
        $this->form_validation->set_rules('dom_numero','Número', 'integer|required|min_length[1]|max_length[6]');
        $this->form_validation->set_rules('dom_postal','Código postal', 'integer|required|min_length[1]|max_length[8]');    
        $this->form_validation->set_rules('dom_fraccionamiento','Fraccionamiento', 'required|min_length[4]|max_length[48]');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('doc/vcdomicilio'));
        } else {
            $this->load->model('Domicilio_model'); 
           	$data['doc_id']= $this->input->post('doc_id');
            $data['dom_calle'] = $this->input->post('dom_calle');
            $data['dom_numero']= $this->input->post('dom_numero');
            $data['dom_postal'] = $this->input->post('dom_postal');
            $data['mun_id'] = $this->input->post('mun_id');
            $data['dom_fraccionamiento']= $this->input->post('dom_fraccionamiento');						
            $this->Domicilio_model->insert_domicilio($data);
            redirect(base_url('doc'));
        }
	}

    public function estado()
    {
        $this->isLogin();  
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('est_nombre', 'Nombre de Estado ','required|min_length[5]|max_length[64]');
        $this->form_validation->set_rules('est_codigo', 'Código ','integer|required|min_length[1]|max_length[4]');

        if($this->form_validation->run() == FALSE) { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcestado')); 
        } else {
            $this->load->model('Estado_model');
            $data['est_nombre'] = $this->input->post('est_nombre');
            $data['est_codigo'] = $this->input->post('est_codigo');
            $respuesta = $this->Estado_model->insert_estado($data);
            redirect(base_url('cac/vrestado'));
        }
    }
    
    public function institucion()
    {
        $this->isLogin();

        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5 && $permiso != 1) {
            redirect(base_url('sec/invalidar'));
        }

        $this->form_validation->set_rules('inst_nombre', 'Nombre de Institución', 'required|min_length[3]|max_length[48]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            if($permiso == 5)$control='cac/vcinstitucion';
            if($permiso == 1)$control='doc/vcinstitucion';
            redirect(base_url($control));
        } else {
            $this->load->model('Institucion_model');
            $infoinstitucion['inst_nombre'] = $this->input->post('inst_nombre');
            $this->Institucion_model->insert_institucion($infoinstitucion);
            if($permiso == 5)$control='cac/vrinstitucion';
            if($permiso == 1)$control='doc';

            redirect(base_url($control));
        }
    }

    public function municipio()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5 && $permiso != 1) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('mun_nombre', 'Nombre', 'required|min_length[5]|max_length[128]');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            if($permiso == 5)$control='cac/vcmunicipio';
            if($permiso == 1)$control='doc/vcmunicipio';
            redirect(base_url($control));
        } else {
            $this->load->model('Estado_model'); 
            $estado = $this->Estado_model->select_estado(); 
            $combos = array('estados' => $estado);        
            $this->load->model('Municipio_model');
            $data['mun_nombre'] = $this->input->post('mun_nombre');
            $data['est_id'] = $this->input->post('est_id');
            $respuesta = $this->Municipio_model->insert_municipio($data);
            if($permiso == 5)$control='cac/vrmunicipio';
            if($permiso == 1)$control='doc/vcmunicipio';
            redirect(base_url($control));
        }
    }

    public function nivel()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('nivel_desc', 'Descripción ','required|min_length[3]|max_length[32]');
        if($this->form_validation->run() == FALSE) { 
           $this->session->set_flashdata('validation_errors', validation_errors());
           redirect(base_url('cac/vcnivel'));
        } else {
            $this->load->model('Nivel_model');
            $data['nivel_desc'] = $this->input->post('nivel_desc');
            $respuesta = $this->Nivel_model->insert_nivel($data);
            redirect(base_url('cac/vrnivel'));
        }
    }

    public function tipocategoria()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('tipocat_nombre', 'Nombre ','required|min_length[5]|max_length[255]');

        if($this->form_validation->run() == FALSE)
        { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vctipocategoria')); 
        } else {
            $this->load->model('Tipo_categoria_model');
            $data['tipocat_nombre'] = $this->input->post('tipocat_nombre');
            $respuesta = $this->Tipo_categoria_model->insert_tipo_categoria($data);
            redirect(base_url('cac/vrtipocategoria'));
        }
    }


    public function formacion()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('tipoform_nombre', 'Nombre ','required|min_length[5]|max_length[255]');

        if($this->form_validation->run() == FALSE)
        { 
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vctipoformacion'));

        }else
        {
            $this->load->model('Tipo_formacion_model');
            $data['tipoform_nombre'] = $this->input->post('tipoform_nombre');
            $respuesta = $this->Tipo_formacion_model->insert_tipo_formacion($data);
            redirect(base_url('cac/vrtipoformacion'));
        }
    }

    public function modalidad_formacion()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('tmf_descripcion','Descripción', 'required|min_length[5]|max_length[32]');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcmodalidad'));                       
        } else { 
            $this->load->model('Tipo_modalidad_formacion_model');
            $dato['tmf_id']= $this->input->post('tmf_id');  
            $dato['tmf_descripcion']= $this->input->post('tmf_descripcion'); 
            $respuesta = $this->Tipo_modalidad_formacion_model->insert_modalidad_formacion($dato);
            redirect(base_url('cac/vrmodalidad'));
        }
    }


    public function tipo_nivel_habilitacion()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('tnh_descripcion','Descripción', 'required|min_length[5]|max_length[32]');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vctipo_nivel_habilitacion'));                      
        } else {  
            $this->load->model('Nivel_habilitacion_model');

            $data['tnh_id']= $this->input->post('tnh_id');  
            $data['tnh_descripcion']= $this->input->post('tnh_descripcion'); 

            $respuesta = $this->Nivel_habilitacion_model->insert_tipo_nivel_habilitacion($data);
            redirect(base_url('cac/vrtipo_nivel_habilitacion'));     
        }
    }

    public function tipo_nombramiento()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('tiponomb_nombre','Tipo Nombramiento', 'required|min_length[5]|max_length[32]');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vctipo_nombramiento'));
        } else {  
            $this->load->model('Tipo_nombramiento_model');

            $data['tiponomb_id']= $this->input->post('tiponomb_id');  
            $data['tiponomb_nombre']= $this->input->post('tiponomb_nombre'); 

            $respuesta = $this->Tipo_nombramiento_model->insert_tipo_nombramiento($data);
            redirect(base_url('cac/vrtipo_nombramiento'));     
        }
    }

    public function tipo_periodo()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('tipoperi_periodo', 'Periodo', 'required|min_length[4]|max_length[32]');
        if ($this->form_validation->run() === FALSE) {
           $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vctipoperiodo'));      
        } else {
            $this->load->model('Tipo_periodo_model');
            $infotipoperi['tipoperi_periodo'] = $this->input->post('tipoperi_periodo');
            $respuesta =$this->Tipo_periodo_model->insert_tipo_periodo($infotipoperi);
            redirect(base_url('cac/vrtipoperiodo'));
        }
    }

    public function tipo_titulo()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->form_validation->set_rules('tipotitulo_nombre','Título', 'required|min_length[5]|max_length[32]');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vctipo_titulo'));
        } else {
            $this->load->model('Tipo_titulo_model');

            $dato['tipotitulo_id']= $this->input->post('tipotitulo_id');  
            $dato['tipotitulo_nombre']= $this->input->post('tipotitulo_nombre'); 

            $respuesta = $this->Tipo_titulo_model->insert_tipo_titulo($dato);
            redirect(base_url('cac/vrtipo_titulo')); 
        }
    }

    public function usuario_dire()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usu_nombre', 'Nombre de usuario', 'required|min_length[4]|max_length[8]');
        $this->form_validation->set_rules('usu_contrasena', 'Contraseña', 'required|min_length[4]|max_length[8]');
        $this->form_validation->set_rules('res_numemp', 'Num. Empleado', 'required|min_length[1]|max_length[3]|integer');
           
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcusuario'));      
        } else {
            $this->load->model('Usuario_model');
            $infousuario['usu_nombre'] = $this->input->post('usu_nombre');
            $infousuario['usu_contrasena'] = $this->input->post('usu_contrasena');
            $infousuario['usu_permiso']= $this->input->post('usu_permiso');
            $res_numemp = $this->input->post('res_numemp');
            $respuesta =$this->Usuario_model->insert_usuario($infousuario,$res_numemp);
            redirect(base_url('cac/vrdirector'));
        }
    }

    public function usuario()
    {
        $this->isLogin();
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5) {
            redirect(base_url('sec/invalidar'));
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usu_nombre', 'Nombre de usuario', 'required|min_length[4]|max_length[8]');
        $this->form_validation->set_rules('usu_contrasena', 'Contraseña', 'required|min_length[4]|max_length[8]');
           
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('cac/vcusuario'));      
        } else {
            $this->load->model('Usuario_model');
            $infousuario['usu_nombre'] = $this->input->post('usu_nombre');
            $infousuario['usu_contrasena'] = $this->input->post('usu_contrasena');
            $infousuario['usu_permiso']= $this->input->post('usu_permiso');
            $respuesta =$this->Usuario_model->insert_usuario_cac($infousuario);
            redirect(base_url('cac/vrusuario'));
        }
    }

}
