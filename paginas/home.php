<div class="row">
	<h3 style="text-align: center;">Usuários</h3>
</div>
<div class="row">
	<?php
	$stmt = $DB_con->prepare('SELECT * FROM tbl_users ORDER BY userID DESC LIMIT 12');
	$stmt->execute();
	if($stmt->rowCount() > 0){
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
			extract($row);
			?>
			<div class="col-lg-3 col-sm-6 col-xs-12">
				<p class="page-header" style="cursor: pointer;text-align: center;" onclick="window.location='?pagina=ver&id=<?php echo $userProfession; ?>'">
					<i class="glyphicon glyphicon-user" style="margin-right: 10px"></i>
					<?php echo $userName ?>
					<br>
					<i class="glyphicon glyphicon-barcode" style="margin-right: 10px"></i>
					<?php echo $userProfession; ?></p>
					<img style="cursor: pointer;" onclick="window.location='?pagina=ver&id=<?php echo $userProfession; ?>'" src="uploads/<?php echo $row['userPic']; ?>" class="img-rounded" width="100%" />
					<p class="page-header">
						<span>
							<a class="btn btn-info" href="?pagina=ver&id=<?php echo $userProfession; ?>" title="Clique aqui para visualizar"><span class="glyphicon glyphicon-eye-open"></span> Ver cadastro</a>
							<a class="btn btn-danger" href="?pagina=excluir&id=<?php echo $row['userID']; ?>" title="Clique aqui para excluir"><span class="glyphicon glyphicon-remove-circle"></span> Deletar</a>
						</span>
					</p>
				</div>
				<?php
			}
		}else{
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
	<script>
		const myTimeout = setTimeout(myGreeting, 10000);
		function myGreeting() {
			window.location.href='./';
		}
	</script>