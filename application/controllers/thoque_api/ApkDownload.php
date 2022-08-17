<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class ApkDownload extends REST_Controller {

    public function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    public function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $apkversion = $this->db->get('apk_version')->result();
			
			//$responsea["status"] = "true";
			//$responsea["result"] = array();
			$responsea = array();
            foreach($apkversion as $k){
				$h["id_apk"] = $k->id_apk;
				$h["versioncode"] = $k->versioncode;
				$h["versionname"] = $k->versionname;
				$h["features"] = $k->features;
				$h["url"] = $k->url;
				$h["length"] = $k->length;
				array_push($responsea, $h);
            }
			//echo json_encode($responsea);
			$aDlin = seo_jsn1(json_encode($responsea));
			$bDlin = seo_jsn2($aDlin);
			$cDlin = seo_awal($bDlin);
			$dDlin = seo_akhir($cDlin);
			echo $dDlin;
			/*$fp = fopen('getVersion.txt', 'w');
			fwrite($fp, $dDlin);
			fclose($fp);*/
        } else {
            $this->db->where('id_apk', $id);
            $apkversion = $this->db->get('apk_version')->result();
			$zDlin=seo_jsn1($apkversion);
			$this->response($zDlin, 200);
        }

    }
	
	public function index_post() {
        $data = array('id_apk' => $this->post('id_apk'));
        $insert = $this->db->insert('apk_version', $data);
        if ($insert) {
			//$zDlin=seo_jsn1($data);
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
	
}
?>