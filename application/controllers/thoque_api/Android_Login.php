<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Android_Login extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Android_m');
    }

    public function index_post(){
        $pn_user = $this->post('pn_user');
        $password = md5($this->post('password'));
		$login = $this->Android_m->logins($pn_user, $password);
		if(!$login){
			$this->response(array('status' =>false, 'message' =>'1'),REST_Controller::HTTP_OK);
		}else{
			$this->response(array('status' =>true, 'message' =>'2', 'response' =>$login),REST_Controller::HTTP_OK);
		}
    }

	/*public function index_put(){
        $id = $this->put('txidus');
		$password = md5($this->put('edpswd'));
		//$password = $this->put('edpswd');
		$update = $this->Android_m->update($id, $password);
        if (!$update) {
			$this->response(array('status' =>false, 'message' =>'fail'),REST_Controller::HTTP_OK);
        } else {
			$this->response(array('status' =>true, 'message' =>'success'),REST_Controller::HTTP_OK);
        }
        
    }
	
	function index_putssss() {
		$this->EoBricash = $this->load->database('dio', TRUE);
        $id = $this->put('txidus');
        $data = array(
                    'idus'		=> $this->put('txidus'),
                    'password'	=> md5($this->put('edpswd')));
        $this->EoBricash->where('idus', $id);
        $update = $this->EoBricash->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }*/
	
}
?>