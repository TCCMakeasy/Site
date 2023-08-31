var tabela = document.getElementById("Tabela");
var linhas = tabela.getElementsByTagName("tr");
var colunas = tabela.getElementsByTagName("th")

for(var i = 0; i < linhas.length; i++){
	var linha = linhas[i];
	var coluna = colunas[i];
    linha.addEventListener("click", function(){
	    selLinha(this, false);
	    selColuna(this, false);
    });
}
function selLinha(linha, multiplos){
    if(!multiplos){
        var linhas = linha.parentElement.getElementsByTagName("tr");
        var colunas = linha.parentElement.getElementsByTagName("th");
          for(var i = 0; i < linhas.length; i++){
             var linha_ = linhas[i];
             linha_.classList.remove("selecionado");    
          }
    }
    linha.classList.toggle("selecionado");
  }