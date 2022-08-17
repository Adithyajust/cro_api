<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Tiketing extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('tiketing_model'));
	}

	function index_get()
	{
		$tiketing = $this->tiketing_model->gettiketing();
		// var_dump($tiketing);

		if($tiketing){
			$this->set_response([
                'status' => TRUE,
                'data'	=> $tiketing,
                // 'message' => 'User could not be found'
            ], REST_Controller::HTTP_OK);
		}
		else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Tiket tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

	function ambil_get()
	{
		$tid 			= $this->get('tid');
		$tgl_jadwal 	=  date($this->get('tgl_jadwal'));

		
		if($tid === null || $tgl_jadwal === null) {
			 $this->set_response([
                'status' => FALSE,
                'message' => 'Data anda tidak lengkap'
            ], REST_Controller::HTTP_BAD_REQUEST); 
		}
		else
		{
			$present_tiket 	= $this->tiketing_model->get_by_tid($tid, $tgl_jadwal);
			// var_dump($present_tiket);
			if($present_tiket)
			{
				$this->set_response([
                'status' => TRUE,
                'data'	=> $present_tiket,
                // 'message' => 'User could not be found'
            	], REST_Controller::HTTP_OK);

            	
			}
			else
			{
				$this->set_response([
                'status' => FALSE,
                'message' => 'Data tidak ditemukan'
            ], REST_Controller::HTTP_BAD_REQUEST); 
			}
		}

	}





}

/* End of file Tiketing.php */
/* Location: ./application/controllers/api/Tiketing.php */