<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Perioderpl extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rpl_cro');
		$this->cro = $this->load->database('cro', TRUE);
	}

	function index_get()
	{
	
		$set_rpl_awal = $this->rpl_cro->listtid();
		if($set_rpl_awal){
			$this->set_response([
                'status' => TRUE,
                'data'	=> $set_rpl_awal,
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

	function datarpl_get()
	{
		$tid 			= $this->get('tid');
		// $tgl_jadwal 	= date($this->get('tgl_rpl'));
		// $tgl_return 	= date($this->get('tgl_return'));

		$set_rpl_awal 	= $this->rpl_cro->rplawal_tid($tid);
		if($set_rpl_awal == null)
		{
			$this->set_response([
	                'status' => FALSE,
	                'message' => 'Tidak ada order untuk TID tersebut'
	            ], REST_Controller::HTTP_NOT_FOUND); // N
		}else{
			//ambil data return dari order rpl
			$return_order	= $this->rpl_cro->return_tid($set_rpl_awal->id_order);
			if($return_order == null){
				$this->set_response([
	                'status' => FALSE,
	                'message' => 'Return belum tiba untuk TID tersebut'
	            ], REST_Controller::HTTP_NOT_FOUND); // N
			}else{
				//ambil returnnya
				$rpl_awal 		= $this->rpl_cro->rpl_old($tid, $return_order->tglrpl);	


				if($rpl_awal == null){
					$tgl2 = date('Y-m-d', strtotime('-1 days', strtotime($return_order->tglrpl)));
					$rpl_awal 	= $this->rpl_cro->rpl_oldest($tid, $tgl2);
					if($set_rpl_awal || $return_order){
						$this->set_response([
			                'status' => TRUE,
			                'data_rpl'	=> $set_rpl_awal,
			                'data_return'	=> $return_order,
			                'data_rpl_old' => $rpl_awal,
			                // 'message' => 'User could not be found'
			            ], REST_Controller::HTTP_OK);
					}
					else
					{
						$this->set_response([
			                'status' => FALSE,
			                'message' => 'Data tidak ditemukan'
			            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
					}
				}else{
					if($set_rpl_awal || $return_order){
						$this->set_response([
			                'status' => TRUE,
			                'data_rpl'	=> $set_rpl_awal,
			                'data_return'	=> $return_order,
			                'data_rpl_old' => $rpl_awal,
			                // 'message' => 'User could not be found'
			            ], REST_Controller::HTTP_OK);
					}
					else
					{
						$this->set_response([
			                'status' => FALSE,
			                'message' => 'Data tidak ditemukan'
			            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
					}
				}
			}
		}
	}


}

/* End of file Periode_rpl.php */
/* Location: ./application/controllers/api/Periode_rpl.php */