<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cek</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		// $cek2 =
		// $al0 = strtotime('20-10-2021 14:15');
		// $al00 = '00:15'; $al02 = '02:15'; $al04 = '04:15'; $al06 = '06:15'; $al08 = '08:15'; $al10 = '10:15'; $al12 = '12:15'; $al14 = '14:15'; $al16 = '16:15';
		// $al18 = '18:15'; $al20 = '20:15'; $al22 = '22:15';


		// $jam_update00 = $alnow.' '.$al00;
		// $jam_update02 = $alnow.' '.$al02;
		// $jam_update04 = $alnow.' '.$al04;
		// $jam_update06 = $alnow.' '.$al06;
		// $jam_update08 = $alnow.' '.$al08;
		// $jam_update10 = $alnow.' '.$al10;
		// $jam_update12 = $alnow.' '.$al12;
		// $jam_update14 = $alnow.' '.$al14;
		// $jam_update16 = $alnow.' '.$al16;
		// $jam_update18 = $alnow.' '.$al18;
		// $jam_update20 = $alnow.' '.$al20;
		// $jam_update22 = $alnow.' '.$al22;


		$alnow = date('Y-m-d');
		$waktu_upt = date('Y-m-d H:i');

		if (strtotime($waktu_upt) < strtotime($alnow.' '.'00:20')){
			echo('ayo update');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'02:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'02:20')){
			echo('tunggu lagi 02');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'04:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'04:20')){
			echo('tunggu lagi 04');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'06:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'06:20')){
			echo('tunggu lagi 06');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'08:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'08:20')){
			echo('tunggu lagi 08');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'10:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'10:20')){
			echo('tunggu lagi 10');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'12:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'12:20')){
			echo('tunggu lagi 12');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'14:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'14:20')){
			echo('tunggu lagi 14');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'16:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'16:20')){
			echo('tunggu lagi 16');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'18:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'18:20')){
			echo('tunggu lagi 18');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'20:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'20:20')){
			echo('tunggu lagi 20');
		}elseif(strtotime($waktu_upt) > strtotime($alnow.' '.'22:00') && strtotime($waktu_upt) < strtotime($alnow.' '.'22:20')){
			echo('tunggu lagi 22');
		}else{
			// $cek = strtotime($alnow.' '.'02:00');
			echo('Belum waktu update');

		}


		// $jams_update = strtotime($jam_batas);
		// $jams_update00 = strtotime($jam_update00);
		
		// print_r($jams_update00); print_r(' - ');
		// print_r($jams_update);
	?>
</body>
</html>
