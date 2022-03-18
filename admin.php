<?php
session_start();
require_once "config/bdd.php";



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lanitz.css">
    <title>Administration</title>
</head>
<body class="bodyConnect2">
    <header class="headerStyle2">
        <div class="titreInscription">
            <h1 class="titreCo"> Espace de Gestion :</h1>
            <div class="placementBtn2">
            <button onclick="openModal()" class="btnRetour2"> Ajouter News </button>
            <a href="./accueil.php"> <button class="btnRetour2"> Gestion Forum </button> </a>
            <a href="./accueil.php"> <button class="btnRetour2"> Retour </button> </a>
        </div>
        </div>
    </header>
        <main class="placementAdmin">
            <table class="tableStyle">
                <tr class="adminStyle2">
                    <th >Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Gestion Rôles</th>
                    <th>Suppression</th>
                </tr>

                <?php
                        $recup_user = $bdd->query("SELECT * FROM users");
                        while($user_admin = $recup_user->fetch()) {
                ?>
                            <tr class="adminStyle">
                                <th><?=$user_admin['nom_user']?></th>
                                <th><?=$user_admin['prenom_user']?></th>
                                <th><?=$user_admin['mail_user']?></th>
                                

                                <form action="role.php" method="POST">
                                    <th><?=$user_admin['role']?></th>
                                    <th><a id="linkColor" href="./roles.php?switchRole=<?=$user_admin['id_user']?>">Switch</a></th>
                                    <th><a id="linkColor" href="./bannir.php?Delete=<?=$user_admin['id_user']?>" >Supprimer</a></th>
                                    
                                </form>
                            </tr>
                <?php
                    }
                ?>


            </table>
                    <h1 class="titreGestion">Gestion des News</h1>
                    <table class="tableStyle">
                            <tr class="adminStyle2">
                                <th >Titre</th>
                                <th>Contenu</th>
                                <th>Vidéo / image</th>
                               
                            </tr>
                    </table>
                    <div id="popUp">
                            <form action="" method="POST">
                            <table  align="center">
                    <tr>
                        <td >
                            <label for="titre_news" class="labelStyle">Titre :</label>
                            <input class="outline" type="text" id="titre_news" name="titre_news" autocomplete="off">
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="video_news" class="labelStyle">Lien :</label>
                            <input class="outline" type="text" id="video_news" name="video_news" autocomplete="off">
                                <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="contenu_news" class="labelStyle">contenu :</label>
                            <textarea name="contenu_news" id="" cols="20" rows="10"></textarea>
                                <br><br>
                        </td>
                    </tr>

                    <tr>
                        <td class="btnStyle2">
                            <input id="btn" type="submit" name="valider" >
                        </td>
                    </tr>

                            </form>
                    </div>

                    <script>
                            function openModal () {
                            document.getElementById("popUp").style;
                            setTimeout(function(){
                                popUp.style.display = 'block';
                                });
                            }       
                    </script>
        </main>   
</body>
</html>