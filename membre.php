<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=sitelanitz;', 'root', '');
    if(!$_SESSION['mdp'])
    {
        header('Location: connexion.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de membres</title>
</head>
<body>
    <!-- Afficher les Membres -->
<?php
    $recupUsers = $bdd->query('SELECT * FROM membres');
    while($user = $recupUsers->fetch())
    {
?>
        <p><?= $user['pseudo'].' '.$user['email']; ?> <a href="bannir.php?id=<? $user['id']; ?>"> Supprimer un membre</a></p>
<?php
        
    }
?>
</body>
</html>