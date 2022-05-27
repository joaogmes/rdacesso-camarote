<?php
require_once('config.php');
require_once('funcoes.php');
$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'].'.php' : 'home.php';
include('header.php');
include('./paginas/'.$pagina);
include('footer.php');
die('');