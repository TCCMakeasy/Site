const pesquisaProfessor = document.getElementById("pesquisaProfessor");
const pesquisaAluno = document.getElementById("pesquisaAluno");
const professores = document.getElementById("usersProfessores");
const alunos = document.getElementById("usersAlunos");
var searchtimer;

const pesquisa = async (text, tipo) => {
  try {
    const response = await fetch("./includes/pesquisa" + tipo + ".php", {
      method: "POST",
      body: text,
      headers: {
        "Content-Type": "application/json", // Usando 'application/json' para o cabeçalho
      },
    });

    if (response.ok) {
      const data = await response.json(); // Aguarde a resolução da promessa JSON
      if (tipo == "Aluno") {
        alunos.innerHTML = "";
        if (data.erro) {
          alunos.innerHTML = "<h1>Nenhum aluno encontrado</h1>";
        } else {
          data.forEach((element) => {
            alunos.innerHTML += `
                    <li class="user">
                    <img src="../fotosPerfil/${element.foto_aluno}" alt="Foto do aluno" class="imgUser">
                    <h1 id="nomeUser">${element.nome_aluno}</h1>
                    <a id="saibaMais" href="gerenciarAluno.php?id=${element.id_aluno}">Saiba Mais</a>
                    </li>
                    `;
          });
        }
      } else {
        professores.innerHTML = "";
        if (data.erro) {
          professores.innerHTML = "<h1>Nenhum professor encontrado</h1>";
        } else {
          data.forEach((element) => {
            professores.innerHTML += `
                    <li class="user">
                    <img src="../fotosPerfil/${element.foto_professor}" alt="Foto do professor" class="imgUser">
                    <h1 id="nomeUser">${element.nome_professor}</h1>
                    <a id="saibaMais" href="gerenciarProfessor.php?id=${element.id_professor}">Saiba Mais</a>
                    </li>
                    `;
          });
        }
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
  pesquisaProfessor.addEventListener("input", (e) => {
    clearTimeout(searchtimer);
    searchtimer = setTimeout(() => {
      const text = e.target.value;
      console.log(text)
      const tipo = "Professor";
      pesquisa(text, tipo);
    }, 700);
  });
  pesquisaAluno.addEventListener("input", (e) => {
    clearTimeout(searchtimer);
    searchtimer = setTimeout(() => {
      const text = e.target.value;
      console.log(text)
      const tipo = "Aluno";
      pesquisa(text, tipo);
    }, 700);
  });
});
