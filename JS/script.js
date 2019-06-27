var boutonSuppr = document.getElementsByClassName('suppr');
for (i = 0 ; i < boutonSuppr.length ; i++){
    boutonSuppr[i].addEventListener('click', affiche);
}
var divSuppr = document.getElementById('divSuppr');
console.log(divSuppr);
var divBouton = document.getElementById('boutonMsg');
console.log(divBouton);


function affiche(e){
    parent = (e.target.parentNode).parentNode ;
    id = parent.id ; 
    divSuppr.style.visibility = "visible";
    divSuppr.innerHTML = "Êtes vous sur de vouloir supprimer la tâche?";
    var boutonVal= document.createElement("button");
    boutonVal.setAttribute("class", "btnMessage")
    boutonVal.setAttribute("id", id)
    boutonVal.setAttribute("value", "Valider")
    boutonVal.addEventListener("click", suppression);
    boutonVal.innerHTML = "valider";
    divBouton.appendChild(boutonVal);
    var boutonAnnul= document.createElement("button");
    boutonAnnul.setAttribute("id", "btnAnnul")
    boutonAnnul.setAttribute("value", "Annuler")
    boutonAnnul.innerHTML = "annuler";
    divBouton.appendChild(boutonAnnul);
    divSuppr.appendChild(divBouton);
    annul = document.getElementById('btnAnnul');
    console.log(annul);
    annul.addEventListener('click' , function(){
        divSuppr.style.visibility = "hidden";
        for (i = 0 ; i < boutonSuppr.length ; i++){
            boutonSuppr[i].removeEventListener('click', affiche);
        
            boutonSuppr[i].addEventListener('click', function(e){
                divSuppr.style.visibility = "visible"
                parent = (e.target.parentNode).parentNode ;
                id = parent.id ;
                boutonVal.setAttribute("id", id);
        })
        
        
        };

    })
}


function suppression(e)
{
     id = e.target.id ;
     alert(id);
    //window.location.replace("/AgendaFinal/PHP/Controller/routes.php?action=delTask&idTask="+id)
}

var boutonSuppr = document.getElementsByClassName('suppr');
var dailyTask = document.getElementsByClassName('dailyTask')[0];
var resultTask = document.getElementsByClassName('resultTask')[0];
    for (i = 0 ; i < boutonSuppr.length ; i++){
        boutonSuppr[i].addEventListener('click', function(e){
            divSupp = e.target.parentNode
            divSupp.parentNode.removeChild(resultTask)
        })
    };
