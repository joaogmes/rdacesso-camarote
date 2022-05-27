<?php
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : false;
$header_msg = '<div class="alert alert-info" role="alert">';
$footer_msg = '</div>';
if($senha){
  $zerar = resetar($senha);
    if($zerar){
      $msg = '<p><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Exclusão concluída</p><br><a href="./" class="btn btn-primary">Voltar à página inicial</a></p>';
    }else{
      $msg =  "<b>Senha incorreta</b>, sequencia de exclusão não iniciada";
    }
    echo $header_msg.$msg.$footer_msg;
}
?>
<div class="alert alert-danger" role="alert"><strong><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Alerta:</strong> você deseja mesmo apagar todos os cadastros contidos no sistema? OBS: essa ação é irreversível e os dados nunca mais serão recuperados.</div>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Sim, zerar os cadastros!</button>

<!-- Modal -->
<div id="myModal" class="modal fade text-center" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Credenciais de acesso</h4>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <label for="senha"">Insira a senha de administrador</label>
          <input type="password" name="senha" id="senha" required class="form-control">
        <p>Lembre-se de que a exclusão é permanente, só faça se tive certeza dessa ação!</p>
        <input type="submit" class="btn btn-danger" value="Apagar todos cadastros permanentemente!" autofocus>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>