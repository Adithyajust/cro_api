 <?php
	function cetak_die($data) {
	echo '<pre>';
		print_r($data);
	echo '</pre>';
	die();
	}
	function cetak($data) {
		echo '<pre>';
			print_r($data);
		echo '</pre>';
	}

	function lastq() {
		$ci =& get_instance();
		die($ci->EoBricash->last_query());
	}
	function lastz() {
		$ci =& get_instance();
		$ci->EoBricash->last_query();
	}
	function lastqbri(){
		$ci =& get_instance();
		die($ci->brix->last_query());
	}
	function lastqcroluar(){
		$ci =& get_instance();
		die($ci->croluar->last_query());
	}
?>