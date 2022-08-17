<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Input_Absen_Masuk extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        //$this->load->model('Absen_Data_m');
    }
	
    function index_post() {
		$tgls		= date("Y-m-d");
		$jams		= date("H:i:s");
		$abs_sts	= "1";
		$jujur		= $this->post('bohong');
		$jarak		= $this->post('jarak');
		$idus		= $this->post('nip');
		$nama		= $this->post('nama');
		$jab		= $this->post('jab');
		$tgl_abs	= $this->post('tgl_abs');
		$jam_abs	= $this->post('jam_abs');
		$ip_abs		= $this->post('ip_abs');
		$addr_abs	= $this->post('addr_abs');
		$acc_abs	= $this->post('acc_abs');
		$alt_abs	= $this->post('alt_abs');
		$lat_abs	= $this->post('lat_abs');
		$log_abs	= $this->post('log_abs');
		$wfh_o		= $this->post('wfh_o');
		$shift		= $this->post('shift');
		$absen		= $this->post('absen');
		$suhu_in	= $this->post('suhu_in');
		$abs_di		= $this->post('abs_di');
		
		$lokbg		= $this->post('lok_bg');
		$bgxd		= seo_bost($lokbg);
		$bgxdd		= preg_split ("/\#/", $bgxd);  
		$lok_bg		= $bgxdd['1'];
		
		$lokkc		= $this->post('lok_kc');
		$bgxa		= seo_bost($lokkc);
		$bgxad		= preg_split ("/\#/", $bgxa);  
		$lok_kc		= $bgxad['1'];
		
		$loksp		= $this->post('lok_sp');
		$bgz		= seo_bost($loksp);
		$bgzc		= preg_split ("/\#/", $bgz);  
		$lok_sp		= $bgzc['1'];
		
		$lok_bri	= $this->post('lok_bri');
		$lok_man	= $this->post('lok_man');
		$lok_lain	= $this->post('lok_lain');
        $data = array(
                    'jujurv'	=> $this->post('bohong'),
                    'jarak'		=> $this->post('jarak'),
                    'idus'		=> $this->post('nip'),
                    'nama'		=> $this->post('nama'),
                    'jab'		=> $this->post('jab'),
                    'tgl_abs'	=> $this->post('tgl_abs'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'),
                    'idus'		=> $this->post('nip'));
        $insert = $this->db->insert('tbl_absen_in', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
	
}
?>