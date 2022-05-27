<?php
error_reporting(error_reporting() & ~E_NOTICE & ~E_WARNING);
date_default_timezone_set('America/Sao_Paulo');
if(isset($_GET['ordem'])){
	$ordem = $_GET['ordem'];
}else{
	$ordem = 'userID DESC';
}
$query = "SELECT * FROM tbl_users ORDER BY ".$ordem;
$stmt = $DB_con->prepare($query);
$stmt->execute();
?>
<?php
$html1 = '
<style>
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}
td, th {
border-top: 1px solid #dddddd;
text-align: left;
padding: 8px;
}
tr:nth-child(even) {
background-color: #f0f0f0;
}
</style>
<div class="row">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
				<div class="">
					<center>
					<h1>RD Sistema de Acesso</h1>
					<h3>Relatório de acessos ao camarote</h3>
					</center>
					<p class="breadcrumb">Dados gerados em '.date("d/m/Y").' às '.date("H:i:s").'</p>
					<div class="row">
						<table>
							<thead>
								<tr>
									<th>#</th>
									<th>Nome</th>
									<th>Documento</th>
									<th>Empresa</th>
									<th>Código</th>
									<th>Data</th>
									<th>Hora</th>
								</tr>
							</thead>
							<tbody>';
								$htmlRow = "";
								while($usuario = $stmt->fetch(PDO::FETCH_ASSOC)){
								$htmlRow  .= '				<tr>
									<td width="5%">'.$usuario['userID'].'	</td>
									<td width="12%">'.$usuario['userName'].'</td>
									<td width="20">'.$usuario['documento'].'</td>
									<td width="20%">'.$usuario['empresa'].'</td>
									<td width="15%">'.$usuario['userProfession'].'</td>
									<td width="10%">'.date ('d/m/Y',  strtotime($usuario['data'])).'</td>
									<td width="10%">'.$usuario['hora'].'</td>
								</tr>';
}
								
								
							$html2 = '					</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
';
$html = $html1.$htmlRow.$html2;
//==============================================================
//==============================================================
//==============================================================
include("./mpdf60/mpdf.php");
$mpdf=new mPDF();
$mpdf->SetDisplayMode('fullpage');
/* Propriedades do documento PDF */
$mpdf->SetAuthor('RD Sistema de Acesso'); // Autor
$mpdf->SetSubject("Controle de acessos ao camarote em ".date('d/m/Y')); //Assunto
$mpdf->SetTitle('Relatório de acessos ao camarote em '.date('d/m/Y')); //Titulo
$mpdf->SetKeywords('RD, Sistema, Acesso, camarote'); //Palavras chave
$mpdf->SetCreator('João Pedro Gomes'); //Criador
// LOAD a stylesheet
$stylesheet = file_get_contents('./mpdf60/examples/mpdfstyleA4.css');
$stylesheet = file_get_contents('./bootstrap/css/bootstrap.min.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
$mpdf->WriteHTML($html);
ob_clean();
$mpdf->Output('Relatório camarote '.date('d-m-Y') , 'I');
exit;
//==============================================================
//==============================================================
//==============================================================
?>