<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_cemput extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->brix = $this->load->database('Bri', TRUE);
		$this->load->model(array('cronbri_model'));
	}
	public function index()
	{
		$this->cemput();
		$this->depok();
		$this->bekasi();
		$this->tangerang();
		$this->tosiga();
		$this->serang();
		$this->jtpadang();
		// tambahan kolaborasi
		$this->sidempuan();
		$this->palopo();
		$this->pinang();
		$this->kerinci();
		$this->panyabungan();
		$this->pengaraian();
		$this->tambusai();
		$this->prapat();
		$this->rengat();
		$this->timika();
		$this->simpang4();
		$this->tolitoli();
	}

	public function crawler_cemput($codeuker, $pembina, $post){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://devicelocator.bri.co.id/report_cpc_atm_result.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
		$response = curl_exec($ch);
		var_export($response);
		if($response !=''){
			$data = explode("|", $response);
			$file = $data[1];

			// ambil data exel dari server bri ke bricash
				$url = 'https://devicelocator.bri.co.id/attach/'.$file;
 				$path = 'download/';
 				// if(!file_exists($path)){
 				// 	mkdir($path,0777, true);
 				// }
				// Use basename() function to return the base name of file
				$file_name = basename($url);
				$files = $path.$file_name;
				  
				if(file_put_contents($files,file_get_contents($url))) {
					// ambil file yg mau diupload
					$file_temp =$path.$file_name;

					$object = PHPExcel_IOFactory::load($file_temp);

					// cetak_die($object);

					foreach($object->getWorksheetIterator() as $worksheet){
        				
        				$highestRow = $worksheet->getHighestRow();
                    	$highestColumn = $worksheet->getHighestColumn();
        
	                    for($row=4; $row<=$highestRow; $row++){
	                  		$dt_update 	= $worksheet->getCellByColumnAndRow(0, 2)->getValue();
	                  		$dt 		= explode(": ", $dt_update);
	                  		$updated    = $dt[1];

	                        $no 	= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	                        $tid 	= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	                        $sn 	= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	                        $db 	= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
	                        $kanwil 	= $worksheet->getCellByColumnAndRow(4, $row)->getValue();	
                         	$region 	= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                          	$kc_supervisi 	= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                           	$branch 	= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                            $pengelola 	= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                         	$pengelola_kode = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                         	$lokasi 	= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                         	$site 		= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                         	$mesin 		= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                         	$kategori 	= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                         	$garansi 	= $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                         	$hari_ops 	= $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                         	$jam_ops 	= $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                         	$waktu_ops 	= $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                         	$status 	= $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                         	$problem 	= $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                         	$rtl_tiket 	= $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                         	$down_time_hari 	= $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                         	$down_time_jam 		= $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                         	$last_tunai 	 	= $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                         	$tgl_problem 		= $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                         	$down_tunai_hari 	= $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                         	$down_tunai_jam 	= $worksheet->getCellByColumnAndRow(26, $row)->getValue();
                         	$denom 				= $worksheet->getCellByColumnAndRow(27, $row)->getValue();
                         	$lembar	 		= $worksheet->getCellByColumnAndRow(28, $row)->getValue();
                         	$cst1 			= $worksheet->getCellByColumnAndRow(29, $row)->getValue();
                         	$cst2 		= $worksheet->getCellByColumnAndRow(30, $row)->getValue();
                         	$cst3 		= $worksheet->getCellByColumnAndRow(31, $row)->getValue();
                         	$cst4 		= $worksheet->getCellByColumnAndRow(32, $row)->getValue();
                         	$lmb1 		= $worksheet->getCellByColumnAndRow(33, $row)->getValue();
                         	$lmb2 		= $worksheet->getCellByColumnAndRow(34, $row)->getValue();
                         	$lmb3 		= $worksheet->getCellByColumnAndRow(35, $row)->getValue();
                         	$lmb4 		= $worksheet->getCellByColumnAndRow(36, $row)->getValue();
                         	$spv_st 		= $worksheet->getCellByColumnAndRow(37, $row)->getValue();
                         	$receipt_st 	= $worksheet->getCellByColumnAndRow(38, $row)->getValue();
                         	$brizi_support 	= $worksheet->getCellByColumnAndRow(39, $row)->getValue();
                         	$pagu_existing 	= $worksheet->getCellByColumnAndRow(40, $row)->getValue();
                         	$sisa_saldo 	= $worksheet->getCellByColumnAndRow(41, $row)->getValue();
                         	$capture_rpl 	= $worksheet->getCellByColumnAndRow(42, $row)->getValue();
                         	$last_rpl 		= $worksheet->getCellByColumnAndRow(43, $row)->getValue();
                         	$jml_lembar 	= $worksheet->getCellByColumnAndRow(44, $row)->getValue();
                         	$jml_rpl 		= $worksheet->getCellByColumnAndRow(45, $row)->getValue();
                         	$tipe_rpl 		= $worksheet->getCellByColumnAndRow(46, $row)->getValue();
                         	$pagu_h0 		= $worksheet->getCellByColumnAndRow(47, $row)->getValue();
                         	$pagu_h1 		= $worksheet->getCellByColumnAndRow(48, $row)->getValue();
                         	$pagu_h2 		= $worksheet->getCellByColumnAndRow(49, $row)->getValue();
                         	$keterangan 	= $worksheet->getCellByColumnAndRow(50, $row)->getValue();
                         	$rtl_keterangan	= $worksheet->getCellByColumnAndRow(51, $row)->getValue();
                         	$rtl_problem 	= $worksheet->getCellByColumnAndRow(52, $row)->getValue();
                         	$rtl_group	 	= $worksheet->getCellByColumnAndRow(53, $row)->getValue();
                         	$rtl_tim 		= $worksheet->getCellByColumnAndRow(54, $row)->getValue();
                         	$rtl_id_tiket 	= $worksheet->getCellByColumnAndRow(55, $row)->getValue();
                         	$rtl_sla 		= $worksheet->getCellByColumnAndRow(56, $row)->getValue();
                         	$rtl_update		= $worksheet->getCellByColumnAndRow(57, $row)->getValue();
                         	$rtl_data_tiket 		= $worksheet->getCellByColumnAndRow(58, $row)->getValue();
                         	$rtl_data_keterangan 	= $worksheet->getCellByColumnAndRow(59, $row)->getValue();
                         	$rtl_data_problem 		= $worksheet->getCellByColumnAndRow(60, $row)->getValue();
                         	$rtl_data 				= $worksheet->getCellByColumnAndRow(61, $row)->getValue();
                         	$ma_1 					= $worksheet->getCellByColumnAndRow(62, $row)->getValue();

                		 	$data_ech[] = array(
	                            'no'      		=> $no,
	                            'tid'          	=> $tid,
	                            'sn'      		=> $sn,
	                            'db'      		=> $db,
	                            'kanwil'		=> $kanwil,
	                            'region'		=> $region,
	                            'kc_supervisi'		=> $kc_supervisi,
	                            'branch'		=> $branch,
	                            'pengelola'		=> $pengelola,
	                            'pengelola_kode'	=> $pengelola_kode,
	                            'lokasi'		=> $lokasi,
	                            'site'			=> $site,
	                            'mesin'			=> $mesin,
	                            'kategori'		=> $kategori,
	                            'garansi'		=> $garansi,
	                            'hari_ops'		=> $hari_ops,
	                            'waktu_ops'		=> $waktu_ops,
	                            'status'		=> $status,
	                            'problem'		=> $problem,
	                            'rtl_tiket'		=> $rtl_tiket,
	                            'down_time_hari'	=> $down_time_hari,
	                            'down_time_jam'		=> $down_time_jam,
	                            'last_tunai'		=> $last_tunai,
	                            'tgl_problem'		=> $tgl_problem,
	                            'down_tunai_hari'	=> $down_tunai_hari,
	                            'denom'				=> $denom,
	                            'lembar'			=> $lembar,
	                            'cst1'				=> $cst1,
	                            'cst2'				=> $cst2,
	                            'cst3'				=> $cst3,
	                            'cst4'				=> $cst4,
	                            'lmb1'				=> $lmb1,
	                            'lmb2'				=> $lmb2,
	                            'lmb3'				=> $lmb3,
	                            'lmb4'				=> $lmb4,
	                            'spv_st'			=> $spv_st,
	                            'receipt_st'		=> $receipt_st,
	                            'brizi_support'		=> $brizi_support,
	                            'pagu_existing'		=> $pagu_existing,
	                            'sisa_saldo'		=> $sisa_saldo,
	                            'capture_rpl'		=> $capture_rpl,
	                            'last_rpl'			=> $last_rpl,
	                            'jml_lembar'		=> $jml_lembar,
	                            'jml_rpl'			=> $jml_rpl,
	                            'tipe_rpl'			=> $tipe_rpl,
	                            'pagu_h0'			=> $pagu_h0,
	                            'pagu_h1'			=> $pagu_h1,
	                            'pagu_h2'			=> $pagu_h2,
	                            'keterangan'		=> $keterangan,
	                            'rtl_keterangan'	=> $rtl_keterangan,
	                            'rtl_problem'		=> $rtl_problem,
	                            'rtl_group'			=> $rtl_group,
	                            'rtl_tim'			=> $rtl_tim,
	                            'rtl_id_tiket' 		=> $rtl_id_tiket,
	                            'rtl_sla'			=> $rtl_sla,
	                            'rtl_update'		=> $rtl_update,
	                            'rtl_data_tiket'	=> $rtl_data_tiket,
	                            'rtl_data_keterangan'	=> $rtl_data_keterangan,
	                            'rtl_data_problem'		=> $rtl_data_problem,
	                            'rtl_data'				=> $rtl_data,
	                            'ma_1'					=> $ma_1,
	                            'updated'				=> trim($updated),
	                            'codeuker'				=> $codeuker,
	                            'pembina'				=> $pembina,
	                        );

                			// $tidsama = $this->brix->query("SELECT * FROM dev_loc_problem_atm WHERE tid LIKE '".$tid."' AND updated LIKE '".$updated."'")->result_array;
                			// // lastqbri();
	                		// if($tidsama){
	                		//  	// kalo ada insert dari tabel dev_loc_hisory ke dev_loc (update tbl dev_loc)
	                		// 	$this->brix->update_record($data_ech, ['tid' => $tid], 'dev_loc_problem_atm');
	                		// 	lastqbri();
	                		//  	// $this->brix
	                		//  }else{
	                		//  	// kalo tidak ada di insert ketabel dev_loc_problem_atm
	                		//  	$this->brix->insert_batch('dev_loc_problem_atm', $data_ech);
	                		//  	// lastqbri();
	                		//  }

	                    }
	                 
	                    //deletebranch
	                    $delbranch = $this->brix->query("DELETE FROM dev_loc_problem_atm WHERE branch = '".$branch."'");

	                    //insertbranch
	                    $insertbranch = $this->brix->insert_batch('dev_loc_problem_atm',$data_ech);
	                	
	                  
	                   	// lastq();
                	}
				    echo "File downloaded successfully";
				}
				else {
				    echo "File downloading failed.";
				}
		}else{
			echo("Gagal Update data");
		}
	}

	public function tolitoli(){
		$codeuker = "140";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG TOLI TOLI KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------ 


	public function simpang4(){
		$codeuker = "139";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG SIMPANG EMPAT KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------ BG TOLI TOLI KOLABORASI

	public function timika(){
		$codeuker = "138";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG TIMIKA KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function rengat()
	{
		$codeuker = "76";
		$pembina = "KABAG CPC";
		$post = [
		    'cpc' => 'BG RENGAT KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}

	public function prapat()
	{
		$codeuker 	= "121";
		$pembina	= "KABAG CPC";
		$post = [
		    'cpc' => 'BG RANTAU PRAPAT KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}

	public function tambusai()
	{
		$codeuker 	= "119";
		$pembina	= "KABAG ADE";
		$post = [
		    'cpc' => 'BG PEKANBARU TUANKU TAMBUSAI KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}

	public function pengaraian()
	{
		$codeuker 	= "108";
		$pembina	= "KABAG CPC";
		$post = [
		    'cpc' => 'BG PASIR PENGARAIAN KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}

	public function panyabungan()
	{
		$codeuker = "117";
		$pembina 	= "KABAG SPH";
		$post = [
		    'cpc' => 'BG PANYABUNGAN KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}

	public function kerinci()
	{
		$codeuker = "120";
		$pembina	= "KABAG DSP";
		$post = [
		    'cpc' => 'BG PANGKALAN KERINCI KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}

	public function pinang()
	{
		$codeuker = "100";
		$pembina	= "KABAG RDI";
		$post = [
		    'cpc' => 'BG PANGKAL PINANG KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}

	public function palopo()
	{
		$codeuker = "105";
		$pembina	= "KABAG DSP";
		$post = [
		    'cpc' => 'BG PALOPO KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	public function sidempuan()
	{
		$codeuker = "109";
		$pembina	= "KABAG DSP";
		$post = [
		    'cpc' => 'BG PADANG SIDEMPUAN KOLABORASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}

	public function cemput(){
		$codeuker = "01";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG CEMPAKA PUTIH',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function depok(){
		$codeuker = "13";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG DEPOK',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------	
	public function bekasi(){
		$codeuker = "14";
		$pembina 	= "KADIV CHM";
		$post = [
		    'cpc' => 'BG BEKASI',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function tangerang(){
		$codeuker = "29";
		$pembina 	= "KADIV LAYANAN";
		$post = [
		    'cpc' => 'BG TANGERANG',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function tosiga(){
		// BG TOSIGA
		$codeuker = "02";
		$pembina 	= "WAKADIV CHM 2";
		$post = [
		    'cpc' => 'BG TOSIGA',
		];

	$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function serang(){
		// BG SERANG
		$codeuker = "11";
		$pembina 	= "KADIV CHM";
		$post = [
		    'cpc' => 'BG SERANG',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------	
	public function jtpadang(){
		$codeuker = "22";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG JATIPADANG',
		];

		$this->crawler_cemput($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	
}

/* End of file Cron_cemput.php */
/* Location: ./application/controllers/Cron_cemput.php */