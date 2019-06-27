<?php
switch ($_GET['action']) {
    case "addTask":
        {
            echo($_POST['category']);
            $cat = CategoryManager::getByLibelle($_POST['category']);
            var_dump($cat) ;
            $id = $cat->getIdCategory();
            echo $id ;
            $p = new Task(["description" => $_POST["description"], "idcategory" => $id, "date" => $_POST["calendar"], "comment" => $_POST["comment"], "iduser" => intval($_SESSION['id']), "idgroup"=> intval($_SESSION['group'])]);
          var_dump($p);
            TaskManager::add($p);
            break;
        }
    case "updTask":
        {
            $p = new Task(["idTask"=> $_POST["id"], "description" => $_POST["description"], "idcategory" => $_POST["category"] , "date" => $_POST["calendar"], "comment" => $_POST["comment"], "iduser" => intval($_SESSION['id']), "idgroup"=> intval($_SESSION['group'])]);
            TaskManager::update($p);
            break;
        }
    case "delTask":
        {
            //$cat = CategoryManager::getByLibelle($_POST['category']);
            $idTask = intval($_GET["idTask"]);
            var_dump($idTask);
            TaskManager::delete($idTask);
            /*$p = new Task(["idTask"=> $cat->getIdCategory(), "description" => $_POST["description"], "idcategory" => $_POST["category"], "date" => $_POST["calendar"], "comment" => $_POST["comment"], "iduser" => intval($_SESSION['id']), "idgroup"=> intval($_SESSION['group'])]);
            TaskManager::delete($p);*/
            break;
        }
}

header("location:routes.php?action=mainUser");
