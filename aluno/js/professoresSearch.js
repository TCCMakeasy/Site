const text = document.getElementById("inputPesquisa");
const professores = document.getElementById("professores");
var searchtimer;

const pesquisa = async (text) =>{
    try {
        const response = await fetch("./includes/pesquisa.php", {
            method: "POST",
            body: text,
            headers: {
                'Content-Type': 'application/json' // Usando 'application/json' para o cabeçalho
            }
        });

        if (response.ok) {
            const data = await response.json(); // Aguarde a resolução da promessa JSON
            professores.innerHTML = "";
            if(data.erro){
                professores.innerHTML = "<h1>Nenhum professor encontrado</h1>";
            }else{
                data.forEach(element => {
                    professores.innerHTML += `
                    <li class="professor">
                    <img src="../fotosPerfil/${element.foto_professor}" alt="Foto do professor" class="imgProfessor">
                    <h1 id="nomeProfessor">${element.nome_professor}</h1>
                    <a id="saibaMais" href="saibamais.php?id=${element.id_professor}">Saiba Mais</a>
                    </li>
                    `;
                });
            }

        } else {
            console.error('Erro na solicitação:', response.status, response.statusText);
        }
    } catch (error) {
        console.error('Erro ao processar a solicitação:', error);
    }
}


window.addEventListener("DOMContentLoaded", () => {
  text.addEventListener("input", (e) => {
    clearTimeout(searchtimer);
    searchtimer = setTimeout(() => {
        const text = e.target.value
        pesquisa(text)
    }, 700);
  });
});
