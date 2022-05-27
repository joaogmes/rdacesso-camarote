<?php
if(isset($_GET['ordem'])){
	$ordem = $_GET['ordem'];
}else{
	$ordem = 'userID DESC';
}
$tipo = (isset($_GET['tipo'])) ? $_GET['tipo'] : 'todos';
switch ($tipo) {
	case 'todos':
		$query_tipo = ' ';
		break;
	
	case 'recentes':
		$query_tipo = ' LIMIT 12 ';

	default:
		$query_tipo = ' ';
		break;
}
?>
<div class="col-md-12 col-xs-12">
	<center>
		<a style="margin-right: -20px" class="btn " href="./?pagina=listar&ordem=UserID ASC">Número &nbsp; <span class="glyphicon glyphicon-chevron-up"></span> </a>
		<a style="margin-right: 10px" class="btn " href="./?pagina=listar&ordem=UserID DESC">&nbsp; <span class="glyphicon glyphicon-chevron-down"></span> </a>
		<a style="margin-right: -20px" class="btn " href="./?pagina=listar&ordem=UserName ASC">Nome &nbsp; <span class="glyphicon glyphicon-chevron-up"></span> </a>
		<a style="margin-right: 10px" class="btn " href="./?pagina=listar&ordem=UserName DESC">&nbsp; <span class="glyphicon glyphicon-chevron-down"></span> </a>
		<a style="margin-right: -20px" class="btn " href="./?pagina=listar&ordem=empresa ASC">Empresa &nbsp; <span class="glyphicon glyphicon-chevron-up"></span> </a>
		<a style="margin-right: 10px" class="btn " href="./?pagina=listar&ordem=empresa DESC">&nbsp; <span class="glyphicon glyphicon-chevron-down"></span> </a>
		<a style="margin-right: -20px" class="btn " href="./?pagina=listar&ordem=hora ASC">Hora &nbsp; <span class="glyphicon glyphicon-chevron-up"></span> </a>
		<a style="margin-right: 10px" class="btn " href="./?pagina=listar&ordem=hora DESC">&nbsp; <span class="glyphicon glyphicon-chevron-down"></span> </a>

		<a class="btn pull-right" href="./?pagina=relatorio&ordem=<?php echo $ordem ?>" target="_blank"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp; Relatorio  </a>
		<hr style="width: 100%; display: inline-block;">
	</center>
</div>
<br />
<div class="row">
	<h3 style="text-align: center;">Cadastros</h3>
</div>
<div class="row">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 ">
				<div class="">
					<div class="row">
						<table class="table table-resposive table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Documento</th>
									<th>Empresa</th>
									<th>Código</th>
									<th>Data</th>
									<th>Hora</th>
									<th>Foto</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$stmt = $DB_con->prepare('SELECT * FROM tbl_users ORDER BY '.$ordem.$query_tipo);
								$stmt->execute();
								if($stmt->rowCount() > 0)
								{
									while($row=$stmt->fetch(PDO::FETCH_ASSOC))
									{
										extract($row);
										?>
										<tr>
											<td scope="row"><?php echo $userID	?>	</td>
											<td><?php echo $userName; ?></td>
											<td><?php echo $documento; ?></td>
											<td><?php echo $empresa; ?></td>
											<td><?php echo $userProfession; ?></td>
											<td><?php echo date ('d/m/Y',  strtotime($data)); ?></td>
											<td><?php echo $hora; ?></td>
											<td><img src="./uploads/<?php echo $userPic; ?>" width="50px"></td>
										</tr>
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
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>