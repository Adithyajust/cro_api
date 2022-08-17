<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->EoBricash = $this->load->database('dio', TRUE);
	}

	public function get_login($pn, $cpassword)
	{

		// $this->EoBricash->select('a.pn_user, a.nama_user, a.jabatan, a.email, a.type_user, a.orgeh_uker, if((type_user = 1),"DIO",if((type_user = 0),"NonDIO","-")) AS Jenislogin, ,b.nama_uker AS NamaUker, ,c.parent_name AS Divisi');
		// $this->EoBricash->from('user AS a');
		// $this->EoBricash->join('uker AS b','b.orgeh_uker = a.orgeh_uker','left');
		// $this->EoBricash->join('mapping_uker AS c','c.child_orgeh = a.orgeh_uker','left');
		// $this->EoBricash->where(array (	'a.pn_user' 	=> $pn,
		// 								'a.flag_aktif' 	=> 1,
		// 								'a.password'  	=> $cpassword
		// 							));
		// $query = $this->EoBricash->get();
		// return $query->result();
		$log = "SELECT a.pn_user, a.nama_user, a.jabatan, a.email, a.type_user, a.orgeh_uker, IF((type_user = 1),'DIO',IF((type_user = 0),'NonDIO','-')) AS Jenislogin, b.nama_uker AS NamaUker, c.parent_name AS Divisi FROM user AS a left outer join uker AS b on a.orgeh_uker=b.orgeh_uker left outer join mapping_uker as c on a.orgeh_uker=c.child_orgeh WHERE ((a.pn_user like '$pn' and a.flag_aktif = 1) OR (a.pn_user like '$pn' and a.flag_aktif = 0  and type_user = 0)) AND a.password like '$cpassword'";
		$log = $this->EoBricash->query($log);
		return $log->result();

	}
	

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */