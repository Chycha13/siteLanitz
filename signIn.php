<?php 
require_once "config/bdd.php";

    //check if table are correct
    if(isset($_POST['nom_user']) && isset($_POST['prenom_user']) && isset($_POST['mail_user']) && isset($_POST['mdp_user']) && isset($_POST['confirm_mdp_user'])){
    
        // create variable
    
    $nom = htmlspecialchars(($_POST["nom_user"]));
    $prenom  = htmlspecialchars(($_POST["prenom_user"]));
    $mail = htmlspecialchars(($_POST["mail_user"]));
    $mdp = htmlspecialchars(($_POST["mdp_user"]));
    $confirmeMdp = htmlspecialchars($_POST["confirm_mdp_user"]);
        // check if cases is not empty
        if (!empty($nom) && !empty($prenom) && !empty($mail) && !empty($mdp) && !empty($confirmeMdp)) {
    
            // check if validate mail
            
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    
    
                //if password are correct we prepare and execute request SQL
    
                if($mdp === $confirmeMdp){
            
                    $mdp = password_hash($mdp, PASSWORD_DEFAULT);
                    $urlphoto = "avatar.png";
                    $role = "user";
                    $insert = $bdd->prepare("INSERT INTO users(nom_user, prenom_user, mail_user, mdp_user, urlphoto, role) VALUES(?,?,?,?,?,?)");
                    $insert->execute([$nom,$prenom,$mail,$mdp,$urlphoto,$role]);
    
    
                    $success = "Bienvenue dans la Lanitzerie";
                    header("Location: connection.php?success=$success");
                    
                }else{
                    $erreur = "mot de passe pas identique";
                    header("Location: inscription.php?error=$erreur");
                }
    
            }else{
                $erreur = "veuillez entrez un mail valide";
                header("Location: inscription.php?error=$erreur");
            }
        } else{
            $erreur = "veuillez remplir les champs" ;
            header("Location: inscription.php?error=$erreur");
        } 
    }