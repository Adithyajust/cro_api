<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function index()
	{
		$data 	= array ('title' 		=> 'Absensi',
						 'content'		=> 'rest_server'
						);

		$this->load->view('rest_server');
	}


	public function testing()
	{
		$this->load->view('testing');
	}
}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */