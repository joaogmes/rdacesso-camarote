<?php
$usuario = (isset($_GET['id'])) ? $_GET['id'] : false;
if($usuario){
	$pessoa = verPessoa($usuario);
	if($pessoa){
		// var_dump($pessoa);
	}else{
		echo "Usuário não encontrado";
		die();
	}
}else{
		echo "Usuário não encontrado";
		die();
}
?>
<div class="row">
	<div class="col-xs-12 col-sm-12 ">
		<div class="well well-sm">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<img style="cursor: pointer;" onclick="window.location='?pagina=ver&id=<?php echo $pessoa['userProfession']; ?>'" src="./uploads/<?php echo $pessoa['userPic']; ?>" class="img-rounded" width="100%"  />
				</div>
				<div class="col-sm-6 col-md-6 ">
					<h4><i style="margin-right: 10px" class="glyphicon glyphicon-user"></i> <?php echo $pessoa['userName']; ?></h4>
					<p>
						<i style="margin-right: 10px" class="glyphicon glyphicon-barcode"></i><?php echo $pessoa['userProfession']; ?>
					</p>

					<p>
						<i style="margin-right: 10px" class="glyphicon glyphicon-briefcase"></i><?php echo $pessoa['empresa']; ?>
					</p>
					
					
					<p>
						<i style="margin-right: 10px" class="glyphicon glyphicon-list-alt"></i><?php echo $pessoa['documento']; ?>
					</p>
					
					
					<p>
					<i style="margin-right: 10px" class="glyphicon glyphicon-calendar"></i> <?php echo Date('d/m/Y', strtotime($pessoa['data'])); ?></p>
				</p>
				<p>
				<i style="margin-right: 10px" class="glyphicon glyphicon-time"></i> <?php echo $pessoa['hora']; ?></p>
			</p>
			<p class="page-header">
				<span>
					<a class="btn btn-danger" href="?pagina=excluir&id=<?php echo $pessoa['userID']; ?>" title="Clique aqui para excluir"><span class="glyphicon glyphicon-remove-circle"></span> Deletar</a>
				</span>
			</p>
		</div>
	</div>
</div>
</div>
<script>
// const myTimeout = setTimeout(myGreeting, 5000);

// function myGreeting() {
//   window.location.href='./';
// }
</script>