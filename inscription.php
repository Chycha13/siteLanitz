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
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lanitz.css">

    <title>Register</title>
</head>
<body class="bodyConnect2">
<div class="titreInscription">
        <h1 class="titreCo"> S'inscrire ici :</h1>
        <a href="./index.php"> <button class="btnRetour"> Retour </button> </a>
    </div>
     <div class="main">  
        <div class="main2">
            <form method="POST" action=""  >
                <table class="TormStyle">
                    <tr>
                        <td>
                                <label for="nom" class="labelStyle">Nom :</label>
                                <input class="outline" type="text" id="mail" name="nom_user" autocomplete="off">
                                <br><br>  
                        </td>
                    </tr>
                    <tr>
                            <td>
                                <label for="prenom" class="labelStyle">Prénom :</label>
                                <input class="outline" type="text" id="mail" name="prenom_user" autocomplete="off">
                                <br><br>
                            </td>
                    </tr>   
                    <tr>
                                <td>
                                    <label for="mail" class="labelStyle">Email :</label>
                                    <input class="outline" type="text" id="mail" name="mail_user" autocomplete="off"> 
                                    <br><br>                               
                                </td>
                    </tr>            
                    <tr>
                                    <td>
                                        <label for="mdp" class="labelStyle">Mot de passe :</label>
                                        <input class="outline" type="password" id="mail" name="mdp_user" autocomplete="off"> 
                                        <br><br> 
                                    </td>
                    </tr>
                    <tr>
                                        <td >
                                            <label for="mdp" class="labelStyle">Confime Mdp :</label>
                                            <input class="outline" type="password" id="mail" name="confirm_mdp_user" autocomplete="off">
                                            <br><br>
                                        </td>
                    </tr>

                    <tr>
                        <td class="btnStyle2">
                            <input id="btn" type="submit" name="valider" >
                        </td>
                    </tr>
        <!-- <?php 
       if(isset($_GET["error"])){
           echo "<p style='color:white'>". $_GET["error"] ." </p>";
       }
       ?> -->
                </table>
            </form> 
        </div>
    </div>
    <div class="slogan2">
       <img id="sloganStyle2" src="./img/slogan.png" >
    </div>   
</body>
</html>