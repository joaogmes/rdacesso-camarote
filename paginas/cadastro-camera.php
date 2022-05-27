<?php
$img = (isset($_POST['user_image'])) ? $_POST['user_image'] : false;
if($img){
    $user = $_POST['user_name'];
    $user_job = $_POST['user_job'];
    $empresa = $_POST['empresa'];
    $documento = $_POST['documento'];
    $upload = uploadCamera($img, $user);
    if($upload){
        $cadastro = cadastrarCamera($user, $user_job, $empresa, $documento, $upload);
        if($cadastro){
            echo "<script>window.location.href='./?pagina=ver&id=".$cadastro."';</script>";
            die("Cadastro feito com sucesso!");
        }else{
            die("Erro ao cadastrar usuario no banco de dados");
        }
    }else{
        die("Erro ao cadastrar imagem da camera");
    }

}
?>
<div class="row">
    <div class="col-md-6" style="margin-bottom:5em">
        <form class="" method="post" enctype="multipart/form-data" class="form-horizontal">
            <table class="table table-bordered table-responsive">
                <tr>
                    <td><label class="control-label">Nome.</label></td>
                    <td><input autocomplete="off" class="form-control" type="text" name="user_name" placeholder="Nome da pessoa" value="" required /></td>
                </tr>
                <tr>
                    <td><label class="control-label">Empresa.</label></td>
                    <td><input autocomplete="off" class="form-control" type="text" name="empresa" placeholder="Empresa" value="" /></td>
                </tr>
                <tr>
                    <td><label class="control-label">Documento.</label></td>
                    <td><input autocomplete="off" class="form-control" type="text" name="documento" placeholder="Documento da pessoa" value="" /></td>
                </tr>
                <!-- <tr> -->
                    <!-- <td><label class="control-label">Foto</label></td> -->
                    <input class="input-group form-control" type="hidden" id="teste" name="user_image" />
                    <!-- </tr> -->
                    <tr>
                        <td><label class="control-label">Código.</label></td>
                        <td><input autocomplete="off" class="form-control" type="text" name="user_job" placeholder="0101010011" required value="" /></td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-save"></span> &nbsp; Salvar
                </button>
            </form>
        </div>
        <div class="col-md-6">
            <form action="./?pagina=cadastro-camera" method="post" id="form">
            </form>
            <button class="btn btn-default" id="capture">
                Tirar Foto
            </button>
            <!-- <button class="btn btn-default" id="upload">Salvar Foto</button> -->
            <button class="btn btn-default" id="reset">Resetar</button>
            <video id="video"></video>
            <canvas id="canvas"></canvas>
        </div>
    </div>
    <script type="text/javascript">
// navigator.mediaDevices.getUserMedia({
//     video: true
// })
// .then(function (stream) {
//     var video = document.querySelector('#video');
//     video.srcObject = stream;
//     video.play();
// })
// function play(){
//     navigator.mediaDevices.getUserMedia({
//         video: true
//     })
//     .then(function (stream) {
//         var video = document.querySelector('#video');
//         video.srcObject = stream;
//         video.play();
//     })
// }
// document.querySelector('#capture').addEventListener('click', function (e) {
//     var canvas = document.querySelector("#canvas");
//     canvas.height = video.videoHeight;
//     canvas.width = video.videoWidth;
//     var context = canvas.getContext('2d');
//     context.drawImage(video, 0, 0)
// })
// document.querySelector('#upload').addEventListener('click', function (e) {
//     var canvas = document.querySelector("#canvas");
//     canvas.toBlob(function (blob) {
//         var form = new FormData();
//         form.append('image', blob, 'webcam.jpg');
//         var xhr = new XMLHttpRequest();
//         xhr.open('POST', './', true);
//         xhr.onload = function(e) {
//             console.log('upload concluído');
//         };
//         xhr.send(form);
//     }, 'image/jpeg');
// })
jQuery(function($){
    $(document).ready(function(){
        function play(){
            navigator.mediaDevices.getUserMedia({
                video: true
            })
            .then(function (stream) {
                var video = document.querySelector('#video');
                video.srcObject = stream;
                video.play();
            })
        }
        play();
        $("#upload").click(function(){
            document.getElementById('teste').value = canvas.toDataURL('image/png');
        })
        $("#capture").click(function(){
            var canvas = document.querySelector("#canvas");
            canvas.height = video.videoHeight;
            canvas.width = video.videoWidth;
            var context = canvas.getContext('2d');
            context.drawImage(video, 0, 0);
            document.getElementById('teste').value = canvas.toDataURL('image/png');
            $("#video").hide();
        })
        $("#reset").click(function(){
            var canvas = document.getElementById('canvas');
            var context = canvas.getContext('2d');
            context.clearRect(0, 0, canvas.width, canvas.height);
            $("#video").show();
        })
    })
})
</script>