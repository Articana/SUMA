<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargar extends CI_Controller {

	public function isLogin()
    {
        if (!$this->session->has_userdata('userid') && !$this->session->has_userdata('username') && !$this->session->has_userdata('permiso')) {
            redirect(base_url('sec/invalidar'));
        }
    }

	public function cv()
	{
		$this->isLogin();

		$permiso = $this->session->userdata('permiso');
        if ($permiso != 1) {
            show_404();
        }

		$usu_id = $this->session->userdata('userid');
		$this->load->model('docente_model');
		$doc = $this->docente_model->select_where_docente_usu_id($usu_id);
		
		$file = 'cv-doc-' . $doc[0]->doc_numemp . '.pdf';
		$dir = $doc[0]->doc_cvdir;
		//$dir = md5($file);

		if (!is_dir('./upload/'.$dir)) {
			mkdir('./upload/'.$dir);
		}

		// Configuracion de la carga de archivos
		$config['allowed_types']	= 'pdf';
		$config['file_name']		= $file;
		$config['file_ext_tolower']	= TRUE;
		$config['max_size']			= 2048;
		$config['overwrite']		= TRUE;
		$config['upload_path']		= './upload/'.$dir;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('archivo'))
		{
			$this->session->set_flashdata('upload_error', $this->upload->display_errors());
			redirect(base_url('doc/vccargarcv'));
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->session->set_flashdata('upload_msg', 'El archivo se cargó con exito!');
			redirect(base_url('doc/vccargarcv'));
		}
	}

	public function cvdoc($doc_numemp=0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');

        if ($permiso == 1 || $permiso == 3 || $permiso == 5 || $permiso == 9 || $permiso == 11) {
            $this->load->model('docente_model');
			$doc = $this->docente_model->select_where_empleado($doc_numemp);
			$file = 'cv-doc-' . $doc[0]->doc_numemp . '.pdf';
			$dir = $doc[0]->doc_cvdir;

			if (is_dir('./upload/'.$dir)) {
				if (file_exists('./upload/'.$dir.'/'.$file)) {
					header('Content-type: application/pdf');
					readfile('./upload/'.$dir.'/'.$file);
				} else {
					show_404();
					// echo '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Error</title><script>alert("El archivo o directorio no existe!");history.go(-1);</script></head><body></body></html>';
				}
			} else {
				show_404();
				// echo '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Error</title><script>alert("El archivo o directorio no existe!");history.go(-1);</script></head><body></body></html>';
			}
        } else {
			// show_404(); // no hay permiso
			redirect(base_url('sec/invalidar'));
		}
	}

}

/* End of file Cargar.php */
/* Location: ./application/controllers/cat/Cargar.php */
