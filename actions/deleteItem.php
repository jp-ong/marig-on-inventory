<?php
/* For every start of the system, it must be called first which user has been validated and shown at the top of the header page. */
    session_start();
    if((!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]==false)||($_SESSION["access_level"]!=2)){
        header('Location: ../../');
    }
    //Gets _id of item from POST form
    $bulk = new MongoDB\Driver\BulkWrite;
    $id = $_GET["id"];

    //Deletes item from Items Collection using _id as query
    try{
        $bulk->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);
        $db = new MongoDB\Driver\Manager("mongodb+srv://phpmongoAdmin:phpmongoAdmin1234@ong-cluster-smaha.mongodb.net/phpmongo");
        $res = $db->executeBulkWrite('phpmongo.items', $bulk);
        header('Location: ../pages/admin/');
    } catch(MongoDB\Driver\Exception\Exception $e){
        die('Error Encountered: '.$e);
    }
?>