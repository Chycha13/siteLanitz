<?php
session_start();
if(isset($_POST['valider']))
{
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp']) AND !empty($_POST['email']))
    {
        $pseudo_par_defaut = "NqnS";
        $mdp_par_defaut = "220860";
        $email_par_defaut = "nqns@hotmail.fr";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdr_saisi = htmlspecialchars($_POST['mdp']);
        $email_saisi = htmlspecialchars($_POST['email']);
        
            if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi = $mdp_par_defaut AND $email_saisi = $email_par_defaut)
            {
                $_SESSION['mdp'] = $mdr_saisi;
                header('Location: index.php');
            }
            else
            {
                echo "Mot de passe incorrect";
            }
        }
    else
    {
        echo "veuillez compléter tous les champs";
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
<body>
    <div class="titreInscription">
        <h1>Connectez vous ici :</h1>
    </div>
    <div class="placementInscription" >

        <form method="POST" action="" class="formStyle" >
            <table align="center">
                <tr>
                    <td align="right">
                        <label for="pseudo" class="labelStyle">Pseudonyme :</label>
                        <input type="text" id="pseudo" name="pseudo" autocomplete="off">
                            <br><br>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="email"  class="labelStyle">Email :</label>
                        <input type="text" id="email" name="email" autocomplete="off">
                            <br><br>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mdp" class="labelStyle">Mot de passe :</label>
                        <input type="password" id="mdp" name="mdp">
                            <br><br>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" name="valider" >
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>