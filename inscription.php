<?php

require_once "config/bdd.php";

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
            <form method="POST" action="signIn.php"  >
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