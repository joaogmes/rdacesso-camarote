jQuery(function($){

})
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
	if(e.which == 45 && pressedCtrl == true) {
//Aqui vai o código e chamadas de funções para o ctrl+insert
window.location.href = "./?pagina=cadastro-camera";
}
else if(e.which == 46 && pressedCtrl == true) {
//Aqui vai o código e chamadas de funções para o ctrl+delete
window.location.href = "./?pagina=zerar";
}
else if(e.which == 36 && pressedCtrl == true) {
//Aqui vai o código e chamadas de funções para o ctrl+home
window.location.href = "./";
}else if(e.which == 35 && pressedCtrl == true) {
//Aqui vai o código e chamadas de funções para o ctrl+end
window.open("./?pagina=relatorio");
}
else if(e.which == 220 && pressedCtrl == true) {
//Aqui vai o código e chamadas de funções para o ctrl+\
window.location.href = "./?pagina=cadastro";
}
else if(e.which == 18 && pressedCtrl == true) {
//Aqui vai o código e chamadas de funções para o ctrl+altgr
window.location.href = "./?pagina=listar";
}
}
function senha(){
	var item = prompt("Qual objeto você deseja incluir na lista?", "Adicione um novo objeto");
	if (item == null || item == "") {
		alert("O uso do prompt foi cancelado!");
	} else {
		alert(item);
	}
}