<?php
$barcode=(isset($_POST['barcode'])) ? $_POST['barcode'] : false;
if($barcode){
	echo "<script>window.location.href='?pagina=ver&id=".$barcode."';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
		<!-- <meta HTTP-EQUIV='refresh' CONTENT='10;index'> -->
		<title>RD Acesso | Camarotes</title>
		<script src="bootstrap/js/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
		<!-- <link rel="stylesheet" href="bootstrap/js/jquery-2.2.4.js"> -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
		<style>
			.mb-5{
				margin-bottom: 5em;
			}
		</style>
	</head>
	<body class="bd-top">
		<a href=""><div class="page-header page-top" style=""></div></a>
		<div class="container" id="menu-novo">
			<nav class="hidden-xs hidden-sm">
				<ul class="pagination">
					<li><a><strong>Atalhos</strong></a></li>
					<li><a>Ctrl + Home » Página Inicial</a></li>
					<li><a>Ctrl + Insert » Cadastro com Câmera</a></li>
					<li><a>Ctrl + Alt » Listar</a></li>
					<li><a>Ctrl + End » Relatório</a></li>
					<li><a class="text-danger">Ctrl + Delete » Zerar</a></li>
				</ul>
			</nav>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="?">RD Camarotes</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" aria-expanded="false" style="height: 1px;">
						<ul class="nav navbar-nav">
							<li class=""><a href="?pagina=cadastro-camera"><strong><i class="glyphicon glyphicon-camera"></i>&nbsp; Cadastrar</strong></a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Outros <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?pagina=cadastrar">Cadastro sem câmera</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="?pagina=listar&tipo=todos">Listar todos</a></li>
									<li><a href="?pagina=listar&tipo=recentes">Listar recentes</a></li>
								</ul>
							</li>
						</ul>
						<form class="navbar-form navbar-right" action="" method="POST" role="search">
							<div class="form-group">
								<input type="text" class="form-control" autofocus name="barcode" placeholder="Código pulseira">
							</div>
							<input type="submit" class="btn btn-default" value="buscar">
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Avançado <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="?pagina=relatorio">Relatório</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="?pagina=zerar">Zerar</a></li>
								</ul>
							</li>
						</ul>
						</div><!-- /.navbar-collapse -->
						</div><!-- /.container-fluid -->
					</nav>
				</div>
				<div class="container">