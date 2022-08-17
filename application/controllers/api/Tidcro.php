<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Tidcro extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('tid_all_model');
		$this->croluar = $this->load->database('croluar', TRUE);
	}
	public function index_post()
	{
		$tid 		= $this->post('tid');
		// $codeuker 	= $this->post('codeuker');

		$set_tid = $this->tid_all_model->list_tid_all($tid);
		if($set_tid){
			$this->set_response([
                'status' => TRUE,
                'data'	=> $set_tid,
                // 'message' => 'User could not be found'
            ], REST_Controller::HTTP_OK);
		}
		else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'TID tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

	}

	public function index_get()
	{

		$set_tids = $this->tid_all_model->ambil_tid();

		if($set_tids){
			$this->set_response([
                'status' => TRUE,
                'data'	=> $set_tids,
                'total'	=> count($set_tids),
                // 'message' => 'User could not be found'
            ], REST_Controller::HTTP_OK);
		}
		else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'TID tidak ditemukan'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
	}

}

/* End of file Tidcro.php */
/* Location: ./application/controllers/api/Tidcro.php */