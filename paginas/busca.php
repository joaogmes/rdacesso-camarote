<?php

require_once 'dbconfig.php';

if(!isset($_GET['barcode']))
{
	die ("Código inválido");
}
if(isset($_GET['barcode']))
{
	if($_GET['barcode']==''){
		die("Código inválido");
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
	<title>Img PDO Crud</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
</head>

<body class="bd-top" style="">
	<div class="page-header page-top" style=""></div>


	<div class="container">

		<div class="page-header col-md-12 col-xs-12">
		<!-- <div class="jumbotron">
			<h1 class="h2" style="text-align: center; ">Acesso ao camarote </h1>
		</div> -->
		<hr>
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 mb-20 ">
			<a  class="btn " href="index" title="Lista os ultimos cadastros"> <span class="glyphicon glyphicon-eye-open"></span> &nbsp; Ver cadastros</a>
			
			<a  class="btn pull-right " href="index?limpar=1" title="Apaga todos os registros" onclick="return confirm('Confirma a exclusão de todos os dados cadastrados? OBS: A exclusão é permanente')"> <span class="glyphicon glyphicon-trash"></span> &nbsp; Zerar</a> 
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 mb-20">
			<form action="busca" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" name="barcode" autofocus placeholder="Pesquisa por código">

					<span class="input-group-btn">
						<input type="submit" class="btn btn-default" type="button" value="Buscar!">
					</span>
				</div><!-- /input-group -->
			</form>

		</div><!-- /.row -->
		<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3  pull-right">
			
			<a style="margin-right: 10px" class="btn btn-info " href="cadastro" title="Cadastro com foto via arquivo"> <span class="glyphicon glyphicon-camera"></span> &nbsp; Cadastrar</a> 
			<a  class="btn btn-primary" href="cadastro-camera" title="Cadastro com foto via WebCam"> <span class="glyphicon glyphicon-facetime-video"></span> &nbsp; Cadastrar</a> 
		</div>
	</div>




	<br />
	<div class="row">
		<h3 style="text-align: center;">Resultado da busca por : <?php echo $_GET['barcode']; ?></h3>
	</div>
	<?php
	$barcode = $_GET['barcode'];
	$stmt = $DB_con->prepare('SELECT * FROM tbl_users where userProfession = "'.$barcode.'" or empresa LIKE "%'.$barcode.'%" or userName LIKE "%'.$barcode.'%" ORDER BY userID DESC ');
	$stmt->execute();

	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			
			<div class="row">
				
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 ">
							<div class="well well-sm">
								<div class="row">
									<div class="col-sm-6 col-md-6">
										<img style="cursor: pointer;" onclick="window.location='?pagina=ver&id=<?php echo $userProfession; ?>'" src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="100%"  />
									</div>
									<div class="col-sm-6 col-md-6 ">
										<h4><i style="margin-right: 10px" class="glyphicon glyphicon-user"></i> <?php echo $userName; ?></h4>
										<p>
											<i style="margin-right: 10px" class="glyphicon glyphicon-barcode"></i><?php echo $userProfession; ?>
										</p>
										<?php
										if($empresa != ""){
											?>
											<p>
											<i style="margin-right: 10px" class="glyphicon glyphicon-briefcase"></i><?php echo $empresa; ?>
										</p>
											<?php
										}
										?>
										<?php
										if($documento != ""){
											?>
											<p>
											<i style="margin-right: 10px" class="glyphicon glyphicon-list-alt"></i><?php echo $documento; ?>
										</p>
											<?php
										}
										?>
										<p>
											<i style="margin-right: 10px" class="glyphicon glyphicon-calendar"></i> <?php echo Date('d/m/Y', strtotime($data)); ?></p>
										</p>
										<p>
											<i style="margin-right: 10px" class="glyphicon glyphicon-time"></i> <?php echo $hora; ?></p>
										</p>
										<p class="page-header">
											<span>
												<a class="btn btn-info" href="editar?edit_id=<?php echo $row['userID']; ?>" title="Clique aqui para editar" onclick="return confirm('Confirma a edição do registro ?')"><span class="glyphicon glyphicon-edit"></span> Editar</a> 
												<a class="btn btn-danger" href="index?delete_id=<?php echo $row['userID']; ?>" title="Clique aqui para excluir" onclick="return confirm('O registro será excluido permanentemente, tem certeza que deseja prosseguir ?')"><span class="glyphicon glyphicon-remove-circle"></span> Deletar</a>
											</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
			}
		}
		else
		{
			?>
			<div class="col-xs-12">
				<div class="alert alert-warning">
					<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Nenhum cadastro até o momento
				</div>
			</div>
			<?php
		}

		?>
	</div>	





</div>


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">

var pressedCtrl = false; 

//Quando uma tecla for liberada verifica se é o CTRL para notificar que CTRL não está pressionado
document.onkeyup=function(e){ 
	if(e.which == 17) 
	pressedCtrl =false;
}


// Quando alguma tecla for pressionada:
// Primeiro if - verifica se é o CTRL e avisa que CTRL está pressionado
// Segundo if - verifica se a tecla é o "s" (keycode 83) para executar a ação


document.onkeydown=function(e){
	if(e.which == 17)
		pressedCtrl = true; 

	if(e.which == 18 && pressedCtrl == true) { 
		//Aqui vai o código e chamadas de funções para o ctrl+alt
		window.location.href = "cadastro-camera";
	}else if(e.which == 220 && pressedCtrl == true) { 
		//Aqui vai o código e chamadas de funções para o ctrl+\
		window.location.href = "cadastro";
	
	}else if(e.which == 225 && pressedCtrl == true) { 
		//Aqui vai o código e chamadas de funções para o ctrl+altgr
		window.location.href = "listar";
	}
	else if(e.which == 48 && pressedCtrl == true) { 
		//Aqui vai o código e chamadas de funções para o ctrl+0
		document.getElementById("exclusao").click();
	}
}
</script>

</body>
</html>