<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flm_cro extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->cro 		=  $this->load->database('cro', TRUE);
	}

	function flm_teknisi_old($tid, $rpl_awal, $rpl_oldest)
	{

		$this->cro->select('a.team_flm,a.date_flm, a.time_flm, a.atm_flm, a.desc_flm, a.ket_flm, a.time_exe, a.time_close, a.status_flm, a.note_flm, ,b.petugas_flm, b.petugasb_flm');
		$this->cro->from('backup_flms AS a');
		$this->cro->join('backup_flms_team AS b', 'b.team_flm = b.team_flm', 'left');
		// $this->croluar->join('employe AS c', 'c.id = b.custody', 'left');
		// $this->croluar->join('employe AS d', 'd.id = b.driver', 'left');
		$this->cro->where('atm_flm',$tid);
		$this->cro->where('a.date_flm >=', $rpl_oldest);
		$this->cro->where('a.date_flm <=', $rpl_awal);
		// $this->cro->where('a.date_flm >=', $rpl_oldest);
		// $this->cro->where("date_flm BETWEEN '{$rpl_oldest}' AND '{$rpl_awal}'");
	 	
		$query = $this->cro->get()->result();
		return $query;
	}

	public function flm_teknisi_current($tid)
	{
		$this->cro->select('a.team_flm,a.date_flm, a.time_flm, a.atm_flm, a.desc_flm, a.ket_flm, a.time_exe, a.time_close, a.status_flm, a.note_flm, ,b.petugas_flm, b.petugasb_flm');
		$this->cro->from('flms AS a');
		$this->cro->join('flms_team AS b', 'b.team_flm = b.team_flm', 'left');
		// $this->croluar->join('employe AS c', 'c.id = b.custody', 'left');
		// $this->croluar->join('employe AS d', 'd.id = b.driver', 'left');
		$this->cro->where('atm_flm',$tid);
		// $this->croluar->where("date_flm BETWEEN '{$rpl_oldest}' AND '{$rpl_awal}'");
	 	
		$query = $this->cro->get()->result();
		return $query;
	}
	

}

/* End of file Flm_cro.php */
/* Location: ./application/models/Flm_cro.php */