<?php
session_start();
require_once "config/bdd.php";

    if(isset($_POST['mail_user']) && isset($_POST['mdp_user'])){

            $mail = htmlspecialchars($_POST['mail_user']);
            $mdp = htmlspecialchars($_POST['mdp_user']);

    // Vérifie que tout les champs soit rempli
        if(!empty($mail) && !empty($mdp)) {

      // préparation de la vérification SQL

        $select = $bdd->prepare("SELECT * FROM users WHERE mail_user = ?");
        $select->execute(([$mail]));
        $data = $select->fetch();
          
        // vérification des roles
            if($data != false){
                    if(password_verify($mdp, $data['mdp_user'])){
                        $_SESSION['role'] === $data['role'];
                        
                        if($data['role'] === "admin"){
                            header("Location: admin.php");

                            }else if ($data['role'] === "user"){                          
                                header("Location: accueil.php");
                            }
                    }else{
                        $erreur = "mdp ou nom incorrect";
                        header("Location: connection.php?error=$erreur");
                        }
            }else{
                $erreur = "mdp ou nom incorrect";
                header("Location: connection.php?error=$erreur");
            }
    }else{
        $erreur= "veuillez remplir les champs";
        header("Location: connection.php?error=$erreur");
    }
}
?>         