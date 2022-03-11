<?php
session_start();
require_once "config/bdd.php";

    if(isset($_POST['mail_user']) && isset($_POST['mdp_user']))
    {

            $mail = htmlspecialchars($_POST['mail_user']);
            $mdp = htmlspecialchars($_POST['mdp_user']);

    // Vérifie que tout les champs soit rempli
        if(!empty($mail) && !empty($mdp)) {

      // préparation de la vérification SQL

        $select = $bdd->prepare("SELECT * FROM users WHERE mail_user = ?");
        $select->execute(([$mail]));

        $data = $select->fetch();
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
    <title>connection</title>
</head>
<body class="bodyConnect">
   
    <div class="titreInscription">
        <h1 class="titreCo">Connectez vous ici :</h1>
        <a href="./index.php"> <button class="btnRetour"> Retour </button> </a>
    </div>
     <div class="ALEd">  
        <div class="placementInscription" >

            <form method="POST" action="" class="formStyle" >
                <table  align="center">
                    <tr>
                        <td >
                            <label for="mail" class="labelStyle">Email :</label>
                            <input class="outline" type="text" id="mail" name="mail_user" autocomplete="off">
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mdp" class="labelStyle">Mot de passe :</label>
                            <input class="outline" type="password" id="mdp" name="mdp_user" autocomplete="off">
                                <br><br>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="btnStyle2">
                            <input id="btn" type="submit" name="valider" >
                        </td>
                    </tr>
                </table>
            </form> 
        </div>
    </div>
    <div class="slogan">
       <img id="sloganStyle" src="./img/slogan.png" >
    </div>
</body>
</html>