function menuShow(){
    if(document.getElementById("menu").style.display == "block")
    {
        document.getElementById("menu").style.display = "none";
    }else if(window.innerWidth <= 1024){
        document.getElementById("menu").style.display = "block";
        document.getElementById("menu").style.marginTop = "5rem";
        document.getElementById("fotoPerfil").style.marginBottom = "calc(14vh - 3rem)";
        document.getElementById("menu").style.width = "calc(35% + 100px)";
        document.getElementById("menu").style.height = "calc(100% - 5rem)";
    }
}