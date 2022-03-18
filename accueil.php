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
    <title>Acceuil</title>
</head>
<body>
<header class="headerStyle">
        <div class="placementSlogan">
            <p class="slogan1">Keep Cool Keep Lanitz</p>
        </div>
        <div class="placementBtn">
            <a href=""><button class="btnStyle">Forum</button></a>
            <a href="profil.php"><button class="btnStyle">Profil</button></a>
            <a href="logout.php"><button class="btnStyle">Log out</button></a>
        </div>
</header>        
<main class="mainStyle">

<?php 
    $recup_news = $bdd->query("SELECT * FROM news");
    while($news_admin = $recup_news->fetch()) {
?>
    
        <div class="news">
            <div class="titreNews"><?=$news_admin['titre_news']?></div>
                <iframe width="300" height="220" src="<?=$news_admin['video_news']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <div><?=$news_admin['contenu_news']?></div>       
        </div>      
<?php
    }
?>    
</main>

</body>
</html>