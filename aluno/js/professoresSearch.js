const text = document.getElementById("inputPesquisa");
const professores = document.getElementById("professores");
var searchtimer;

const pesquisa = async (text) => {
  try {
    const response = await fetch("./includes/pesquisa.php", {
      method: "POST",
      body: text,
      headers: {
        "Content-Type": "application/json", // Usando 'application/json' para o cabeçalho
      },
    });

    if (response.ok) {
      const data = await response.json(); // Aguarde a resolução da promessa JSON
      professores.innerHTML = "";
      if (data.erro) {
        professores.innerHTML = "<h1>Nenhum professor encontrado</h1>";
      } else {
        data.forEach((element) => {
          var nome_professor = element.nome_professor.split(" ");
          if (nome_professor.length > 2) {
            if (nome_professor[1].length >= 7) {
              nome_professor[0] += " " + nome_professor[1];
            } else {
              nome_professor[0] +=
                " " + nome_professor[1] + " " + nome_professor[2];
            }
          }
          professores.innerHTML += `
                    <li class="professor">
                    <img src="../fotosPerfil/${element.foto_professor}" alt="Foto do professor" class="imgProfessor">
                    <h1 id="nomeProfessor">${nome_professor[0]}</h1>
                    <a id="saibaMais" href="saibamais.php?id=${element.id_professor}">Saiba Mais</a>
                    </li>
                    `;
        });
      }
    } else {
      console.error(
        "Erro na solicitação:",
        response.status,
        response.statusText
      );
    }
  } catch (error) {
    console.error("Erro ao processar a solicitação:", error);
  }
};

window.addEventListener("DOMContentLoaded", () => {
  pesquisa("");
  text.addEventListener("input", (e) => {
    clearTimeout(searchtimer);
    searchtimer = setTimeout(() => {
      const text = e.target.value;
      pesquisa(text);
    }, 700);
  });
});
