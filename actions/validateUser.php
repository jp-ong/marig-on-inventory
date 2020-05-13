<?php
    session_start(); 
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $db = new MongoDB\Driver\Manager("mongodb+srv://phpmongoAdmin:phpmongoAdmin1234@ong-cluster-smaha.mongodb.net/");
    $query = new MongoDB\Driver\Query([]);
    $users = $db->executeQuery("phpmongo.users", $query);

    foreach($users as $user){
        if($username === $user->username && $password === $user->password){
            switch($user->user_type){
                case 1:{
                    $_SESSION["loggedin"] = 1;
                    //header(Guest)
                }
                case 2:{
                    $_SESSION["loggedin"] = 2;
                    //header(User)
                }
                case 3:{
                    $_SESSION["loggedin"] = 3;
                    //header(admin)
                }
            }
        } else {
            $_SESSION["loggedin"] = 0;
            header("Location: ../");
        }
    }
?>