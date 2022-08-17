<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Android_Upass extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Android_m');
    }

    public function index_post(){
        $id = $this->post('txidus');
        $password = md5($this->post('edpswd'));
		$login = $this->Android_m->update($id, $password);
		if(!$login){
			$this->response(array('status' =>false, 'message' =>'1'),REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status' =>true, 'message' =>'2', 'response' =>$login),REST_Controller::HTTP_OK);
		}
    }
	
}
?>