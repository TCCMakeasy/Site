const menu = document.getElementById("menu");

function menuShow(){
    if(menu.style.display == "flex")
    {
        menu.style.display = "none";
    }else if(window.innerWidth <= 768){
        menu.style.display = "flex";
        menu.style.zIndex = "99999";
        document.getElementById("fotoPerfil").style.marginBottom = "calc(14vh - 3rem)";
        menu.style.width = "calc(40% + 150px)";
        menu.style.height = "calc(100% - 5rem)";
        menu.style.fontSize = "1.3rem";
    }
}

function retornaTituloResponsivo() {
    var title = document.getElementById("title").textContent;
    return title;
  }
  
  var paragrafo = document.getElementById("titleResponsive");
  paragrafo.textContent = retornaTituloResponsivo();
  