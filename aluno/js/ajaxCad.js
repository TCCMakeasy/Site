var form = document.getElementById("cadastro");
form.addEventListener("submit", function(event){
  event.preventDefault();
  ChecarUsuario();
});

const ChecarUsuario = () => {
try{
  objetoAJAX = new XMLHttpRequest();
}
catch(e1){
  try{
    objetoAJAX = new ActiveXObject("Msxm12.XMLHTTP");
  }
  catch(e2){
    try{
      objetoAJAX = new ActiveXObject("Microsoft.XMLHTTP");
    }
    catch(e3){
      objetoAJAX = false;
    }
  }
}
if(objetoAJAX){
  var alert = document.getElementById("alert");
  var sucesso = document.getElementById("sucesso");
  alert.style.display="block";
  alert.innerHTML="Carregando...";
  let data = new FormData(form);
  objetoAJAX.open("POST", './includes/cad.php', true);
  objetoAJAX.setRequestHeader('X-Content-Type-Options', 'multipart/form-data');
  objetoAJAX.send(data);
  objetoAJAX.onreadystatechange = function(){
    if(objetoAJAX.readyState == 4){
      if(objetoAJAX.responseText == "Cadastrado com sucesso"){
        alert.style.display="none";
        sucesso.style.display = "block";
        sucesso.innerHTML = objetoAJAX.responseText;
      }else{
        alert.innerHTML = "Erro: " + objetoAJAX.responseText;
      }
    }
  }
}
}