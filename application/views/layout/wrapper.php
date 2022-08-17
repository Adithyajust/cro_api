<?php
// proteksi halaman
$this->my_login->check_login();
// wrapper menggabungkan bagian louyout
require_once('head.php');
require_once('header.php');
require_once('menu.php');
require_once('content.php');
require_once('footer.php');
