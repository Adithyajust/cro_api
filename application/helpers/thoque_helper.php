<?php
	function seo_awal($x) {
		$e = array ('[{');
		$x = str_replace($e, '{', $x);
		return $x;
	}
	function seo_akhir($x) {
		$e = array ('}]');
		$x = str_replace($e, '}', $x);
		return $x;
	}
	function seo_jsn1($x) {
		$e = array ('\\n');
		$x = str_replace($e, 'n', $x);
		return $x;
	}
	function seo_jsn2($x) {
		$e = array ('\/');
		$x = str_replace($e, '/', $x);
		return $x;
	}
	
	function seo_bost($x) {
		$e = array (' | ');
		$x = str_replace($e, '#', $x);
		return $x;
	}
?>