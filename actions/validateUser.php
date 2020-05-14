<?php
    session_start(); 
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $db = new MongoDB\Driver\Manager("mongodb+srv://phpmongoAdmin:phpmongoAdmin1234@ong-cluster-smaha.mongodb.net/phpmongo");
    $query = new MongoDB\Driver\Query([]);
    $users = $db->executeQuery("phpmongo.users", $query);

    foreach($users as $user){
        if($username === $user->username && $password === $user->password){
            
            switch($user->access_level){
                case 0:{
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user->username;
                    $_SESSION["access_level"] = $user->access_level;
                    header("Location: ../pages/guest/");break;
                }
                case 1:{
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user->username;
                    $_SESSION["access_level"] = $user->access_level;
                    header("Location: ../pages/user/");break;
                }
                case 2:{
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $user->username;
                    $_SESSION["access_level"] = $user->access_level;
                    header("Location: ../pages/admin/");break;
                }
                default:{
                $_SESSION["loggedin"] = false;
                header("Location: ../");break;
                }
            } break;
        } else {
            $_SESSION["loggedin"] = false;
            header("Location: ../");
        }
    }
?>