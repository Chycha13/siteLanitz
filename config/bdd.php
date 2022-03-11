<?php
  
  try{
      $bdd = new PDO("mysql:host=localhost;dbname=lanitz;port=3309", 'root', '');

  }catch(PDOException $e) {
      echo "erreur : ". $e->getMessage();
  }