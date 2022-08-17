<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_bri2	extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->brix = $this->load->database('Bri', TRUE);
		$this->load->model(array('cronbri_model'));
	}

	public function index()
	{
		$this->yogyakarta();
		$this->tulungagung();
		$this->tasikmalaya();
		$this->surabaya();
		$this->sukabumi();
		$this->solo();
		$this->sintang();
		$this->semarang();
		$this->sekayu();
		$this->sanggau();
		$this->putusibau();
		$this->purwokerto();
		$this->pemalang();
		$this->pamekasan();
		$this->palembang();
		$this->pati();
		$this->pagar_alam();
		$this->medan();
		$this->padang();
		$this->enim();
		$this->melawi();
		$this->malang();
		$this->makasar();
		$this->madiun();
		$this->batam_center();
		$this->kotamobagu();
		$this->manado();
		$this->mataram();
		$this->palangkaraya();
		$this->tondano();
		$this->limboto();
		$this->bengkulu();
		$this->gorontalo();
		$this->marisa();
		$this->praya();
		$this->selong();
		$this->atambua();

	}

	public function crawler_bri2($codeuker, $pembina, $post){
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


	public function atambua(){
		$codeuker = "67";
		$pembina 	= "KABAG CPC";
		$post = [
		    'cpc' => 'BG ATAMBUA KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	
	public function selong(){
		$codeuker = "59";
		$pembina 	= "KABAG RDI";
		$post = [
		    'cpc' => 'BG SELONG KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function praya(){
		$codeuker = "58";
		$pembina 	= "KABAG ADE";
		$post = [
		    'cpc' => 'BG PRAYA KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function marisa(){
		$codeuker = "61";
		$pembina 	= "KABAG RDI";
		$post = [
		    'cpc' => 'BG MARISA KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function gorontalo(){
		$codeuker = "56";
		$pembina 	= "KABAG ITM";
		$post = [
		    'cpc' => 'BG GORONTALO KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function bengkulu(){
		$codeuker = "50";
		$pembina 	= "KABAG RDI";
		$post = [
		    'cpc' => 'BG BENGKULU KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function limboto(){
		$codeuker = "60";
		$pembina 	= "KABAG CPC";
		$post = [
		    'cpc' => 'BG LIMBOTO KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function tondano(){
		$codeuker = "53";
		$pembina 	= "KABAG LND";
		$post = [
		    'cpc' => 'BG TONDANO KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function palangkaraya(){
		$codeuker = "54";
		$pembina 	= "KABAG RDI";
		$post = [
		    'cpc' => 'BG PALANGKARAYA KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------

	public function mataram(){
		$codeuker = "57";
		$pembina 	= "KABAG SPH";
		$post = [
		    'cpc' => 'BG MATARAM KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------	

	public function manado(){
		$codeuker = "52";
		$pembina 	= "KABAG LND";
		$post = [
		    'cpc' => 'BG MANADO KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------	

	public function kotamobagu(){
		$codeuker = "51";
		$pembina 	= "KABAG DSP";
		$post = [
		    'cpc' => 'BG KOTAMOBAGU KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------	

	public function batam_center(){
		$codeuker = "55";
		$pembina 	= "KABAG DSP";
		$post = [
		    'cpc' => 'BG BATAM CENTER KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------	

	public function yogyakarta(){
		$codeuker = "24";
		$pembina 	= "KADIV LAYANAN";
		$post = [
		    'cpc' => 'BG YOGYAKARTA',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------	
	public function tulungagung(){
		$codeuker = "08";
		$pembina 	= "KADIV LAYANAN";
		$post = [
		    'cpc' => 'BG TULUNGAGUNG',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function tasikmalaya(){
		$codeuker = "18";
		$pembina 	= "KADIV LAYANAN";
		$post = [
		    'cpc' => 'BG TASIKMALAYA',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function surabaya(){
		$codeuker = "05";
		$pembina 	= "WAKADIV CHM 2";
		$post = [
		    'cpc' => 'BG SURABAYA',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function sukabumi(){
		$codeuker = "27";
		$pembina 	= "KADIV CHM";
		$post = [
		    'cpc' => 'BG SUKABUMI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function solo(){
		$codeuker = "09";
		$pembina 	= "WAKADIV CHM 2";
		$post = [
		    'cpc' => 'BG SOLO',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function sintang(){
		$codeuker = "42";
		$pembina 	= "KABAG SPH";
		$post = [
		    'cpc' => 'BG SINTANG KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function semarang(){
		$codeuker = "12";
		$pembina 	= "WAKADIV CHM 2";
		$post = [
		    'cpc' => 'BG SEMARANG',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function sekayu(){
		$codeuker = "44";
		$pembina 	= "KABAG LND";
		$post = [
		    'cpc' => 'BG SEKAYU KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function sanggau(){
		$codeuker = "41";
		$pembina 	= "KABAG DSP";
		$post = [
		    'cpc' => 'BG SANGGAU KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function putusibau(){
		$codeuker = "39";
		$pembina 	= "KABAG CPC";
		$post = [
		    'cpc' => 'BG PUTUSIBAU KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function purwokerto(){
		$codeuker = "17";
		$pembina 	= "WAKADIV CHM 2";
		$post = [
		    'cpc' => 'BG PURWOKERTO',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function pemalang(){
		$codeuker = "16";
		$pembina 	= "WAKADIV CHM 2";
		$post = [
		    'cpc' => 'BG PEMALANG',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function pamekasan(){
		$codeuker = "23";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG PAMEKASAN',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function pati(){
		$codeuker = "15";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG PATI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function palembang(){
		$codeuker = "07";
		$pembina 	= "KADIV CHM";
		$post = [
		    'cpc' => 'BG PALEMBANG',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function pagar_alam(){
		$codeuker = "40";
		$pembina	= "KABAG SPH";
		$post = [
		    'cpc' => 'BG PAGAR ALAM KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function medan(){
		$codeuker = "06";
		$pembina 	= "KADIV LAYANAN";
		$post = [
		    'cpc' => 'BG MEDAN',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function padang(){
		$codeuker = "32";
		$pembina 	= "WAKADIV CHM 2";
		$post = [
		    'cpc' => 'BG PADANG',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function enim(){
		$codeuker = "46";
		$pembina 	= "KABAG ITM";
		$post = [
		    'cpc' => 'BG MUARA ENIM KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function melawi(){
		$codeuker = "45";
		$pembina 	= "KABAG ITM";
		$post = [
		    'cpc' => 'BG MELAWI KOLABORASI',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function malang(){
		$codeuker = "04";
		$pembina 	= "KADIV CHM";
		$post = [
		    'cpc' => 'BG MALANG',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function makasar(){
		// BG MAKASSAR 26
		$codeuker = "26";
		$pembina 	= "KADIV CHM";
		$post = [
		    'cpc' => 'BG MAKASSAR',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
	public function madiun(){
		// BG MADIUN 25
		$codeuker = "25";
		$pembina 	= "WAKADIV CHM 1";
		$post = [
		    'cpc' => 'BG MADIUN',
		];

		$this->crawler_bri2($codeuker, $pembina, $post);
	}
	// end prog------------------------------------------
}

/* End of file Cron_bri2.php */
/* Location: ./application/controllers/Cron_bri2.php */