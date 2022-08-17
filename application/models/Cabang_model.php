<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->EoBricash = $this->load->database('dio', TRUE);
	}

	function get_cabang()
	{
		$this->EoBricash->select('nama_uker, orgeh_uker, area, building, alamat_uker');
		$this->EoBricash->from('uker');
		$this->EoBricash->where(array ( 'flag_aktif' 	=> 1
									));
		$query = $this->EoBricash->get();
		return $query->result();
	}

}

/* End of file Cabang_model.php */
/* Location: ./application/models/Cabang_model.php */