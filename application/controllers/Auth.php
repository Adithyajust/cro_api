<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('user_agent');
	}

	public function index()
	{
		$OS = $_SERVER['HTTP_USER_AGENT'];
		$tes = preg_replace("#Mozilla[^(]+\(#","",$OS);
		$finaleOS = preg_replace("#\).*#","",$tes);

		$cek = explode("; ",$finaleOS);

		if ($cek[0] == 'Linux')
		{
			$finaleOSS = ($cek[1].' '.$cek[2]);
		}else{
			$finaleOSS = ($cek[0].' '.$cek[1]);
		}
		// cetak_die($cek);

	  	$data['title']          = "USER AGENT";
        $data['browser']        = $this->agent->browser();
        $data['versi_browser']  = $this->agent->version();
        // $data['os']             = $this->agent->platform();
        $data['os']             = $finaleOSS;
        $data['ip_address']     = $this->input->ip_address();
        $data['movbile']        = $this->agent->mobile();

		$this->load->view('Auth/login', $data);
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */