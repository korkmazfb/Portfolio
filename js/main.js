let allgames = document.getElementsByClassName("box");
// eerst maak je een let variabele
let filters = document.getElementsByClassName("filter");

window.scrollTo(0,0);
setInterval(function(){
    document.getElementsByTagName("body")[0].style.overflow = "auto";

}, 1500);
//dit zorgt er voor dat het na 1,5 s een overflow hidden


for(let i = 0; i < filters.length; i++){
    filters[i].checked = true
}
//dat filters op true blijven

//rpg filter
let rpgfilter = document.getElementById("checkbox-cssart");

rpgfilter.onchange = function(){
    if(rpgfilter.checked === true){
        for(let i = 0; i < allgames.length; i++){
            if(allgames[i].dataset.category === "cssart"){
                allgames[i].style.display = "block";
            }

        }   /// deze hele code zorgt voor dat als je rpg klikt dat het visible wordt
            // en ook gebeurt dit andersom bij else
    }
    else{
        for(let i = 0; i < allgames.length; i++){
            if(allgames[i].dataset.category === "cssart"){
                allgames[i].style.display = "none";
            }

        }

    }
}

//action filter

let actionfilter = document.getElementById("checkbox-webvr")

actionfilter.onchange = function(){
    if(actionfilter.checked === true){
        for(let i = 0; i < allgames.length; i++){
            if(allgames[i].dataset.category === "webvr"){
                allgames[i].style.display = "block";
            }

        }
            /// deze hele code zorgt voor dat als je action klikt dat het visible wordt
            // en ook gebeurt dit andersom bij else
    }
    else{
        for(let i = 0; i < allgames.length; i++){
            if(allgames[i].dataset.category === "webvr"){
                allgames[i].style.display = "none";
            }

        }

    }
}

// adventure filter

let adventurefilter = document.getElementById("checkbox-websites");

adventurefilter.onchange = function(){
    if(adventurefilter.checked === true){
        for(let i = 0; i < allgames.length; i++){
            if(allgames[i].dataset.category === "websites"){
                allgames[i].style.display = "block";
            }

        }  /// deze hele code zorgt voor dat als je adventure klikt dat het visible wordt
            // en ook gebeurt dit andersom bij else
    }
    else{
        for(let i = 0; i < allgames.length; i++){
            if(allgames[i].dataset.category === "websites"){
                allgames[i].style.display = "none";
            }

        }

    }
}




