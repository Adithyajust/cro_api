<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Absen_Kc extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        //$this->load->model('Absen_Data_m');
    }

    public function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $kc = $this->db->get('tbl_cabang')->result();
			$responsea['JSlokbg'] = array();
            foreach($kc as $k){
				$h["idcab"] = $k->idcab." | ".$k->kantor;
				array_push($responsea, $h);
            }
			/*$aDlin = seo_jsn1(json_encode($responsea));
			$bDlin = seo_jsn2($aDlin);
			$cDlin = seo_awal($bDlin);
			$dDlin = seo_akhir($cDlin);*/
			echo json_encode($responsea);
			/*$fp = fopen('getVersion.txt', 'w');
			fwrite($fp, $dDlin);
			fclose($fp);*/
        }

    }
	
}
?>