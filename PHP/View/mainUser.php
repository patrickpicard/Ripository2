<?php
//include "Header.php";
?>
        <div id="divSuppr">
        
            <div id="boutonMsg">
            Êtes vous sur de vouloir supprimer la tâche?
            <button class='btnMessage' id="btnValid" >valider</button>
            <button class='btnAnnul' id='btnAnnul' >Annuler</button>
            </div>
        </div>
        <div class="dailyTask">
            <div id="enteteDaily">
                <div class="enteteCategory">Catégorie</div>
                <div class="enteteDescription">Description</div> 
                <div class="enteteDate">Date</div>
                <div class="enteteComment">Commentaire</div>
                <div class="enteteCRUD"></div>
            </div>
            <?php
                $list = TaskManager::getListToday();
                if($list == null){
                    echo "Vous n'avez pas de tâches aujourd'hui";
                }
                else{
                    $list = TaskManager::getListToday();
                    
                   foreach ($list as $elt) {
                        $cat = CategoryManager::getById($elt->getIdCategory());
                        
                            echo '<div class="resultTask" id='.$elt->getIdTask().'>';
                                    echo '<div class="categoryB">'.$cat->getCategorydescription().'</div>';
                                    echo '<div class="description">'.$elt->getDescription().'</div>';
                                 
                                    echo '<div class="dateB">'.$elt->getDate().'</div>';
                                    echo '<div class="commentB">'.$elt->getComment().'</div>';
                                    echo '<div class="CRUDB">
                                                <div class="buttonCrud"><a class=" crudBtn crudBtnModif"  href="'.serverRoot.'?action=updateTask&id='.$elt->getIdTask().'" >Modifier</a></div>
                                                <div class ="suppr buttonCrud">Supprimer</div>
                                    </div>
                            </div>';
                    }
                }
            ?>
        </div>

        <div class="divDailyTaskButton">
            <div class="dailyTaskButton"><a href="<?php echo serverRoot?>.?action=createTask">Créer tâche</a></div>
            <div class="dailyTaskButton" id ='affiche' ><a>Voir toutes mes taches</a></div>
            <div class="dailyTaskButton"><a>Archives</a></div>
        </div>

<div id='btnReferm'></div>       
<div class='dailyTask2' id='allTask'>

</div>
    </div>

 </body>
 <script src="/AgendaFinal2/JS/script2.js"></script>
 </html>