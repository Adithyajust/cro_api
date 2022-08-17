<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Input_Absen_Pulang extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        //$this->load->model('Absen_Data_m');
    }

    public function index_get() {
        $idcab	= $this->get('kc');
        $bKeys	= $this->get('sp');
		$bgxd	= seo_bost($bKeys);
		$bgxdd	= preg_split ("/\#/", $bgxd);  
		$idsp	= $bgxdd['0'];
		$sp		= $bgxdd['1'];
        if ($idcab == '') {
            $sp = $this->db->get('tbl_ko')->result();
			$responsea['JSloksbg'] = array();
            foreach($sp as $k){
				$h["idsp"] = $k->idsp." | ".$k->sp;
				array_push($responsea, $h);
            }
			echo json_encode($responsea);
        } else {
            $this->db->where('idcab', $idcab);
            $this->db->where('idsp', $idsp);
            $this->db->group_by('idko');
            $this->db->order_by('idko', 'ASC');
            $sp = $this->db->get('tbl_ko')->result();
			$responsea['JSlokssbg'] = array();
            foreach($sp as $k){
				$h["idko"] = $k->idko." | ".$k->ko;
				array_push($responsea, $h);
            }
			echo json_encode($responsea);
        }

    }
	
}
?>