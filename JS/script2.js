var boutonSuppr = document.getElementsByClassName('suppr');
for (i = 0; i < boutonSuppr.length; i++) {
    boutonSuppr[i].addEventListener('click', affiche);
}
var divSuppr = document.getElementById('divSuppr');
console.log(divSuppr);
var divBouton = document.getElementById('boutonMsg');
console.log(divBouton);

boutonVal = document.getElementById('btnValid');
boutonVal.addEventListener('click', suppression);
annul = document.getElementById('btnAnnul');
annul.addEventListener('click', function() {

    divSuppr.style.visibility = "hidden";
});


function affiche(e) {
    divSuppr.style.visibility = "visible"
    parent = (e.target.parentNode).parentNode;
    id = parent.id;
    boutonVal.setAttribute("id", id);

}


function suppression(e) {

    id = e.target.id;

    window.location.replace("/AgendaFinal2/PHP/Controller/routes.php?action=delTask&idTask=" + id)
}



boutonVoirTout = document.getElementById('affiche');
//tache = document.getElementById('tache');
boutonVoirTout.addEventListener('click', afficher);

Voirtout = document.getElementById('allTask');
// on définit une requete
function afficher() {

    const req = new XMLHttpRequest();
    //on vérifie les changements d'états de la requête
    req.onreadystatechange = function(event) {
        //console.log(this.readyState);
        console.log(this.status);
        if (this.readyState === XMLHttpRequest.DONE) {
            console.log("test" + this.responseText);
            if (this.status === 200) {
                // la requete a abouti et a fournit une reponse
                //on décode la réponse, pour obtenir un objet
                reponse = JSON.parse(this.responseText);
                btnReferm = document.getElementById('btnReferm');


                remove = document.createElement("button");
                remove.setAttribute("id", "refermer");
                remove.setAttribute("class", "dailyTaskButton");
                btnReferm.appendChild(remove);
                btnReferm.style.marginTop = "2vw";
                remove.innerHTML = "Fermer ";
                remove.style.width = "8vw";
                remove.style.maxHeight = "1.5vw";
                //remove.style.marginLeft = "28vw";
                remove.style.display = "flex";
                remove.style.justifyContent = "center";
                remove.style.alignItems = "center";
                rem = document.getElementById('refermer');
                rem.addEventListener('click', ferme);
                boutonVoirTout.removeEventListener('click', afficher);
                for (let i = 0; i < reponse.length; i++) {

                    taskList = document.createElement("div");
                    taskList.setAttribute("class", "resultTask");
                    taskList.id = reponse[i].idtask;

                    category = document.createElement("div");
                    category.setAttribute("class", "categoryB");
                    taskList.appendChild(category);

                    libelle = document.createElement("div");
                    libelle.setAttribute("class", "description");
                    taskList.appendChild(libelle);

                    date = document.createElement("div");
                    date.setAttribute("class", "dateB");
                    taskList.appendChild(date);

                    comment = document.createElement("div");
                    comment.setAttribute("class", "commentB");
                    taskList.appendChild(comment);

                    date.innerHTML = reponse[i].date;
                    category.innerHTML = reponse[i].Categorydescription;
                    libelle.innerHTML = reponse[i].description;
                    comment.innerHTML = reponse[i].comment;

                    CRUDB = document.createElement("div");
                    CRUDB.setAttribute("class", "CRUDB");

                    Btnmodifier = document.createElement("div");
                    Btnmodifier.setAttribute("class", "buttonCrud");
                    lienModif = document.createElement("a");
                    lienModif.setAttribute("class", " crudBtn crudBtnModif");
                    lienModif.innerHTML = "Modifier";
                    lienModif.href = "/AgendaFinal2/PHP/Controller/routes.php?action=updateTask&id=" + reponse[i].idtask
                    Btnmodifier.appendChild(lienModif);

                    BtnSupprimer = document.createElement("div");
                    BtnSupprimer.setAttribute("class", "suppr buttonCrud");
                    BtnSupprimer.innerHTML = "Supprimer";

                    CRUDB.appendChild(Btnmodifier);
                    CRUDB.appendChild(BtnSupprimer);

                    taskList.appendChild(CRUDB);

                    Voirtout.style.webkitAnimation = "fadein 3s";
                    Voirtout.style.Animation = "fadein 3s";
                    Voirtout.style.mozAnimation = "fadein 3s";
                    Voirtout.style.oAnimation = "fadein 3s";
                    Voirtout.style.border = "1px solid"
                    Voirtout.appendChild(taskList);

                }

                var boutonSuppr = document.getElementsByClassName('suppr');
                for (i = 0; i < boutonSuppr.length; i++) {
                    boutonSuppr[i].addEventListener('click', affiche);
                }


                console.log(reponse);
                console.log("Réponse reçue: %s", this.responseText);
            } else {
                console.log("Status de la réponse: %d (%s)", this.status, this.statusText);
            }
        }
    };

    //on envoi la requête
    req.open('GET', '/AgendaFinal2/PHP/Model/testAjax.php', true);
    req.send(null);
    console.log(req.responseText);

}


function ferme() {

    allTask = document.getElementById('allTask');
    btnReferm.style.visibility = "hidden";
    allTask.style.visibility = "hidden";

    boutonVoirTout.addEventListener('click', function() {
        allTask.style.visibility = "visible";
        btnReferm.style.visibility = "visible";
    });


    /*bouton = document.getElementById('affiche');
    bouton.removeEventListener('click' , afficher);  
    
    bouton.addEventListener('click' , test);  */
}

function test() {
    tache.style.visibility = "visible";
}