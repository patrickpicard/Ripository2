<!DOCTYPE html>
<html>
<head>
<?php 

function chargerClasse($classe)
{
	if (file_exists(adresseRoot."Php/Controller/".$classe.".class.php")) {
        require adresseRoot."Php/Controller/".$classe.".class.php";
    }
    if (file_exists(adresseRoot."Php/Model/".$classe.".class.php")) {
        require adresseRoot."Php/Model/".$classe.".class.php";
    }
}
spl_autoload_register("chargerClasse");
// initialise une connection
DbConnect::init();
session_start();
//Si le titre est indiqué, on l'affiche entre les balises <title>
echo (!empty($titre)) ? '<title>' . $titre . '</title>' : '<title> Forum </title>';
?>



<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="<?php echo Settings::getAdresseRoot(); ?>/CSS/mainUser.css" />
</head>
<body>
<div class="contener">
    <div id="header">
        <?php
            if (isset($_SESSION['pseudo'])) 
            {
                echo "<div class='decoButton'><a href='" . serverRoot . "?action=deconnect'>Deconnexion</a><img class='imgDeco' src='".Settings::getAdresseRoot()."PICTURES/deco2.png' alt='deconnexion' /></div>";
                echo "<div class='name'>Bonjour ".$_SESSION['pseudo']."</div>";
            } 
            
        ?>
        <div id="title">
            <div class="img1"><img src="/AgendaFinal/PICTURES/calendar.png" alt="calendrier" /></div>
            <?php
                if (empty($_SESSION['pseudo']))
                {
                    echo "<h1>Plannificateur de tâches</h1>";
                }
                else{
                    echo "<h1>Bienvenue sur votre plannificateur de tâches"." ".$_SESSION['pseudo']."</h1>";
                }
            ?>
            <div class="img1"><img src="/AgendaFinal/PICTURES/calendar.png" alt="calendrier" /></div>
        </div>

    </div>

    

