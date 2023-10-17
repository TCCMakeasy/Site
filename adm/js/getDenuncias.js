const getDenuncias = async (id) => {
{    fetch("./includes/verificaDenuncia.php", {
      method: "POST",
      body: id,
    })
      .then((response) => response.json())
      .then((response) => {
        console.log(response);
      })
      .catch((error) => console.log("Erro: " + error));}
  };

getDenuncias(3);