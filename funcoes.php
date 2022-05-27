<?php
date_default_timezone_set('America/Sao_Paulo');
function conexao(){
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	$DB_NAME = 'camarote';
	try{
		$DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $DB_con;
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}
function uploadCamera($img, $user){
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$user = strtolower($user);
	$user = str_replace(" ", "", $user);
	$imagem = strtotime("now")."-".$user.".jpg";
	$caminho = './uploads/';
	file_put_contents($caminho.$imagem, $data);
	return $imagem;
}
function cadastrarCamera($user, $user_job, $empresa, $documento, $upload){
	$conn = conexao();
	$data = date("Y-m-d");
	$hora = date("H:i:s");
	$inserir = "INSERT INTO tbl_users (userName, userProfession, userPic, data, hora, documento, empresa) VALUES (
		'".$user."',
		'".$user_job."',
		'".$upload."',
		'".$data."',
		'".$hora."',
		'".$documento."',
		'".$empresa."'
	)";
	$stmt_inserir = $conn->prepare($inserir);
	if($stmt_inserir->execute()){
		return $user_job;
	}else{
		return false;
	}
}
function upload($imgFile, $tmp_dir, $imgSize, $username){
	$upload_dir = './uploads/';
	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
	$valid_extensions = array('jpeg', 'jpg', 'png');
	$userpic = rand(1000,1000000)."-".$username.".".$imgExt;
	if(in_array($imgExt, $valid_extensions)){
		if($imgSize < 5000000){
			move_uploaded_file($tmp_dir,$upload_dir.$userpic);
			// file_put_contents($upload_dir.$userpic, $imgFile);
			return $userpic;
		}
		else{
			$errMSG = "Desculpe, arquivo muito grande.";
			return $errMSG;
		}
	}
	else{
		$errMSG = "Desculpe, somente JPG, JPEG & PNG são aceitos.";
		return $errMSG;
	}
}
function resetar($senha){
	$conn = conexao();
	$senha_64 = base64_encode($senha);
	if($senha_64 == 'MjUwNw=='){
		$imagens = "SELECT userPic FROM tbl_users";
		$stmt_select = $conn->prepare($imagens);
		$stmt_select->execute();
		while($imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC)){
			unlink("uploads/".$imgRow['userPic']);
		}
		$stmt_delete = $conn->prepare('TRUNCATE tbl_users');
		$stmt_delete->execute();
		return true;
	}else{
		return false;
	}
}
function editar($id, $nome, $profissao, $foto){
		//ALTERA CADASTRO
}
function excluir($id){
	$conn = conexao();
	$fotos = "SELECT userPic FROM tbl_users WHERE userID =".$id;
	$stmt_select = $conn->prepare($fotos);
	$stmt_select->execute();
	$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
	unlink("uploads/".$imgRow['userPic']);
	$deletar = "DELETE FROM tbl_users WHERE userID = ".$id;
	$stmt_delete = $conn->prepare($deletar);
	if($stmt_delete->execute()){
		return true;;
	}else{
		return false;
	}
}
function verPessoa($id){
	$conn = conexao();
	$usuario = "SELECT * FROM tbl_users WHERE userProfession = '".$id."'";
	$stmt_usuario = $conn->prepare($usuario);
	$stmt_usuario->execute();
	if($stmt_usuario->rowCount()>0){
		$usuario = $stmt_usuario->fetch(PDO::FETCH_ASSOC);
		return $usuario;
	}else{
		return false;
	}
}
?>