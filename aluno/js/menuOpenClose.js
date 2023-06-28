function menuShow(){
    if(document.getElementById("menu").style.display == "block" && window.innerWidth < 768){
        document.getElementById("menu").style.display = "none";
    }else if(window.innerWidth < 768){
        document.getElementById("menu").style.display = "block";
        document.getElementById("menu").style.marginTop = "5rem";
        document.getElementById("menu").style.width = "calc(40% + 100px)";
        document.getElementById("menu").style.height = "calc(100% - 5rem)";
    }
}