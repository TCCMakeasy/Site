const text = document.getElementById("inputPesquisa");

const pesquisa = async (text) =>{
    fetch("./includes/pesquisa.php", {
        method: "POST",
        body: text,
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        }
    }).then((response) => console.log(response.text()))
}

text.addEventListener("keypress", (e) => {
    var input = document.getElementById("inputPesquisa").value
    const text = input+e.key
    pesquisa(text)
})