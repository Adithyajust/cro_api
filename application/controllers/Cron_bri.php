<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use GuzzleHttp\Client;

class Cron_bri extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->brix = $this->load->database('Bri', TRUE);
		$this->load->model(array('cronbri_model'));
	}

	public function index(){
		$this->ambon();
		$this->jalin();
		$this->bandung();
		$this->banjarmasin();
		$this->baturaja();
		$this->bulukumba();
		$this->cirebon();
		$this->jambi();
		$this->jember();
		$this->ketapang();
		$this->lahat();
		$this->sitoli();
		$this->lampung();
		// tambahan KOLABORASI
		$this->linggau();
		$this->palu();
		$this->parigi();
		$this->samarinda1();
		$this->samarinda2();
		$this->kefamenanu();
		$this->argamakmur();
		$this->curup();
		$this->balige();
		$this->dompu();
		$this->pekanbaru_sudirman();
		$this->raba_bima();
		$this->sumbawa();
		$this->tarutung();
		$this->tenggarong();


	}

	public function crawler_bri($codeuker, $pembina, $post){
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
	                	
	                    // insert tabel bri.ech history
	                  
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

	public function ambon(){
		$codeuker = "115";
		$pembina	= "KABAG ITM";
		$post = [
		    'cpc' => 'BG AMBON KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}

	public function tenggarong(){
		$codeuker = "71";
		$pembina = "KABAG SPH";
		$post = [
		    'cpc' => 'BG TENGGARONG KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function tarutung(){
		$codeuker = "49";
		$pembina	= "KABAG ITM";
		$post = [
		    'cpc' => 'BG TARUTUNG KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function sumbawa(){
		$codeuker = "73";
		$pembina 	= 'KABAG ITM';
		$post = [
		    'cpc' => 'BG SUMBAWA BESAR KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function raba_bima(){
		$codeuker = "72";
		$pembina 	= "KABAG CPC";
		$post = [
		    'cpc' => 'BG RABA BIMA KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function pekanbaru_sudirman(){
		$codeuker = "80";
		$pembina 	= "KABAG LND";
		$post = [
		    'cpc' => 'BG PEKANBARU SUDIRMAN KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function dompu(){
		$codeuker = "70";
		$pembina 	= "KABAG ITM";
		$post = [
		    'cpc' => 'BG DOMPU KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function balige(){
		$codeuker = "48";
		$pembina 	= "KABAG ADE";
		$post = [
		    'cpc' => 'BG BALIGE KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function curup(){
		$codeuker = "83";
		$pembina 	= "KABAG RDI";
		$post = [
		    'cpc' => 'BG CURUP KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function argamakmur(){
		$codeuker = "78";
		$pembina 	= "KABAG ADE";
		$post = [
		    'cpc' => 'BG ARGA MAKMUR KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function kefamenanu(){
		$codeuker = "66";
		$pembina 	= "KABAG RDI";
		$post = [
		    'cpc' => 'BG KEFAMENANU KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------


	public function samarinda2(){
		$codeuker = "64";
		$pembina 	= "KABAG ADE";
		$post = [
		    'cpc' => 'BG SAMARINDA 2 KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function samarinda1(){
		$codeuker = "62";
		$pembina 	= "KABAG CPC";
		$post = [
		    'cpc' => 'BG SAMARINDA 1 KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function parigi(){
		$codeuker = "65";
		$pembina 	= "KABAG DSP";
		$post = [
		    'cpc' => 'BG PARIGI KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function palu(){
		$codeuker = "63";
		$pembina 	= "KABAG LND";
		$post = [
		    'cpc' => 'BG PALU KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function jalin(){
		$codeuker = "JALIN";
		$pembina 	= "JALIN";
		$post = [
		    'cpc' => 'BG JALIN',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function bandung(){
		$codeuker = "03";
		$pembina 	= "KADIV LAYANAN";
		$post = [
		    'cpc' => 'BG BANDUNG',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function banjarmasin(){
		// BG BANJARMASIN
		$codeuker = "34";
		$pembina 	= "WAKADIV CHM 2";
		$post = [
		    'cpc' => 'BG BANJARMASIN',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function baturaja(){
		$codeuker = "37";
		$pembina 	= "KABAG LND";
		$post = [
		    'cpc' => 'BG BATURAJA KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function bulukumba(){
		$codeuker = "35";
		$pembina 	= "KABAG SPH";
		$post = [
		    'cpc' => 'BG BULUKUMBA KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function cirebon(){ 
		$codeuker = "10";
		$pembina 	= "KADIV CHM";
		$post = [
		    'cpc' => 'BG CIREBON',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function jambi(){
		$codeuker = "33";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG JAMBI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function jember(){
		$codeuker = "20";
		$pembina 	= "KADIV LAYANAN";
		$post = [
		    'cpc' => 'BG JEMBER',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function ketapang(){
		$codeuker = "36";
		$pembina 	= "KABAG LND";
		$post = [
		    'cpc' => 'BG KETAPANG KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function lahat(){
		$codeuker = "38";
		$pembina 	= "KABAG CPC";
		$post = [
		    'cpc' => 'BG LAHAT KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function sitoli(){
		#BG GUNUNG SITOLI KOLABORASI 47
		$codeuker = "47";
		$pembina 	= "KABAG SPH";
		$post = [
		    'cpc' => 'BG GUNUNG SITOLI KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function lampung(){
		#BG LAMPUNG 21
		$codeuker = "21";
		$pembina 	= "KADIV CHM";
		$post = [
		    'cpc' => 'BG LAMPUNG',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function linggau(){
		#BG LUBUK LINGGAU KOLABORASI 43
		$codeuker = "43";
		$pembina 	= "KABAG ADE";
		$post = [
		    'cpc' => 'BG LUBUK LINGGAU KOLABORASI',
		];

		$this->crawler_bri($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
}

/* End of file cron_bri.php */
/* Location: ./application/controllers/cron_bri.php */