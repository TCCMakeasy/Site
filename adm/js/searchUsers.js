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
            var nome_aluno = element.nome_aluno.split(" ");
            if (nome_aluno.length > 2) {
              if (nome_aluno[1].length >= 7) {
                nome_aluno[0] += " " + nome_aluno[1];
              } else {
                nome_aluno[0] +=
                  " " + nome_aluno[1] + " " + nome_aluno[2];
              }
            }
            alunos.innerHTML += `
                    <li class="user">
                    <img src="../fotosPerfil/${element.foto_aluno}" alt="Foto do aluno" class="imgUser">
                    <h1 id="nomeUser">${nome_aluno[0]}</h1>
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
                    <li class="user">
                    <img src="../fotosPerfil/${element.foto_professor}" alt="Foto do professor" class="imgUser">
                    <h1 id="nomeUser">${nome_professor[0]}</h1>
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
      console.log(text);
      const tipo = "Professor";
      pesquisa(text, tipo);
    }, 700);
  });
  pesquisaAluno.addEventListener("input", (e) => {
    clearTimeout(searchtimer);
    searchtimer = setTimeout(() => {
      const text = e.target.value;
      console.log(text);
      const tipo = "Aluno";
      pesquisa(text, tipo);
    }, 700);
  });
});

document.addEventListener("DOMContentLoaded", function() {
  pesquisa("", "Aluno");
  pesquisa("", "Professor");
});