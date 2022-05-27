<?php
$host = 'localhost';
$db = 'camarote';
$user = 'root';
$pass = '';

$sql = file_get_contents('camarote.sql');
try{
	$DB_con = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	if($e->getMessage() == "SQLSTATE[HY000] [1049] Unknown database 'camarote'"){
		$DB_con = new PDO("mysql:host={$host};",$user,$pass);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $DB_con->prepare($sql);
		if($stmt->execute()){
			echo "<script>window.location.href='./';</script>";
		}
	}
}

?>
