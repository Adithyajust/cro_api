<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Perioderplold extends REST_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('rpl_cro');
		$this->load->model('flm_cro');
		$this->cro = $this->load->database('cro', TRUE);
	}

	public function index_get()
	{
		// cetak_die('sampe');
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

	public function datarplold_get()
	{
		$tid 		= $this->get('tid');
		$rpl_awal 	= date($this->get('rpl_awal'));

		$set_rplold_awal 	= $this->rpl_cro->rplawalold_tid($tid , $rpl_awal);
		if($set_rplold_awal == null)
		{
			$this->set_response([
	                'status' => FALSE,
	                'message' => 'Tidak ada order untuk TID tersebut'
	            ], REST_Controller::HTTP_NOT_FOUND); // N
		}else{

			$returnold_order	= $this->rpl_cro->returnold_tid($set_rplold_awal->id_order);
			if($returnold_order == null){
			$this->set_response([
	                'status' 	=> FALSE,
	                'message' 	=> 'Return untuk TID tersebut tidak ditemukan'
	            ], REST_Controller::HTTP_NOT_FOUND); // N
			}else{
				//ambil returnnya
				$rpl_awal 	= $this->rpl_cro->rpl_oldest($tid, $returnold_order->tglrpl);
				if($rpl_awal == null){
					$tgl2 = date('Y-m-d', strtotime('-1 days', strtotime($returnold_order->tglrpl)));
					$rpl_awal 	= $this->rpl_cro->rpl_oldest($tid, $tgl2);
					// ambil data teknisi flm
					$temp_date = date($this->get('rpl_awal'));
					// $teknisi_flm =  $this->flm_cro->flm_teknisi_old($tid, $temp_date, $tgl2);

					if($set_rplold_awal || $returnold_order){
						$this->set_response([
			                'status' => TRUE,
			                'data_rpl'	=> $set_rplold_awal,
			                'data_return'	=> $returnold_order,
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
					$temp_date = date($this->get('rpl_awal'));
					// $teknisi_flm =  $this->flm_cro->flm_teknisi_old($tid, $temp_date, $returnold_order->tglrpl);
					if($set_rplold_awal || $returnold_order){
						$this->set_response([
			                'status' => TRUE,
			                'data_rpl'	=> $set_rplold_awal,
			                'data_return'	=> $returnold_order,
			                'data_rpl_old' => $rpl_awal,
			                // 'tekni_flm'		=> $teknisi_flm,
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

/* End of file Perioderpl_old.php */
/* Location: ./application/controllers/api/Perioderpl_old.php */