<?php
require_once "config/bdd.php";

 if(isset($_GET['Delete']))  {
        
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE id_user = ?');
        $recupUser->execute(array($_GET['Delete']));
        
        // rowCount check if row in the table are higher to 0
        if($recupUser->rowCount() > 0)
        {
            $bannirUser = $bdd->prepare('DELETE FROM users WHERE id_user = ?');
            $bannirUser->execute(array($_GET['Delete']));

            header('Location: admin.php');
        }
            else{
                echo "Aucun membre n'a été trouvé";
            }
    }
            else
            {
                echo "Identifiant n'a pas été récupéré";
            }
?>