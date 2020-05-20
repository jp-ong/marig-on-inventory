<?php
/* 
This block of PHP Code use to valide if the username and password has registered on the database of the users
and gain access to the inventory system.
*/
    session_start(); 
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    include('../config/connect.php');
    $query = new MongoDB\Driver\Query([]);
    $users = $db->executeQuery("phpmongo.users", $query);

/* For each validation of the user, the system must know if the user is a guest, registered user, or an administrator of the system. */
    foreach($users as $user){
        if($username === $user->username && $password === $user->password){
            
            switch($user->access_level){
                /* This first case gains access to the system which it can only can view the items inside it. */
                case 0:{
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user->username;
                    $_SESSION["access_level"] = $user->access_level;
                    header("Location: ../pages/guest/");break;
                }
                 /* This second case gains access to the user access level of the system which can add items in the database. */
                case 1:{
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user->username;
                    $_SESSION["access_level"] = $user->access_level;
                    header("Location: ../pages/user/");break;
                }
                 /* This third case gains access to the administrator access level of the system which can modify/delete items in the database. */
                case 2:{
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user->username;
                    $_SESSION["access_level"] = $user->access_level;
                    header("Location: ../pages/admin/");break;
                }
                 /* If none of the cases has access to the system, you can't gain acess to it. */
                default:{
                $_SESSION["loggedin"] = false;
                header("Location: ../");break;
                }
            } break;
        } 
        /* If none of the cases has access to the system, you can't gain acess to it. */
        else {
            $_SESSION["loggedin"] = false;
            header("Location: ../");
        }
    }
?>