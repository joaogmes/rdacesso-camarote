<?php
if(isset($_POST['btnsave'])){
		$username = (isset($_POST['user_name'])) ? $_POST['user_name'] : ''; ;// user name
		$userjob = (isset($_POST['user_job'])) ? $_POST['user_job'] : ''; ;// user email
		$documento = (isset($_POST['documento'])) ? $_POST['documento'] : ''; ;// user email
		$empresa = (isset($_POST['empresa'])) ? $_POST['empresa'] : ''; ;
		$imgFile = (isset($_FILES['user_image']['name'])) ? $_FILES['user_image']['name'] : ''; '';
		$tmp_dir = (isset($_FILES['user_image']['tmp_name'])) ? $_FILES['user_image']['tmp_name'] : ''; '';
		$imgSize = (isset($_FILES['user_image']['size'])) ? $_FILES['user_image']['size'] : ''; '';
		
		$upload = upload($imgFile, $tmp_dir, $imgSize, $username);
		if($upload){
			$cadastro = cadastrarCamera($username, $userjob, $empresa, $documento, $upload);
echo "<script>window.location.href='./?pagina=ver&id=".$cadastro."';</script>";
}else{
echo $upload;
}
}
?>
<div class="page-header" style="text-align: center">
	<h1 class="h2">Adicionar Registro </h1>
</div>
<div class="col-md-12">
	<form method="post" enctype="multipart/form-data" class="form-horizontal">
		<table class="table table-bordered table-responsive">
			<tr>
				<td><label class="control-label">Nome.</label></td>
				<td><input class="form-control" type="text" name="user_name" placeholder="Nome da pessoa" value="<?php echo $username; ?>" required/></td>
			</tr>
			<tr>
				<td><label class="control-label">Empresa.</label></td>
				<td><input class="form-control" type="text" name="empresa" placeholder="Empresa" value="<?php echo $empresa; ?>" /></td>
			</tr>
			<tr>
				<td><label class="control-label">Documento.</label></td>
				<td><input class="form-control" type="text" name="documento" placeholder="Documento da pessoa" value="<?php echo $documento; ?>" /></td>
			</tr>
			<tr>
				<td><label class="control-label">Foto</label></td>
				<td><input class="input-group" type="file" name="user_image" accept="image/*" required/></td>
			</tr>
			<tr>
			</tr>
			<tr>
				<td><label class="control-label">Código.</label></td>
				<td><input class="form-control" type="text" name="user_job" placeholder="0101010011" value="<?php echo $userjob; ?>" required/></td>
			</tr>
		</table>
		<button type="submit" name="btnsave" class="btn btn-primary pull-right">
		<span class="glyphicon glyphicon-save"></span> &nbsp; Salvar
		</button>
	</form>
</div>
