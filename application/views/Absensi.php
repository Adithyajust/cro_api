<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function index()
	{
		$data 	= array ('title' 		=> 'Absensi',
						 'content'		=> 'index'
						);

		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file absensi.php */
/* Location: ./application/controllers/absensi.php */