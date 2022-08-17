<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flm_croluar extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->croluar 	=  $this->load->database('croluar',  TRUE);
	}
	
	function flm_teknisi_old($tid, $rpl_awal, $rpl_oldest)
	{

		$this->croluar->select('a.team_flm,a.date_flm, a.time_flm, a.atm_flm, a.desc_flm, a.ket_flm, a.time_exe, a.time_close, a.status_flm, a.note_flm, ,b.petugas_flm, b.petugasb_flm');
		$this->croluar->from('backup_flms AS a');
		$this->croluar->join('backup_flms_team AS b', 'b.team_flm = b.team_flm', 'left');
		// $this->croluar->join('employe AS c', 'c.id = b.custody', 'left');
		// $this->croluar->join('employe AS d', 'd.id = b.driver', 'left');
		$this->croluar->where('atm_flm',$tid);
		$this->croluar->where('a.date_flm >=', $rpl_oldest);
		$this->croluar->where('a.date_flm <=', $rpl_awal);
		// $this->croluar->where("date_flm BETWEEN '{$rpl_oldest}' AND '{$rpl_awal}'");
	 	
		$query = $this->croluar->get()->result();
		return $query;
	}

	public function flm_teknisi_current($tid)
	{
		$this->croluar->select('a.team_flm,a.date_flm, a.time_flm, a.atm_flm, a.desc_flm, a.ket_flm, a.time_exe, a.time_close, a.status_flm, a.note_flm, ,b.petugas_flm, b.petugasb_flm');
		$this->croluar->from('flms AS a');
		$this->croluar->join('flms_team AS b', 'b.team_flm = b.team_flm', 'left');
		// $this->croluar->join('employe AS c', 'c.id = b.custody', 'left');
		// $this->croluar->join('employe AS d', 'd.id = b.driver', 'left');
		$this->croluar->where('atm_flm',$tid);
		// $this->croluar->where("date_flm BETWEEN '{$rpl_oldest}' AND '{$rpl_awal}'");
	 	
		$query = $this->croluar->get()->result();
		return $query;
	}


}

/* End of file Flm_croluar.php */
/* Location: ./application/models/Flm_croluar.php */