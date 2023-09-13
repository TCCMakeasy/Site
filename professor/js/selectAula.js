const tabela = document.getElementById("tabela");
const btnDesmarcar = document.getElementById("desmarcarAula");
let tds = Array.from(tabela.getElementsByTagName("td"));
let ths = Array.from(tabela.getElementsByTagName("th"));

tabela.addEventListener("click", function (e) {
  const target = e.target;
  if (target.nodeName === "TD") {
    tds.forEach((td) => {
      td.classList.remove("selecionado");
    });
    target.classList.add("selecionado");
  }
});

const desmarcarAula = async (aula) => {
  fetch("./includes/desmarcarAula.php", {
    method: "POST",
    body: aula,
  })
    .then((response) => response.text())
    .then((response) => {
      if (response == "Aula desmarcada com sucesso!") {
          document.getElementById(aula).innerHTML = "";
          alert(response);
      } else {
        alert("Erro ao desmarcar aula, tente novamente mais tarde");
      }
    })
    .catch((error) => console.log("Erro: " + error));
};

btnDesmarcar.addEventListener("click", function (e) {
  
  try {
    var target = tabela.getElementsByClassName("selecionado")[0];
    var aula = target.id;
  } catch (error) {
    alert("Selecione uma aula");
    console.log(error);
    return;
  }
  if (target.innerHTML == ""){
    alert("Aula vazia não pode ser desmarcada");
    return;
  }else if (confirm("Deseja desmarcar a aula?")) {
    desmarcarAula(aula);
  }
});
