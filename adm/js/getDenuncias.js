const getDenuncias = async (id) => {
  {
    await fetch("./includes/verificaDenuncia.php", {
      method: "POST",
      body: id,
    })
      .then((response) => response.json())
      .then((response) => {
        return response
      })
      .catch((error) => console.log("Erro: " + error));
  }
};

getDenuncias(3);

const inputPesquisa = document.getElementById("pesquisaProfessores");
inputPesquisa.addEventListener("input", (e) => {
  let text = e.target.value;
  showDenuncias(text);
})

const showDenuncias = (idProfessor) => {
  let resultPesquisa = getDenuncias(idProfessor);
  const table = document.getElementById("table");
  resultPesquisa.forEach(element => {
    table.innerHTML += `<tr id="linha">
    <td class="valores nomeDenuncia">${element.id_aluno}</td>
    <td class="valores tipoDenuncia">Outro</td>
    <td class="valores">Me chamou de burra</td>
    <td class="valores">1/11/2023</td>
    <td class="excluir">Excluir</td>
</tr>`
  });

}