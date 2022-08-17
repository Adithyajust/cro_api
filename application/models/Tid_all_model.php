<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tid_all_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->croluar 	=  $this->load->database('croluar',  TRUE);
}

function list_tid_all($tid)
	{
		$query = "SELECT * FROM V_tidatm WHERE tid like '%".$tid."%' " ;
		// $query ="SELECT * FROM V_tidatm";
		// $this->croluar->from('V_tidatm');
		// $this->croluar->where(array ('tid' => $tid
		// 						  // 'codeuker' => $codeuker	 
		// 						));
		$row = $this->croluar->query($query);
		return $row->row();
	}

function ambil_tid()
	{
		$this->croluar->from('V_tidatm');
		$query = $this->croluar->get();
		return $query->result();
	}
}

/* End of file Tid_all_model.php */
/* Location: ./application/models/Tid_all_model.php */