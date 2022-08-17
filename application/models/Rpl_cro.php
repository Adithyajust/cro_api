<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rpl_cro extends CI_Model {
public function __construct()
{
	parent::__construct();
		$this->cro 		=  $this->load->database('cro', TRUE);
        // $this->croluar 	=  $this->load->database('croluar',  TRUE);
        // $this->crobjb 	=  $this->load->database('bjb',  TRUE);
}
	function listtid()
	{
		$query ="SELECT * FROM atm";
        return $this->cro->query($query)->result_array();
	}

	function list_tid_all($tid, $codeuker)
	{
		// $query ="SELECT * FROM V_tidatm";
		$this->cro->from('V_tidatm');
		$this->cro->where(array ('tid' => $tid,
								  'codeuker' => $codeuker	 
								));
		$query = $this->cro->get();
		return $query->result();
	}

	//ambil dari tabel rpl_order 
	function rplawal_tid($tid)
	{
		$this->cro->select('a.tid_atm, a.date, a.time, a.jml_lbr, a.jcst1, a.jcst2, a.jcst3, a.jcst3, a.jcst4, a.jml_rp, a.status, a.returned, a.id_order, a.order_status, ,b.time_rpl, b.pengawalrpl, ,c.nama as nm_custody, ,d.nama as nm_driver');
		$this->cro->from('rpl_order AS a');
		$this->cro->join('rpl AS b', 'b.id = a.order_status', 'left');
		$this->cro->join('employe AS c', 'c.id = b.custody', 'left');
		$this->cro->join('employe AS d', 'd.id = b.driver', 'left');
		$this->cro->where(array ('a.tid_atm' 	=> $tid
							));
		$query = $this->cro->get();
		return $query->row();
	}

	function rplawalold_tid($tid, $rpl_awal)
	{
		// $this->cro->select('tid_atm, date, time, jml_lbr, jcst1, jcst2, jcst3, jcst3, jcst4, jml_rp, status, returned, id_order');
		// $this->cro->from('backup_rpl_order');
		// $this->cro->where(array ('tid_atm' 	=> $tid,
		// 						 'date' => $rpl_awal	
		// 					));
		// $query = $this->cro->get();
		// return $query->row();

		$this->cro->select('a.tid_atm, a.date, a.time, a.jml_lbr, a.jcst1, a.jcst2, a.jcst3, a.jcst3, a.jcst4, a.jml_rp, a.status, a.returned, a.id_order, a.order_status, ,b.time_rpl, b.pengawalrpl, ,c.nama as nm_custody, ,d.nama as nm_driver');
		$this->cro->from('backup_rpl_order AS a');
		$this->cro->join('backup_rpl AS b', 'b.id = a.order_status', 'left');
		$this->cro->join('employe AS c', 'c.id = b.custody', 'left');
		$this->cro->join('employe AS d', 'd.id = b.driver', 'left');
	 	$this->cro->where(array ('a.tid_atm' 	=> $tid,
								 'a.date' => $rpl_awal	
							));
		$query = $this->cro->get();
		return $query->row();
	}

	function return_tid($order)
	{
		$this->cro->select('id_order, jmlcst, ret1, ret2, ret3, ret4, rej, total_return, tglreturn, tglrpl');
		$this->cro->from('returned');
		$this->cro->where(array ('id_order' => $order ));
		$query = $this->cro->get();
		return $query->row();
	}

	function returnold_tid($order)
	{
		$this->cro->select('id_order, jmlcst, ret1, ret2, ret3, ret4, rej, total_return, tglreturn, tglrpl');
		$this->cro->from('backup_returned');
		$this->cro->where(array ('id_order' => $order ));
		$query = $this->cro->get();
		return $query->row();
	}

	function rpl_old($tid, $tgl_return)
	{
		$tgl_rpls = date($tgl_return);
		// $this->cro->select('tid_atm, date, time, jml_lbr, jcst1, jcst2, jcst3, jcst3, jcst4, jml_rp, status, returned');
		// $this->cro->from('backup_rpl_order');
		// $this->cro->where(array (	'tid_atm' => $tid,
		// 							'date' => $tgl_rpls ));
		// $query = $this->cro->get();
		// return $query->result();
		$this->cro->select('a.tid_atm, a.date, a.time, a.jml_lbr, a.jcst1, a.jcst2, a.jcst3, a.jcst3, a.jcst4, a.jml_rp, a.status, a.returned, a.id_order, a.order_status, ,b.time_rpl, b.pengawalrpl, ,c.nama as nm_custody, ,d.nama as nm_driver');
		$this->cro->from('backup_rpl_order AS a');
		$this->cro->join('backup_rpl AS b', 'b.id = a.order_status', 'left');
		$this->cro->join('employe AS c', 'c.id = b.custody', 'left');
		$this->cro->join('employe AS d', 'd.id = b.driver', 'left');
		$this->cro->where(array (	'tid_atm' => $tid,
									'date' => $tgl_rpls ));
		$query = $this->cro->get();
		return $query->result();

	}

	function rpl_oldest($tid, $tgl_return)
	{
		$tgl_rpls = date($tgl_return);
		// $this->cro->select('tid_atm, date, time, jml_lbr, jcst1, jcst2, jcst3, jcst3, jcst4, jml_rp, status, returned');
		// $this->cro->from('backup_rpl_order');
		// $this->cro->where(array (	'tid_atm' => $tid,
		// 							'date' => $tgl_rpls ));
		// $query = $this->cro->get();
		// return $query->result();
		$this->cro->select('a.tid_atm, a.date, a.time, a.jml_lbr, a.jcst1, a.jcst2, a.jcst3, a.jcst3, a.jcst4, a.jml_rp, a.status, a.returned, a.id_order, a.order_status, ,b.time_rpl, b.pengawalrpl, ,c.nama as nm_custody, ,d.nama as nm_driver');
		$this->cro->from('backup_rpl_order AS a');
		$this->cro->join('backup_rpl AS b', 'b.id = a.order_status', 'left');
		$this->cro->join('employe AS c', 'c.id = b.custody', 'left');
		$this->cro->join('employe AS d', 'd.id = b.driver', 'left');
		$this->cro->where(array (	'tid_atm' => $tid,
									'date' => $tgl_rpls ));
		$query = $this->cro->get();
		return $query->result();
	}

	function teknisi_flm_cur()
	{
		
	}
}

/* End of file Rpl_cro.php */
/* Location: ./application/models/Rpl_cro.php */