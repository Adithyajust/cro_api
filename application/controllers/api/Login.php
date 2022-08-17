<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model(array('login_model','cabang_model'));
		$this->EoBricash = $this->load->database('dio', TRUE);
	}
	function index_post()
	{
		$pn			= $this->post('pn_user');
		$password	= $this->post('password');
		$cpassword 	= MD5($password);

		// cetak_die($password);
		
		if($pn == null || $password == null){
			$this->set_response([
                'status' => FALSE,
                'message' => 'Field isian Kosong'
            ], REST_Controller::HTTP_NOT_FOUND); // N
		}else{
			//lanjutkan
			$set_login = $this->login_model->get_login($pn, $cpassword);
			$get_cabang = $this->cabang_model->get_cabang($pn, $cpassword);
			
			if($set_login == null){
				$this->set_response([
	                'status' => FALSE,
	                'message' => 'Data tidak ditemukan'
	            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
			}else{
				$this->set_response([
                'status' => TRUE,
                'profile_karyawan' 	=> $set_login,
                'unit_kerja'	  	=> $get_cabang,
                // 'message' => 'User could not be found'
            ], REST_Controller::HTTP_OK);
			}
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/api/Login.php */