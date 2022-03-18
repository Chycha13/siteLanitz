<?php
require_once "config/bdd.php";


if(isset($_GET['switchRole'])){

    $recup_role = $bdd->prepare("SELECT role FROM users WHERE id_user = ?");
    $recup_role->execute(array($_GET['switchRole']));
    while($role = $recup_role->fetch()) {
        if(trim($role['role']) == 'user'){
            $switchRole = 'admin' ;    
        }
        else{
            $switchRole = 'user';
        }
    } 
        
    $switch_admin = $bdd->prepare("UPDATE users SET role = '".$switchRole."' WHERE id_user = ?");
    $switch_admin->execute(array($_GET['switchRole']));
    
    header('Location: admin.php');
}