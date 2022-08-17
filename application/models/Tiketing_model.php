<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiketing_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function gettiketing()
	{
		$this->db->limit(10);  
		return $this->db->get('tb_premise')->result_array();
	}

	function get_by_tid($tid, $tgl_jadwal)
	{
		$this->db->select('a.tiket_premis, a.tgl_jadwal, a.dtend, a.sla, ,b.nama_user, ,c.nama_status, ,d.tid_mesin, ,e.nama_merk, ,f.nama_type, , g.clean_atm, g.clean_both, g.foto_full, g.foto_fascia_bwh, g.foto_fascia_ats, g.foto_ups, g.foto_setor, g.foto_ceklist, g.tgl_done,g.status_done, g.problem, g.catatan, g.sts_sampah, g.sts_crm, g.sts_ups, g.sts_pamflet, g.sts_pms, g.sts_ac, g.sts_cctv, g.sts_stiker, g.date_struk, g.time_struk');
		$this->db->from('tb_premise AS a');
		$this->db->join('tb_users AS b', 'b.id_user = a.idteknisi', 'left');
		$this->db->join('tb_status AS c', 'c.idstatus = a.idstatus', 'left');
		$this->db->join('tb_mesin AS d', 'd.idmesin = a.idmesin', 'left');
		$this->db->join('tb_merk AS e', 'e.idmerk = d.idmerk', 'left');
		$this->db->join('tb_type AS f', 'f.idtype = d.idtype', 'left');
		$this->db->join('tb_trxpremise AS g', 'g.idt_prem = a.idt_prem', 'left');
		$this->db->where(array ('d.tid_mesin' => $tid,
								'a.tgl_jadwal' => $tgl_jadwal));
		// $this->db->order_by('idt_prem', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	
}

/* End of file Tiketing_model.php */
/* Location: ./application/models/Tiketing_model.php */