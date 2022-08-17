<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Cabang extends REST_Controller {

	public function index_get()
	{
		print_r('sampe');
		die();
	}

}

/* End of file Cabang.php */
/* Location: ./application/controllers/api/Cabang.php */