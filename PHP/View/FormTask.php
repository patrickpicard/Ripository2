<?php
$action = $_GET['action'];
$list = CategoryManager::getList();
switch ($action) {
    case "createTask":
        {
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            echo '<div class="formConnection">
                    <div class="title CRTask"><h3>Veuillez renseigner votre nouvelle tâche</h3></div>
                    <form class="form" method="post" action="routes.php?action=addTask">
                        <label for="name">Décrivez votre tâche</label>
                        <input type="text" name="description" rows="2" cols="20" required>
                        <label for="category">Choisissez une catégorie</label>
                        <SELECT name="category" size="1" required>'; 
                            foreach ($list as $elt) {
                            echo '<option>'.$elt->getCategorydescription().'</option>';
                            }
                        echo'</SELECT>
                        <label for="date">Choisissez la date de votre tâche</label>
                        <input type="date" name="calendar" required>
                        <label for="comment">Commentaire</label>
                        <textarea name="comment" rows="3" cols="20"></textarea>
                        <div class="button">
                            <input type="submit" value="Ajouter" class="button" />
                            <input type="reset" value="Annuler" class="button" onclick=\'location.href="routes.php?action=mainUser"\'/></div>
                        </div>
                    </form>
                </div>';
            break;
        }
    case "updateTask":
        {
            // Quand le formulaire sera soumit par clic sur le bouton, les informations qu il contient seront stockées dans la variable $_POST, parce que la methode post a été sélectionnée
            $task = TaskManager::getById($_GET['id']);    
            echo '<div class="formConnection">
                    <div class="title CRTask"><h3>Votre tâche</h3></div>
                    <form class="form" method="post" action="routes.php?action=updTask">
                        <input type="hidden" name="id" value="'.$task->getIdTask().'">
                        <label for="category">Catégorie</label>
                        <SELECT name="category" size="1" required>'; 
                            foreach ($list as $elt) {
                                if($elt->getIdCategory()==$task->getIdCategory())
                                    echo '<option value='.$elt->getIdCategory().' selected= "selected">'.$elt->getCategorydescription().'</option>';
                                else
                                    echo '<option value='.$elt->getIdCategory().'>'.$elt->getCategorydescription().'</option>';
                            }
                        echo'</SELECT>
                        <label for="description">Description</label>
                        <input type="text" name="description" value="'.$task->getDescription().'">
                        <label for="date">Date</label>
                        <input type="date" name="calendar" value="2019-06-26">
                        <label for="comment">Commentaire</label>
                        <input type="comment" name="comment" value="'.$task->getComment().'">
                        <div class="button">
                            <input type="submit" value="Modifier" class="button" />
                            <input type="reset" value="Annuler" onclick=\'location.href="routes.php?action=mainUser"\'/></div>
                        </div>
                    </form>
                </div>';
            break;    

    }
}
/*if (!isset($_POST['task'])) // On est dans la page de formulaire
{
    require adresseRoot.'/Php/View/HtmlTask.php'; // On affiche le formulaire pseudo password
} 
else 
{ // Le formulaire a été validé
    $message = '';
    if (empty($_POST['task'] || $_POST['category'] || $_POST['date'] || $_POST['comment'])) 
    {
        $message = '<p>Une erreur s\'est produite pendant la créeation votre tâche.
                        Vous devez remplir tous les champs</p>';
            echo '<div class="ligne">'.$message.'</div>';
            header("refresh:3;url=Routes.php?action=createTask");
    }
    else
    {
        $newTask = new Task(['description'=>$_POST['description'], 'category'=>$_POST['idCategory'], 'date'=>$_POST['date'], 'comment'=>$_POST['comment'], 'iduser'=>$user, 'idgroup'=>$group->getIdGroup(  )]);
        TaskManager::add($newTask);
    }
}*/