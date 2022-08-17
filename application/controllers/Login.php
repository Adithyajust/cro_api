<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		 if ($this->session->userdata('user_login')) {
            redirect('Dashboard');
        } else {
            $this->load->view('Auth/login');
        }
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */