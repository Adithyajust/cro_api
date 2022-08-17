<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Absen_Sp extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        //$this->load->model('Absen_Data_m');
    }

    public function index_get() {
        $id = $this->get('kc');
		$bgxd	= seo_bost($id);
		$bgxdd	= preg_split ("/\#/", $bgxd);  
		$idcab	= $bgxdd['0'];
		$kantor	= $bgxdd['1'];
        if ($id == '') {
            $sp = $this->db->get('tbl_sp')->result();
			$responsea['JSloksbg'] = array();
            foreach($sp as $k){
				$h["idsp"] = $k->idsp." | ".$k->sp;
				array_push($responsea, $h);
            }
			echo json_encode($responsea);
        } else {
            $this->db->where('idcab', $idcab);
            $this->db->group_by('idsp');
            $this->db->order_by('idsp', 'ASC');
            $sp = $this->db->get('tbl_sp')->result();
			$responsea['JSloksbg'] = array();
            foreach($sp as $k){
				$h["idsp"] = $k->idsp." | ".$k->sp;
				array_push($responsea, $h);
            }
			echo json_encode($responsea);
        }

    }
	
}
?>