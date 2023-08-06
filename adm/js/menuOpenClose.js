function menuShow(){
    if(document.getElementById("menu").style.display == "flex")
    {
        document.getElementById("menu").style.display = "none";
    }else if(window.innerWidth <= 768){
        document.getElementById("menu").style.display = "flex";
        document.getElementById("fotoPerfil").style.marginBottom = "calc(14vh - 3rem)";
        document.getElementById("menu").style.width = "calc(40% + 150px)";
        document.getElementById("menu").style.height = "calc(100% - 5rem)";
        document.getElementById("menu").style.fontSize = "1.3rem";
    }
}

function retornaTituloResponsivo() {
    var title = document.getElementById("title").textContent;
    return title;
  }
  
  var paragrafo = document.getElementById("titleResponsive");
  paragrafo.textContent = retornaTituloResponsivo();
  